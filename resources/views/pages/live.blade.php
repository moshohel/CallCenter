@extends('layouts.layout')

@push('css')
      <!-- data tables css -->
    <link rel="stylesheet" href={{ asset("assets/css/plugins/dataTables.bootstrap4.min.css")}}>
@endpush

@section('content')

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="page-header-title">
                            <a href="{{ route('live') }}"><h5 class="m-b-10">Live</h5></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="page-header-title col">
                                <h5 class="m-b-10">Refresh Timer: <samp id='seconds-counter'>0</samp> Sec</h5>
                            </div>
                            <div class="col">
                                <button type="button" class="btn  btn-info" onClick="window.location.reload();">Refresh</button>
                                {{-- <button type="button" class="btn  btn-success">Setting</button> --}}
                                <div class="btn-group">
                                    <button class="btn  btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" style="display: none">Setting</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#!">Action</a>
                                        <a class="dropdown-item" href="#!">Another</a>
                                        <a class="dropdown-item" href="#!">Something</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <div class="row">
            <div class="col-lg col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="text-c-yellow">300</h4>
                                <h6 class="text-muted m-b-0">Total Calls</h6>
                            </div>
                            <div class="col-4 text-end">
                                <i class="feather icon-bar-chart-2 f-28"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-c-yellow">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <p class="text-white m-b-0">Total</p>
                            </div>
                            <div class="col-3 text-end">
                                <i class="feather icon-trending-up text-white f-16"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="text-c-green">2</h4>
                                <h6 class="text-muted m-b-0">Live Calls</h6>
                            </div>
                            <div class="col-4 text-end">
                                <i class="feather icon-file-text f-28"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-c-red">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <p class="text-white m-b-0">Live</p>
                            </div>
                            <div class="col-3 text-end">
                                <i class="feather icon-trending-up text-white f-16"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="text-c-yellow">30</h4>
                                <h6 class="text-muted m-b-0">Total </h6>
                            </div>
                            <div class="col-4 text-end">
                                <i class="feather icon-bar-chart-2 f-28"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-c-purple">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <p class="text-white m-b-0">Agents</p>
                            </div>
                            <div class="col-3 text-end">
                                <i class="feather icon-trending-up text-white f-16"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="text-c-green">2</h4>
                                <h6 class="text-muted m-b-0">Logged In</h6>
                            </div>
                            <div class="col-4 text-end">
                                <i class="feather icon-file-text f-28"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-c-green">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <p class="text-white m-b-0"> Agent</p>
                            </div>
                            <div class="col-3 text-end">
                                <i class="feather icon-trending-up text-white f-16"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="text-c-blue">5</h4>
                                <h6 class="text-muted m-b-0">Paused</h6>
                            </div>
                            <div class="col-4 text-end">
                                <i class="feather icon-thumbs-down f-28"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-c-red">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <p class="text-white m-b-0"> Agents</p>
                            </div>
                            <div class="col-3 text-end">
                                <i class="feather icon-trending-down text-white f-16"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <h5>Inbound Calls <br><span class="badge badge-success">Placement</span></h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm mb-0">
                                <tbody>
                                    <tr>
                                        <td>Inbound Live Calls</td>
                                        <td> : 6</td>
                                    </tr>
                                    <tr>
                                        <td>Calls in IVR</td>
                                        <td> : 2</td>
                                    </tr>
                                    <tr>
                                        <td>Calls in Queue</td>
                                        <td> : 1</td>
                                    </tr>
                                    <tr>
                                        <td>Drop Calls</td>
                                        <td> : 1</td>
                                    </tr>
                                    <tr>
                                        <td>Total Drop Calls</td>
                                        <td class="text-wrap"> : 2</td>
                                    </tr>
                                    <tr>
                                        <td>Answered Calls</td>
                                        <td> : 90</td>
                                    </tr>
                                    <tr>
                                        <td>Dropped Percentage</td>
                                        <td  class="text-wrap"> : 10%</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                        <button class="btn btn-primary">Details</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <h5>Outbound <br><span class="badge badge-danger">Festival</span></h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm mb-0">
                                <tbody>
                                    <tr>
                                        <td>Outbound Live Calls</td>
                                        <td> : 10</td>
                                    </tr>
                                    <tr>
                                        <td>Outbound Answered Calls/Success</td>
                                        <td> : 6</td>
                                    </tr>
                                    <tr>
                                        <td>Outbound Failed Calls/Abandoned/Unsuccessful Calls</td>
                                        <td> : 2</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                        <button class="btn btn-primary">Details</button>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    {{-- <div class="card-body" style="height: 400px;">
                        <canvas id="inboundChart"></canvas>
                    </div> --}}
                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                        <canvas id="inboundChart" style="display: block; height: 340px; width: 494px;" class="chartjs-render-monitor"></canvas>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            {{-- <img src="assets/images/pages/festival.svg" alt="image" class="img-fluid wid-100 mb-2"> --}}
                            <h5>Inbound <br><span class="badge badge-danger">Festival</span></h5>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                        <canvas id="outboundChart" style="display: block; height: 340px; width: 494px;" class="chartjs-render-monitor"></canvas>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            
                            <h5>Out Inbound <br><span class="badge badge-danger">Festival</span></h5>
                        </div>
                    </div>
                </div>
                
            </div>

            {{-- <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                        <canvas id="outboundChart_test" style="display: block; height: 340px; width: 494px;" class="chartjs-render-monitor"></canvas>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            
                            <h5>Out Inbound <br><span class="badge badge-danger">Festival</span></h5>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Bar chart horizontal</h5>
                    </div>
                    <div class="card-body">
                        <div id="bar-chart-3"></div>
                    </div>
                </div>
            </div> --}}

        </div>

        <div class="row">
            <!-- Live Calls table data-advance-custom start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Live Calls</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive dt-responsive">
                            <table id="colum-rendr" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Agent Name</th>
                                        <th>Campaign</th>
                                        <th>Customer Number</th>
                                        <th>Call Status</th>
                                        <th>DID</th>
                                        <th>Call Duration</th>
                                        <th>Whisper</th>
                                        <th>Conference</th>
                                        <th>Pause Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Quinn Flynn</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                        <td>01678909876</td>
                                        <td>Go</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>63</td>
                                        <td>2011/07/25</td>
                                        <td>$170,750</td>
                                        <td>01678909876</td>
                                        <td>Go</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <td>Junior Technical Author</td>
                                        <td>San Francisco</td>
                                        <td>66</td>
                                        <td>2009/01/12</td>
                                        <td>$86,000</td>
                                        <td>01678909876</td>
                                        <td>Go</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Cedric Kelly</td>
                                        <td>Senior Javascript Developer</td>
                                        <td>Edinburgh</td>
                                        <td>22</td>
                                        <td>2012/03/29</td>
                                        <td>$433,060</td>
                                        <td>01678909876</td>
                                        <td>Go</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Airi Satou</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>33</td>
                                        <td>2008/11/28</td>
                                        <td>$162,700</td>
                                        <td>01678909876</td>
                                        <td>Go</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Brielle Williamson</td>
                                        <td>Integration Specialist</td>
                                        <td>New York</td>
                                        <td>61</td>
                                        <td>2012/12/02</td>
                                        <td>$372,000</td>
                                        <td>01678909876</td>
                                        <td>Go</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Herrod Chandler</td>
                                        <td>Sales Assistant</td>
                                        <td>San Francisco</td>
                                        <td>59</td>
                                        <td>2012/08/06</td>
                                        <td>$137,500</td>
                                        <td>01678909876</td>
                                        <td>Go</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Rhona Davidson</td>
                                        <td>Integration Specialist</td>
                                        <td>Tokyo</td>
                                        <td>55</td>
                                        <td>2010/10/14</td>
                                        <td>$327,900</td>
                                        <td>01678909876</td>
                                        <td>Go</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Colleen Hurst</td>
                                        <td>Javascript Developer</td>
                                        <td>San Francisco</td>
                                        <td>39</td>
                                        <td>2009/09/15</td>
                                        <td>$205,500</td>
                                        <td>01678909876</td>
                                        <td>Go</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Sonya Frost</td>
                                        <td>Software Engineer</td>
                                        <td>Edinburgh</td>
                                        <td>23</td>
                                        <td>2008/12/13</td>
                                        <td>$103,600</td>
                                        <td>01678909876</td>
                                        <td>Go</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Jena Gaines</td>
                                        <td>Office Manager</td>
                                        <td>London</td>
                                        <td>30</td>
                                        <td>2008/12/19</td>
                                        <td>$90,560</td>
                                        <td>01678909876</td>
                                        <td>Go</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Quinn Flynn</td>
                                        <td>Support Lead</td>
                                        <td>Edinburgh</td>
                                        <td>22</td>
                                        <td>2013/03/03</td>
                                        <td>$342,000</td>
                                        <td>01678909876</td>
                                        <td>Go</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Charde Marshall</td>
                                        <td>Regional Director</td>
                                        <td>San Francisco</td>
                                        <td>36</td>
                                        <td>2008/10/16</td>
                                        <td>$470,600</td>
                                        <td>01678909876</td>
                                        <td>Go</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Haley Kennedy</td>
                                        <td>Senior Marketing Designer</td>
                                        <td>London</td>
                                        <td>43</td>
                                        <td>2012/12/18</td>
                                        <td>$313,500</td>
                                        <td>01678909876</td>
                                        <td>Go</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Tatyana Fitzpatrick</td>
                                        <td>Regional Director</td>
                                        <td>London</td>
                                        <td>19</td>
                                        <td>2010/03/17</td>
                                        <td>$385,750</td>
                                        <td>01678909876</td>
                                        <td>Go</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Michael Silva</td>
                                        <td>Marketing Designer</td>
                                        <td>London</td>
                                        <td>66</td>
                                        <td>2012/11/27</td>
                                        <td>$198,500</td>
                                        <td>01678909876</td>
                                        <td>Go</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Paul Byrd</td>
                                        <td>Chief Financial Officer (CFO)</td>
                                        <td>New York</td>
                                        <td>64</td>
                                        <td>2010/06/09</td>
                                        <td>$725,000</td>
                                        <td>01678909876</td>
                                        <td>Go</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Gloria Little</td>
                                        <td>Systems Administrator</td>
                                        <td>New York</td>
                                        <td>59</td>
                                        <td>2009/04/10</td>
                                        <td>$237,500</td>
                                        <td>01678909876</td>
                                        <td>Go</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Bradley Greer</td>
                                        <td>Software Engineer</td>
                                        <td>London</td>
                                        <td>41</td>
                                        <td>2012/10/13</td>
                                        <td>$132,000</td>
                                        <td>01678909876</td>
                                        <td>Go</td>
                                        <td>Yes</td>
                                    </tr>
                                    <tr>
                                        <td>Dai Rios</td>
                                        <td>Personnel Lead</td>
                                        <td>Edinburgh</td>
                                        <td>35</td>
                                        <td>2012/09/26</td>
                                        <td>$217,500</td>
                                        <td>01678909876</td>
                                        <td>Go</td>
                                        <td>Yes</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Agent Name</th>
                                        <th>Campaign</th>
                                        <th>Customer Number</th>
                                        <th>Call Status</th>
                                        <th>DID</th>
                                        <th>Call Duration</th>
                                        <th>Whisper</th>
                                        <th>Conference</th>
                                        <th>Pause Code</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Live Calls table end -->

            <!-- Live Agents table data-basic-custom start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Live Agents</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Extention</th>
                                        <th>Agent Name</th>
                                        <th>Status</th>
                                        <th>Status Code</th>
                                        <th>Duration</th>
                                        <th>Incoming Calls</th>
                                        <th>Outgoing Calls</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Quinn Flynn</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>66</td>
                                        <td>9</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>09.00 AM</td>
                                        <td>07.00 PM</td>
                                        <td>7.9</td>
                                        <td>44</td>
                                        <td>8</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>34</td>
                                        <td>7</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Cedric Kelly</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>43</td>
                                        <td>3</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Airi Satou</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>9</td>
                                        <td>33</td>
                                    </tr>
                                    <tr>
                                        <td>Brielle Williamson</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>35</td>
                                        <td>2</td>
                                        <td>66</td>
                                    </tr>
                                    <tr>
                                        <td>Herrod Chandler</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>15</td>
                                        <td>8</td>
                                        <td>21</td>
                                    </tr>
                                    <tr>
                                        <td>Rhona Davidson</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>45</td>
                                        <td>2</td>
                                        <td>18</td>
                                    </tr>
                                    <tr>
                                        <td>Colleen Hurst</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Sonya Frost</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Jena Gaines</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Quinn Flynn</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Charde Marshall</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Haley Kennedy</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Tatyana Fitzpatrick</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Michael Silva</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Paul Byrd</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Gloria Little</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Bradley Greer</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Dai Rios</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Extention</th>
                                        <th>Agent Name</th>
                                        <th>Status</th>
                                        <th>Status Code</th>
                                        <th>Duration</th>
                                        <th>Incoming Calls</th>
                                        <th>Outgoing Calls</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Live Agents table end -->

            <!-- Agent Summery table start -->
            {{-- <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Agent Summery</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive dt-responsive">
                            <table id="colum-rendr" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Agent Name</th>
                                        <th>Login Time</th>
                                        <th>Last LogOut</th>
                                        <th>Working Hours</th>
                                        <th>Incoming Calls</th>
                                        <th>Outgoing Calls</th>
                                        <th>Pause Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Quinn Flynn</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>09.00 AM</td>
                                        <td>07.00 PM</td>
                                        <td>9</td>
                                        <td>25</td>
                                        <td>9</td>
                                        <td>44</td>
                                    </tr>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Cedric Kelly</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Airi Satou</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Brielle Williamson</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Herrod Chandler</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Rhona Davidson</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Colleen Hurst</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Sonya Frost</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Jena Gaines</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Quinn Flynn</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Charde Marshall</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Haley Kennedy</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Tatyana Fitzpatrick</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Michael Silva</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Paul Byrd</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Gloria Little</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Bradley Greer</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                    <tr>
                                        <td>Dai Rios</td>
                                        <td>08.00 AM</td>
                                        <td>02.00 PM</td>
                                        <td>6</td>
                                        <td>25</td>
                                        <td>5</td>
                                        <td>13</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Agent Name</th>
                                        <th>Login Time</th>
                                        <th>Last LogOut</th>
                                        <th>Working Hours</th>
                                        <th>Incoming Calls</th>
                                        <th>Outgoing Calls</th>
                                        <th>Pause Time</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- Agent Summery table end -->
        </div>
        
    </div>

    </div>
  </div>
  <!-- Button trigger modal -->

@endsection

@section('scripts')

<!-- chartjs js -->
{{-- <script src={{asset("assets/js/plugins/Chart.min.js")}}></script> --}}
<script src={{asset("assets/js/plugins/jquery-ui.min.js")}}></script>
{{-- <script src={{asset("assets/js/plugins/apexcharts.min.js")}}></script> --}}
{{-- <script src={{asset("assets/js/pages/chart-chart-custom.js")}}></script> --}}

{{-- <script src={{asset("assets/js/ripple.js")}}></script>
<script src={{asset("assets/js/pcoded.min.js")}}></script> --}}

<script type="text/javascript" src="{{ asset('assets/js/plugins/Chart2019.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> --}}

<!-- datatable Js -->
<script src={{ asset("assets/js/plugins/jquery.dataTables.min.js")}}></script>
<script src={{ asset("assets/js/plugins/dataTables.bootstrap4.min.js")}}></script>
<script src={{ asset("assets/js/pages/data-advance-custom.js")}}></script>
<script src={{ asset("assets/js/pages/data-basic-custom.js") }}></script>

<script>
    var seconds = 0;
    var el = document.getElementById('seconds-counter');

    function incrementSeconds() {
        seconds += 1;
        el.innerText = seconds;
        if(seconds==30)
        {
            window.location.reload();
        }
    }

    var cancel = setInterval(incrementSeconds, 1000);
</script>

<script>
    var ctx = document.getElementById("inboundChart");
    let data1 = {
      datasets: [{
         label: "Inbound Live",
         backgroundColor: "#AF7333",
         data: [15],
      },{
         label: "Calls in IVR",
         backgroundColor: "#ff5252",
         data: [34],
      },{
         label: "Calls in Queue",
         backgroundColor: "#00acc1",
         data: [8],
      },{
         label: "Drop Calls",
         backgroundColor: "#2A7888",
         data: [41],
      },{
         label: "Total Drop",
         backgroundColor: "#FF7777",
         data: [18],
      },{
         label: "Answered",
         backgroundColor: "#109d4b",
         data: [27],
      },{
         label: "Dropped Percentage",
         backgroundColor: "#4A7888",
         data: [17],
      }]
    };

    let data = {
    labels: ["Inbound Live", "Calls in IVR", "Calls in Queue", "Drop Calls", "Total Drop", "Answered", "Dropped Percentage"],
    datasets: [{
      label: 'Inbound Live',
      backgroundColor: "#000080",
         data: [10, 0, 0, 0, 0, 0, 0],
    }, {
      label: 'Calls in IVR',
      backgroundColor: "#d3d3d3",
      data: [0,70,0, 0, 0, 0, 0]
    }, {
      label: 'Calls in Queue',
      backgroundColor: "#add8e6",
      data: [0,0,45, 0, 0, 0]
    },{
      label: 'Drop Calls',
      backgroundColor: "#000080",
         data: [10, 0, 0, 0, 0, 0, 0],
    }, {
      label: 'Total Drop',
      backgroundColor: "#d3d3d3",
      data: [0,70,0, 0, 0, 0, 0]
    }, {
      label: 'Answered',
      backgroundColor: "#add8e6",
      data: [0,0,45, 0, 0, 0]
    }, {
      label: 'Dropped Percentage',
      backgroundColor: "#add8e6",
      data: [0,0,45, 0, 0, 0]
    }]
  };
    
    const myChart = new Chart(ctx, {
      type: 'bar',
      data: data1,
      options: {
        responsive: true,
        "hover": {
          "animationDuration": 0
        },
        "animation": {
            "duration": 500,
            "easing": 'easeInQuart',
          "onComplete": function() {
            var chartInstance = this.chart,
              ctx = chartInstance.ctx;
  
            ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
            ctx.textAlign = 'center';
            ctx.textBaseline = 'bottom';
  
            this.data.datasets.forEach(function(dataset, i) {
              var meta = chartInstance.controller.getDatasetMeta(i);
              meta.data.forEach(function(bar, index) {
                var data = dataset.data[index];
                ctx.fillText(data, bar._model.x, bar._model.y - 5);
              });
            });
          }
        },
        legend: {
          "display": true,
          position: 'bottom'
        },
        tooltips: {
          "enabled": true
        },
        scales: {
          yAxes: [{
            display: true,
            gridLines: {
              display: false
            },
            ticks: {
            //   max: Math.max(...data.datasets[0].data) + 10,
              display: true,
              beginAtZero: true,
            //   mirror: false,
                // fontSize: 18,
                // labelOffset: -22
            },
            scaleLabel: {
                  display: true,
                //   labelString: 'IN Taka',
                }
          }],
          xAxes: [{
            // labels: ["Inbound Live", "Calls in IVR", "Calls in Queue", "Drop Calls", "Total Drop", "Answered", "Dropped Percentage"],
            gridLines: {
              display: false
            },
            ticks: {
              beginAtZero: true,
                mirror: false,
                fontSize: 18,
                labelOffset: -22
            }
          }]
        }
      }
    });
</script>

<script>
    var ctx = document.getElementById("outboundChart");
    // debugger;
    let dataOutboundChart = {
        // labels: ["Inbound Live", "Calls in IVR", "Calls in Queue", "Drop Calls", "Total Drop", "Answered", "Dropped Percentage"],
      datasets: [{
         label: "Outbound Live Calls",
         backgroundColor: "#AF7333",
         data: [150],
      },{
         label: "Outbound Failed Calls",
         backgroundColor: "#FA4444",
         data: [Math.random() * 1000],
      },{
         label: "Outbound Answered Calls",
         backgroundColor: "#45A888",
         data: [Math.random() * 1000],
      },{
         label: "Dropped Percentage",
         backgroundColor: "#4A7888",
         data: [Math.random() * 100],
      }]
    };
    // const ctx = canvas.getContext("2d");
    const outboundChart = new Chart(ctx, {
      type: 'bar',
      data: dataOutboundChart,
      options: {
        responsive: true,
        "hover": {
          "animationDuration": 0
        },
        "animation": {
            "duration": 500,
            "easing": 'easeInQuart',
          "onComplete": function() {
            var chartInstance = this.chart,
              ctx = chartInstance.ctx;
  
            ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
            ctx.textAlign = 'center';
            ctx.textBaseline = 'bottom';
  
            this.data.datasets.forEach(function(dataset, i) {
              var meta = chartInstance.controller.getDatasetMeta(i);
              meta.data.forEach(function(bar, index) {
                var data = dataset.data[index];
                ctx.fillText(data, bar._model.x, bar._model.y - 5);
              });
            });
          }
        },
        legend: {
          "display": true,
          position: 'bottom'
        },
        tooltips: {
          "enabled": true
        },
        scales: {
          yAxes: [{
            display: true,
            gridLines: {
              display: false
            },
            ticks: {
            //   max: Math.max(...data.datasets[0].data) + 10,
              display: true,
              beginAtZero: true,
            //   mirror: false,
                // fontSize: 18,
                // labelOffset: -22
            },
            scaleLabel: {
                  display: true,
                //   labelString: 'IN Taka',
                }
          }],
          xAxes: [{
            // labels: ["Inbound Live", "Calls in IVR", "Calls in Queue", "Drop Calls", "Total Drop", "Answered", "Dropped Percentage"],
            gridLines: {
              display: false
            },
            ticks: {
              beginAtZero: true,
                mirror: false,
                fontSize: 18,
                labelOffset: -22
            }
          }]
        }
      }
    });
</script>

{{-- <script>
    var ctx = document.getElementById("outboundChart_test").getContext('2d');
    var stakeholderChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Inbound Live", "Calls in IVR", "Calls in Queue", "Drop Calls", "Total Drop", "Answered", "Dropped Percentage"],
            datasets: [{
            backgroundColor: "#527a82",
            data: [74, 94, 68,7,65,63,70],
            }],

        },
        options:  {
            "hover": 
            {
                "animationDuration": 0
            },
            responsive: true,
            "animation": {
                "duration": 500,
                "easing": 'easeOutQuart',
                "onComplete": function() {
                var chartInstance = this.chart
                ctx = chartInstance.ctx;
                ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                ctx.fillStyle = this.chart.config.options.defaultFontColor;
                ctx.textAlign = 'left';
                ctx.textBaseline = 'bottom';

                this.data.datasets.forEach(function(dataset, i) {
                    var meta = chartInstance.controller.getDatasetMeta(i);
                    meta.data.forEach(function(bar, index) {
                        var data = dataset.data[index];
                        ctx.fillText(data, bar._model.x, bar._model.y - 5);
                    });
                });
                }
            },
        
        } 
    });
</script> --}}

{{-- <Script>
    $(document).ready(function() {
    setTimeout(function() {
        $(function() {
            var options = {
                chart: {
                    height: 350,
                    type: 'bar',
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        dataLabels: {
                            position: 'top',
                        },
                    }
                },
                colors: ["#0e9e4a"],
                dataLabels: {
                    enabled: true,
                    offsetX: -6,
                    style: {
                        fontSize: '12px',
                        colors: ['#fff']
                    }
                },
                stroke: {
                    show: true,
                    width: 1,
                    colors: ['#fff','#FA4444']
                },
                series: [{
                    data: [93, 32, 33, 52, 13, 44, 32]
                }],
                xaxis: {
                    categories: ["Inbound Live", "Calls in IVR", "Calls in Queue", "Drop Calls", "Total Drop", "Answered", "Dropped Percentage"],
                },

            }
            var chart = new ApexCharts(
                document.querySelector("#bar-chart-3"),
                options
            );
            chart.render();
        });

    }, 100);
});
</Script> --}}

@endsection