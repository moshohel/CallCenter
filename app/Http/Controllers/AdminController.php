<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;

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
