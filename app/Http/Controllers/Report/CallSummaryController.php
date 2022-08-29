<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CallSummaryController extends Controller
{

    public function callSummary()
    {
        return view('pages.reports.callSummary');
    }

    public function search(Request $request)
    {
        $call_type = $request->call_type;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $str = '';

        if ($call_type != '') {
            $str .= " and call_type ='$call_type' ";
        }
        if ($from_date != '') {
            $str .= " and DATE(calldate) >= '$from_date' ";
        }
        if ($to_date != '') {
            $str .= " and DATE(calldate) <= '$to_date' ";
        }
        // 
        // dd($request);
        $more_where = $str;
        // $callSummary = DB::select(
        //     "select call_status_before_hangup,DATE_FORMAT(calldate, '%Y-%m-%d'), call_type,connected_flag,count(*),sum(talk_sec) from (select c.call_type, c.calldate, c.src, c.dst, c.connected_at
        //     ,c.call_status_before_hangup
        //     ,c.incoming_queued_at
        //     ,ifnull(a.talk_sec,0)as talk_sec
        //     ,c.record
        //     ,CASE
        //         WHEN connected_at is null THEN 'unsuccess'
        //         ELSE 'success'
        //     END as connected_flag
        //     from call_log c left join agent_log a on c.id=a.call_id 
        //     where  1 $more_where order by c.calldate asc)A group by call_type,connected_flag,DATE_FORMAT(calldate, '%Y-%m-%d'), call_status_before_hangup"
        // );


        $call_log = DB::select("select DATE_FORMAT(c.calldate, '%Y-%m-%d') as calldate,c.call_type, c.src, c.dst
                                ,c.hangup_handler_time
                                ,c.connected_at
                                ,c.call_status_before_hangup
                                ,c.incoming_queued_at
                                ,ifnull(a.talk_sec,0)as talk_sec
                                ,c.record
                                ,CASE
                                    WHEN connected_at is null THEN 'unsuccess'
                                    ELSE 'success'
                                END as connected_flag
                                from call_log c left join agent_log a on c.id=a.call_id 
                                where  1 $more_where order by c.calldate asc");

        //dd(gettype($call_log));

        //dd($call_log);

        $num_key = 1; //0 wil always return false , so start from 1
        $calldate = array();
        $total_in = array();
        $total_out = array();
        $success_in = array();
        $success_out = array();
        $queue_drop = array();
        $ivr_drop = array();
        $total_queue_time = array();
        $queue_count = array();
        $total_talk_in = array();
        $total_talk_out = array();



        foreach ($call_log as $item) {
            $item  = (array) $item;
            //talk time calculation
            /*$agent_delay = 0;
            foreach ($arr_agent_delay as $row) {
                if ($row['group_name'] == $item['campaign_id']) {
                    $agent_delay = $row['delay'];
                    break;
                }
            }
            $temp_talk_time = $item['length_in_sec'] - $item['queue_seconds'] - $agent_delay;
            if ($temp_talk_time < 0) {
                $temp_talk_time = 0;
            }
            // end*/

            $key = array_search($item['calldate'], $calldate);
            if ($key == false) { //that means not found, so other array should be empty too
                $key = $num_key;
                $num_key++;

                $calldate[$key] = $item['calldate'];

                //initialize
                $total_in[$key] = 0;
                $total_out[$key] = 0;
                $success_in[$key] = 0;
                $success_out[$key] = 0;
                $queue_drop[$key] = 0;
                $ivr_drop[$key] = 0;
                $queue_count[$key] = 0;
                $total_queue_time[$key] = 0;
                $total_talk_in[$key] = 0;
                $total_talk_out[$key] = 0;
            } else {
                //found, so no initialization needed
            }


            if ($item['call_type'] == 'in') {
                $total_in[$key] += 1;
                if ($item['incoming_queued_at'] != "") {
                    $queue_count[$key] += 1;
                    if ($item['connected_at'] != '') {
                        $total_queue_time[$key] += strtotime($item['connected_at']) - strtotime($item['incoming_queued_at']);
                    } else {
                        $total_queue_time[$key] += strtotime($item['hangup_handler_time']) - strtotime($item['incoming_queued_at']);
                    }
                }

                if ($item['connected_at'] != "") {
                    $success_in[$key] += 1;
                    $total_talk_in[$key] += $item['talk_sec'];
                } else {
                    if ($item['call_status_before_hangup'] == 'INGROUP') {
                        $queue_drop[$key] += 1;
                    } else if ($item['call_status_before_hangup'] == 'CALLMENU') {
                        $ivr_drop[$key] += 1;
                    }
                }
            } else {
                $total_out[$key] += 1;
                if ($item['connected_at'] != "") {
                    $success_out[$key] += 1;
                    $total_talk_out[$key] += $item['talk_sec'];
                } else {
                    //we can calculate unsuccessful outgoing call here
                }
            }
        }

        $outputs = array();
        foreach ($calldate as $k => $v) {
            $outputs[] = array(
                'calldate' => $v,
                'total_in' => $total_in[$k],
                'total_out' => $total_out[$k],
                'success_in' => $success_in[$k],
                'success_out' => $success_out[$k],
                'abandoned_in' => $total_in[$k] - $success_in[$k],
                'unsuccessful_out' => $total_out[$k] - $success_out[$k],
                'queue_drop' => $queue_drop[$k],
                'ivr_drop' => $ivr_drop[$k],
                'total_talk_in' => $total_talk_in[$k],
                'avg_talk_in' => $success_in[$k] > 0 ? ($total_talk_in[$k] / $success_in[$k]) : 0,
                'total_talk_out' => $total_talk_out[$k],
                'avg_talk_out' => $success_out[$k] > 0 ? ($total_talk_out[$k] / $success_out[$k]) : 0,
                'total_queue_time' => $total_queue_time[$k],
                'queue_count' => $queue_count[$k],
                'avg_queue_time' => $queue_count[$k] > 0 ? ($total_queue_time[$k] / $queue_count[$k]) : 0,
            );
        }
        // dd($outputs);

        echo json_encode($outputs);
    }

    public function search1(Request $request)
    {

        $availed = $request->availed;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $str = '';
        if ($availed != '') {
            $str .= " and availed ='$availed' ";
        }

        if ($from_date != '') {
            $str .= " and DATE(created_at) >= '$from_date' ";
        }
        if ($to_date != '') {
            $str .= " and DATE(created_at) <= '$to_date' ";
        }
        // echo $str;

        $json_data = array(
            "additional_query" => $str,
        );
        echo json_encode($json_data);
    }

    public function paging(Request $request)
    {
        // DataTable sends this draw, search, start, length
        $draw = $request->draw;
        $search = $request->search;
        $start = $request->start;
        $length = $request->length;

        // additional_query is the query string for filtering data 
        // form submit calles search which genarate this Query String 
        $additional_query = $request->additional_query;

        $bookings = DB::select("SELECT * FROM bookings WHERE 1 $additional_query limit $start ,$length");
        //$recordsTotal = booking::select('id')->get()->count();
        $count_result = DB::select("SELECT count(*) as total FROM bookings WHERE 1 $additional_query ");
        $recordsTotal = $count_result[0]->total;
        $recordsFiltered = $recordsTotal; //by default its equal to total record when no search applied
        // dd($count_result);
        // print_r($count_result);

        $output = array();
        foreach ($bookings as $item) {
            $id = $item->id;
            $view_button = "<a href='booking/show/$id' class='badge badge-success'>View</a>";
            $edit_button = "<a href='booking/edit/$id' class='badge bg-secondary'>Edit</a>";
            $delete_button = "<a href='booking/delete/$id' class='badge badge-danger'>Delete</a>";
            $output[] = array(
                $item->name, $item->phone, $item->service_type, $item->service_title, $item->availed,
                "$view_button&nbsp;&nbsp$edit_button&nbsp;&nbsp;"
            );
        }

        $json_data = array(
            "draw"            => $draw,
            "recordsTotal"    => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data"            => $output   // total data array
        );
        echo json_encode($json_data);
    }
}
