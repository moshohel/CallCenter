<?php

namespace App\Http\Controllers;


// use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
// use Request;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function dashboard()
    {
        return view('pages.dashboard');
    }


    public function live()
    {
        return view('pages.live');
    }

    public function apiLive()
    {
        // dd(Request::ip());
        // $ip = Request::ip();
        $fields = array(); //'call_type'=>'isd');
        //$url="localhost:5151/callmonitor_new_api/index.php";
        $url = "http://172.16.252.7/cc_api/get_live_data.php";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HEADER, false); //or you will get header response along with json response
        /*curl_setopt( $ch,CURLOPT_HTTPHEADER, array(
                                                'Authorization:'. sha1('ssltonic654')
                                                ,'Content-Type: application/json'
                                                )
                    );*/
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Request Error:' . curl_error($ch);
        }
        curl_close($ch);
        print_r($result);
        // dd($result);
    }

    public function apiLiveDashboard()
    {
        // dd(Request::ip());
        $fields = array(); //'call_type'=>'isd');
        //$url="localhost:5151/callmonitor_new_api/index.php";
        $url = "172.16.252.7/cc_api/get_dashboard_data_admin_panel.php";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HEADER, false); //or you will get header response along with json response
        /*curl_setopt( $ch,CURLOPT_HTTPHEADER, array(
                                                'Authorization:'. sha1('ssltonic654')
                                                ,'Content-Type: application/json'
                                                )
                    );*/
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Request Error:' . curl_error($ch);
        }
        curl_close($ch);
        print_r($result);
        // dd($result);
    }

    public function systemInfo()
    {
        //cpu stat
        $prevVal = shell_exec("cat /proc/stat");
        $prevArr = explode(' ', trim($prevVal));
        // print_r($prevArr);
        $prevTotal = $prevArr[2] + $prevArr[3] + $prevArr[4] + $prevArr[5];
        $prevIdle = $prevArr[5];
        usleep(0.15 * 1000000);
        $val = shell_exec("cat /proc/stat");
        $arr = explode(' ', trim($val));
        $total = $arr[2] + $arr[3] + $arr[4] + $arr[5];
        $idle = $arr[5];
        $intervalTotal = intval($total - $prevTotal);
        $stat['cpu'] =  intval(100 * (($intervalTotal - ($idle - $prevIdle)) / $intervalTotal));
        $cpu_result = shell_exec("cat /proc/cpuinfo | grep model\ name");
        $stat['cpu_model'] = strstr($cpu_result, "\n", true);
        $stat['cpu_model'] = str_replace("model name    : ", "", $stat['cpu_model']);

        $cpuUses = shell_exec("top -bn2 | grep '%Cpu' | tail -1 | grep -P '(....|...) id,'|awk '{print  100-$8 }'");
        $upTime = shell_exec("uptime");
        $upTimeArr = explode(' ', trim($upTime));
        $stat['up_time'] = $upTimeArr[2];
        $stat['cpu_use_percentage'] = $cpuUses;
        //        print_r($upTimeArr);
        //        echo "<br>";
        //        print_r($stat['up_time']);
        //        echo "<br>";
        //        print_r('Server Up time : ' . $upTimeArr[2] . ' ' . $upTimeArr[3]);
        //        dd($upTime);
        //memory stat
        $stat['mem_percent'] = round(shell_exec("free | grep Mem | awk '{print $3/$2 * 100.0}'"), 2);
        $mem_result = shell_exec("cat /proc/meminfo | grep MemTotal");
        $stat['mem_total'] = round(preg_replace("#[^0-9]+(?:\.[0-9]*)?#", "", $mem_result) / 1024 / 1024, 3);
        $mem_result = shell_exec("cat /proc/meminfo | grep MemFree");
        $stat['mem_free'] = round(preg_replace("#[^0-9]+(?:\.[0-9]*)?#", "", $mem_result) / 1024 / 1024, 3);
        $stat['mem_used'] = $stat['mem_total'] - $stat['mem_free'];
        //hdd stat
        $stat['hdd_free'] = round(disk_free_space("/") / 1024 / 1024 / 1024, 2);
        $stat['hdd_total'] = round(disk_total_space("/") / 1024 / 1024 / 1024, 2);
        $stat['hdd_used'] = $stat['hdd_total'] - $stat['hdd_free'];
        $stat['hdd_percent'] = round(sprintf('%.2f', ($stat['hdd_used'] / $stat['hdd_total']) * 100), 2);
        //network stat
        // $stat['network_rx'] = round(trim(file_get_contents("/sys/class/net/eth0/statistics/rx_bytes")) / 1024/ 1024/ 1024, 2);
        // $stat['network_tx'] = round(trim(file_get_contents("/sys/class/net/eth0/statistics/tx_bytes")) / 1024/ 1024/ 1024, 2);
        //output headers
        header('Content-type: text/json');
        header('Content-type: application/json');
        //output data by json
        echo
        "{  \"up_time\":  \"$stat[up_time]\"
            ,\"cpu_use_percentage\": " . $stat['cpu_use_percentage'] . ",
            \"mem_percent\": " . $stat['mem_percent'] . ", \"mem_total\":" . $stat['mem_total'] . ", \"mem_used\":" . $stat['mem_used'] . ", \"mem_free\":" . $stat['mem_free'] . //mem stats
            ", \"hdd_free\":" . $stat['hdd_free'] . ", \"hdd_total\":" . $stat['hdd_total'] . ", \"hdd_used\":" . $stat['hdd_used'] . ", \"hdd_percent\":" . $stat['hdd_percent'] . //hdd stats

            "}";
    }

    public function callSummary()
    {
        $more_where = '';
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
                'avg_queue_time' => $queue_count[$k] > 0 ? ($total_queue_time[$k] / $queue_count[$k]) : 0
            );
        }
        // dd($outputs);

        return view('pages.reports.callSummary')->with('outputs', $outputs);
    }

    public function callReport()
    {
        return view('pages.reports.callReport');
    }

    public function apiCallReport()
    {
        $fields = array(); //'call_type'=>'isd');
        //$url="localhost:5151/callmonitor_new_api/index.php";
        $url = "http://172.16.252.7/cc_api/get_call_report.php";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HEADER, false); //or you will get header response along with json response
        /*curl_setopt( $ch,CURLOPT_HTTPHEADER, array(
                                                'Authorization:'. sha1('ssltonic654')
                                                ,'Content-Type: application/json'
                                                )
                    );*/
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Request Error:' . curl_error($ch);
        }
        curl_close($ch);
        print_r($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
