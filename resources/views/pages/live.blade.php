@extends('layouts.layout')

@push('css')
<!-- data tables css -->
<link rel="stylesheet" href={{ asset("assets/css/plugins/dataTables.bootstrap4.min.css")}}>
@endpush

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-header-title">
                    <a href="{{ route('live') }}">
                        <h5 class="m-b-10">Live</h5>
                    </a>
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
                        <h2 id="total_calls">0</h2>
                        <h6 class=" m-b-0">Total</h6>
                    </div>
                    <div class="col-4 text-end">
                        {{-- <i class="feather icon-bar-chart-2 f-28"></i> --}}
                    </div>
                </div>
            </div>
            <div class="card-footer bg-c-green">
                <div class="row align-items-center">
                    <div class="col-9">
                        <p class="text-white m-b-0">Call</p>
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
                        <h2 id="live_calls">0</h2>
                        <h6 class=" m-b-0">Live</h6>
                    </div>
                    <div class="col-4 text-end">
                        {{-- <i class="feather icon-file-text f-28"></i> --}}
                    </div>
                </div>
            </div>
            <div class="card-footer bg-info">
                <div class="row align-items-center">
                    <div class="col-9">
                        <p class="text-white m-b-0">Call</p>
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
                        <h2 id="total_agents">0</h2>
                        <h6 class=" m-b-0">Total </h6>
                    </div>
                    <div class="col-4 text-end">
                        {{-- <i class="feather icon-bar-chart-2 f-28"></i> --}}
                    </div>
                </div>
            </div>
            <div class="card-footer bg-c-purple">
                <div class="row align-items-center">
                    <div class="col-9">
                        <p class="text-white m-b-0">Agent</p>
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
                        <h2 id="logged_id_agents">0</h2>
                        <h6 class=" m-b-0">Logged In</h6>
                    </div>
                    <div class="col-4 text-end">
                        {{-- <i class="feather icon-file-text f-28"></i> --}}
                    </div>
                </div>
            </div>
            <div class="card-footer bg-secondary">
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
                        <h2 id="paused_agents">0</h2>
                        <h6 class=" m-b-0">Paused</h6>
                    </div>
                    <div class="col-4 text-end">
                        {{-- <i class="feather icon-thumbs-down f-28"></i> --}}
                    </div>
                </div>
            </div>
            <div class="card-footer bg-danger">
                <div class="row align-items-center">
                    <div class="col-9">
                        <p class="text-white m-b-0"> Agent</p>
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
                                <td class="text-wrap"> : 10%</td>
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

<!-- [ vertically-modal ] start -->
<div id="exampleModalCenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div>
                <h5 class="modal-title m-4 text-primary" id="exampleModalCenterTitle" style="text-align: center">Loading
                    ..</h5>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            {{-- <h6 style="text-align: center">Loading...</h6> --}}
            <div class="modal-body m-5" style="height: 30%; height: 50%;">
                <div class="d-flex justify-content-center">
                    <img style="width: 20%; height: 20%;" src={{ asset('assets/images/loading3.gif') }} alt="">
                    {{-- <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-border text-secondary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-border text-success" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-border text-danger" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-border text-warning" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-border text-info" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>

                    <div class="spinner-border text-dark" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-border text-light" role="status">
                        <span class="sr-only">Loading...</span>
                    </div> --}}
                </div>

            </div>

        </div>
    </div>
</div>
<!-- [ vertically-modal ] end -->
<div class="modal-content" style="display: none" id="spinner_gif">
    <div class="modal-body" style="position: center">
        <img src={{ asset('assets/images/spinnervlll.gif') }} alt="">
    </div>
</div>

{{-- <div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h6 style="text-align: center">Loading...</h6>
                <div class="d-flex justify-content-center">
                    <div class="spinner-grow text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-secondary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-success" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-danger" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-warning" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-info" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>

                    <div class="spinner-grow text-dark" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-grow text-light" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12" id="loading_spinner">
        <div class="card">
            <div class="card-body">
                <h6 style="text-align: center">Loading...</h6>
                <div class="d-flex justify-content-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-border text-secondary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-border text-success" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-border text-danger" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-border text-warning" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-border text-info" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-border text-light" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div class="spinner-border text-dark" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
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
            <div class="card-body">
                <div class="chartjs-size-monitor"
                    style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                    <div class="chartjs-size-monitor-expand"
                        style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink"
                        style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                    </div>
                </div>
                <canvas id="inboundChart" style="display: block; height: 340px; width: 494px;"
                    class="chartjs-render-monitor"></canvas>
            </div>
            <div class="card-body">
                <div class="text-center">
                    {{-- <img src="assets/images/pages/festival.svg" alt="image" class="img-fluid wid-100 mb-2">
                    --}}
                    <h5>Inbound <br><span class="badge badge-danger">Festival</span></h5>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="chartjs-size-monitor"
                    style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                    <div class="chartjs-size-monitor-expand"
                        style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink"
                        style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                    </div>
                </div>
                <canvas id="outboundChart" style="display: block; height: 340px; width: 494px;"
                    class="chartjs-render-monitor"></canvas>
            </div>
            <div class="card-body">
                <div class="text-center">

                    <h5>Outbound <br><span class="badge badge-danger">Festival</span></h5>
                </div>
            </div>
        </div>

    </div>

    {{-- <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="chartjs-size-monitor"
                    style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                    <div class="chartjs-size-monitor-expand"
                        style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink"
                        style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                    </div>
                </div>
                <canvas id="outboundChart_test" style="display: block; height: 340px; width: 494px;"
                    class="chartjs-render-monitor"></canvas>
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
                    <table id="live_calls_table" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Campaign</th>
                                <th>DID</th>
                                <th>Customer Number</th>
                                <th>Call Status</th>
                                <th>Agent name</th>
                                <th>Agent_extension</th>
                                <th>Call Duration</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                            </tr>
                        </tbody>
                        {{-- <tfoot>
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
                        </tfoot> --}}
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
                    <table id="live_agents" class="table table-striped table-bordered nowrap">
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
                        </tbody>
                        {{-- <tfoot>
                            <tr>
                                <th>Extention</th>
                                <th>Agent Name</th>
                                <th>Status</th>
                                <th>Status Code</th>
                                <th>Duration</th>
                                <th>Incoming Calls</th>
                                <th>Outgoing Calls</th>
                            </tr>
                        </tfoot> --}}
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
        if(seconds==100)
        {

            // alert('hi');
            window.location.reload();

        }
    }

    var cancel = setInterval(incrementSeconds, 1000);
</script>

<script>
    // console.log(response);
     function inboundChartFun(response)
    {

        var ctx = document.getElementById("inboundChart");
        let data1 = {
        datasets: [{
            label: "Inbound Live",
            backgroundColor: "#AF7333",
            data: [response.c_live_in],
        },{
            label: "Calls in IVR",
            backgroundColor: "#ff5252",
            data: [response.c_callmenu],
        },{
            label: "Calls in Queue",
            backgroundColor: "#00acc1",
            data: [response.c_ingroup],
        },{
            label: "Drop Calls",
            backgroundColor: "#2A7888",
            data: [response.c_dropped],
        },{
            label: "Answered",
            backgroundColor: "#109d4b",
            data: [response.c_answered_in],
        }]
        };

            const myChart = new Chart(ctx, {
        type: 'bar',
        data: data1,
        options: {
            responsive: true,
            layout: {
                padding: 20
            },
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

    }

</script>

<script>
    function outboundChartFun(response)
    {
        var ctx = document.getElementById("outboundChart");
        // debugger;
        let dataOutboundChart = {
            // labels: ["Inbound Live", "Calls in IVR", "Calls in Queue", "Drop Calls", "Total Drop", "Answered", "Dropped Percentage"],
        datasets: [{
            label: "Outbound Live Calls",
            backgroundColor: "#AF7333",
            data: [response.c_live_out],
        },{
            label: "Outbound Failed Calls",
            backgroundColor: "#FA4444",
            data: [response.c_failed_out],
        },{
            label: "Outbound Answered Calls",
            backgroundColor: "#45A888",
            data: [response.c_answered_out],
        }]
        };
        // const ctx = canvas.getContext("2d");
        const outboundChart = new Chart(ctx, {
        type: 'bar',
        data: dataOutboundChart,
        options: {
            responsive: true,
            layout: {
                padding: 20
            },
            "hover": {
            "animationDuration": 0
            },
            "animation": {
                "duration": 50,
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
    }


</script>

<script>
    const total_calls = document.getElementById("total_calls");
    const live_calls = document.getElementById("live_calls");
    const paused_agents = document.getElementById("paused_agents");
    const total_agents = document.getElementById("total_agents");
    const logged_id_agents = document.getElementById("logged_id_agents");

    $(document).ready(function(){
        let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        // $('#exampleModalCenter').modal('toggle');
        $('#exampleModalCenter').modal('show');
        // $('#spinner_gif').show();
        
        setTimeout(function() {
            $('#exampleModalCenter').modal('hide');
        }, 1000);

        // API CAll and DATA TABLE DATA APPEND for LIVE CALLS
        $.ajax({
			async: true,
			data:{_token: CSRF_TOKEN},	//data : 'package='+1+'&day='+dayValue,
			type: 'post', //  or POST $(this).attr('method')
			url:  '{{ env('Live_API_URL') }}',// the file to call //$(this).attr('action')
			dataType : 'json',
			beforeSend: function(  ) {
				// $('#exampleModalCenter').modal('show');
				// $('#exampleModalCenter').modal('toggle');
                
			}
		})
		.done(function( response ) {
            //alert('hi');
            // $('#exampleModalCenter').modal('hide');
            // $('#exampleModalCenter').modal('toggle');
			console.log(response);
            if(response.success=='y'){
				//$("#team_stats").empty();
                // $('#spinner_gif').hide();
                inboundChartFun(response);
                outboundChartFun(response);
                $('#total_calls').html(response.c_total_call);
                $('#total_agents').html(response.c_total_agent);
                $('#paused_agents').html(response.c_paused_agent);
                $('#logged_id_agents').html(response.c_logged_in_agent);
                //live_calls.innerText = response.live_calls_dataset.length;
                $('#live_calls').html(response.live_calls_dataset.length);

				$("#live_calls_table tbody tr").remove();
				var output=response.live_calls_dataset;
				// console.log(output);
				for (i = 0; i < output.length; ++i) {

					var markup = "<tr><td>"+output[i].campaign+"</td><td>" + output[i].did + "</td><td>" + output[i].customer_no  + "</td><td>" + output[i].call_status + "</td><td>" + output[i].agent_name + "</td><td>" + output[i].agent_extension + "</td><td>" + output[i].duration + "</td></tr>";
					// console.log(markup);
					//$("#team_stats > tbody").append(markup);
					$('#live_calls_table > tbody:last-child').append(markup);
				}
				// setTimeout(get_team_stats, 10000);  //every 10 seconds
                
                $("#live_agents tbody tr").remove();
				var output=response.live_agents_dataset;
				// console.log(output);
				for (i = 0; i < output.length; ++i) {

					var markup = "<tr><td>"+output[i].extension+"</td><td>" + output[i].name + "</td><td>" + output[i].status  + "</td><td>" + output[i].reason + "</td><td>" + output[i].duration + "</td><td>" + output[i].in + "</td><td>" + output[i].out + "</td></tr>";
					// console.log(markup);
					//$("#team_stats > tbody").append(markup);
					$('#live_agents > tbody:last-child').append(markup);

				}
			}
		});

        // $('#exampleModalCenter').modal('hide');

        // // API CAll and DATA TABLE DATA APPEND for LIVE AGENSTS
        // $.ajax({
		// 	async: true,
		// 	data:{_token: CSRF_TOKEN},	//data : 'package='+1+'&day='+dayValue,
		// 	type: 'post', //  or POST $(this).attr('method')
		// 	url:  '{{ env('Live_API_URL') }}',// the file to call //$(this).attr('action')
		// 	dataType : 'json',
		// 	beforeSend: function(  ) {
		// 		//$('#myModal').modal('toggle');
		// 	}
		// })
		// .done(function( response ) {
		// 	//alert('hi');
		// 	// console.log(response);
        //     if(response.success=='y'){
		// 		//$("#team_stats").empty();
		// 		$("#live_agents tbody tr").remove();
		// 		var output=response.live_agents_dataset;
		// 		// console.log(output);
		// 		for (i = 0; i < output.length; ++i) {
		// 			var markup = "<tr><td>"+output[i].extension+"</td><td>" + output[i].name + "</td><td>" + output[i].status  + "</td><td>" + output[i].reason + "</td><td>" + output[i].duration + "</td><td>" + output[i].in + "</td><td>" + output[i].out + "</td></tr>";
		// 			// console.log(markup);
		// 			//$("#team_stats > tbody").append(markup);
		// 			$('#live_agents > tbody:last-child').append(markup);
		// 		}
		// 		// setTimeout(get_team_stats, 10000);  //every 10 seconds
		// 	}
		// });
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