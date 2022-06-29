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

    public function callReport()
    {
        return view('pages.reports.callReport');
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
