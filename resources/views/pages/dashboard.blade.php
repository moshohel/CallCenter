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
                  <div class="col-md-12">
                      <div class="page-header-title">
                        <a href="{{ route('dashboard') }}"><h5 class="m-b-10">Dashboard</h5></a>
                      </div>
                      
                  </div>
              </div>
          </div>
      </div>
      <!-- [ breadcrumb ] end -->
      <!-- [ Main Content ] start -->
      <div class="row">
          <div class="col-lg-6 col-md-12">
              <!-- support-section start -->
              {{-- <div class="row">
                  <div class="col-sm-6">
                      <div class="card support-bar overflow-hidden">
                          <div class="card-body pb-0">
                              <h2 class="m-0">350</h2>
                              <span class="text-c-blue">Support Requests</span>
                              <p class="mb-3 mt-3">Total number of support requests that come in.</p>
                          </div>
                          <div id="support-chart"></div>
                          <div class="card-footer bg-primary text-white">
                              <div class="row text-center">
                                  <div class="col">
                                      <h4 class="m-0 text-white">10</h4>
                                      <span>Open</span>
                                  </div>
                                  <div class="col">
                                      <h4 class="m-0 text-white">5</h4>
                                      <span>Running</span>
                                  </div>
                                  <div class="col">
                                      <h4 class="m-0 text-white">3</h4>
                                      <span>Solved</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="card support-bar overflow-hidden">
                          <div class="card-body pb-0">
                              <h2 class="m-0">350</h2>
                              <span class="text-c-green">Support Requests</span>
                              <p class="mb-3 mt-3">Total number of support requests that come in.</p>
                          </div>
                          <div id="support-chart1"></div>
                          <div class="card-footer bg-success text-white">
                              <div class="row text-center">
                                  <div class="col">
                                      <h4 class="m-0 text-white">10</h4>
                                      <span>Open</span>
                                  </div>
                                  <div class="col">
                                      <h4 class="m-0 text-white">5</h4>
                                      <span>Running</span>
                                  </div>
                                  <div class="col">
                                      <h4 class="m-0 text-white">3</h4>
                                      <span>Solved</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div> --}}
              <!-- support-section end -->

              <div class="row">
                <div class="col-sm-6">
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
                                    <p class="text-white m-b-0">% change</p>
                                </div>
                                <div class="col-3 text-end">
                                    <i class="feather icon-trending-up text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-green">290</h4>
                                    <h6 class="text-muted m-b-0">Inbound Calls</h6>
                                </div>
                                <div class="col-4 text-end">
                                    <i class="feather icon-file-text f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-green">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">% change</p>
                                </div>
                                <div class="col-3 text-end">
                                    <i class="feather icon-trending-up text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-red">145</h4>
                                    <h6 class="text-muted m-b-0">Outbound Calls</h6>
                                </div>
                                <div class="col-4 text-end">
                                    <i class="feather icon-calendar f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-red">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">% change</p>
                                </div>
                                <div class="col-3 text-end">
                                    <i class="feather icon-trending-down text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-blue">5</h4>
                                    <h6 class="text-muted m-b-0">Failed Calls</h6>
                                </div>
                                <div class="col-4 text-end">
                                    <i class="feather icon-thumbs-down f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-blue">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">% change</p>
                                </div>
                                <div class="col-3 text-end">
                                    <i class="feather icon-trending-down text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
          </div>
          <div class="col-lg-6 col-md-12">
              <!-- page statustic card start -->
              <div class="row">
                  <div class="col-sm-6">
                      <div class="card">
                          <div class="card-body">
                              <div class="row align-items-center">
                                  <div class="col-8">
                                      <h4 class="text-c-yellow">30</h4>
                                      <h6 class="text-muted m-b-0">Tatal Agents</h6>
                                  </div>
                                  <div class="col-4 text-end">
                                      <i class="feather icon-bar-chart-2 f-28"></i>
                                  </div>
                              </div>
                          </div>
                          <div class="card-footer bg-c-yellow">
                              <div class="row align-items-center">
                                  <div class="col-9">
                                      <p class="text-white m-b-0">% change</p>
                                  </div>
                                  <div class="col-3 text-end">
                                      <i class="feather icon-trending-up text-white f-16"></i>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="card">
                          <div class="card-body">
                              <div class="row align-items-center">
                                  <div class="col-8">
                                      <h4 class="text-c-green">29</h4>
                                      <h6 class="text-muted m-b-0">Active Agents</h6>
                                  </div>
                                  <div class="col-4 text-end">
                                      <i class="feather icon-file-text f-28"></i>
                                  </div>
                              </div>
                          </div>
                          <div class="card-footer bg-c-green">
                              <div class="row align-items-center">
                                  <div class="col-9">
                                      <p class="text-white m-b-0">% change</p>
                                  </div>
                                  <div class="col-3 text-end">
                                      <i class="feather icon-trending-up text-white f-16"></i>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="card">
                          <div class="card-body">
                              <div class="row align-items-center">
                                  <div class="col-8">
                                      <h4 class="text-c-red">5</h4>
                                      <h6 class="text-muted m-b-0">Call in Queue</h6>
                                  </div>
                                  <div class="col-4 text-end">
                                      <i class="feather icon-calendar f-28"></i>
                                  </div>
                              </div>
                          </div>
                          <div class="card-footer bg-c-red">
                              <div class="row align-items-center">
                                  <div class="col-9">
                                      <p class="text-white m-b-0">% change</p>
                                  </div>
                                  <div class="col-3 text-end">
                                      <i class="feather icon-trending-down text-white f-16"></i>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="card">
                          <div class="card-body">
                              <div class="row align-items-center">
                                  <div class="col-8">
                                      <h4 class="text-c-blue">1</h4>
                                      <h6 class="text-muted m-b-0">Paused Agents</h6>
                                  </div>
                                  <div class="col-4 text-end">
                                      <i class="feather icon-thumbs-down f-28"></i>
                                  </div>
                              </div>
                          </div>
                          <div class="card-footer bg-c-blue">
                              <div class="row align-items-center">
                                  <div class="col-9">
                                      <p class="text-white m-b-0">% change</p>
                                  </div>
                                  <div class="col-3 text-end">
                                      <i class="feather icon-trending-down text-white f-16"></i>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- page statustic card end -->
          </div>
          
          <!-- Charts start -->
        <div class="row">
            <!-- [ chartjs-chart ] start -->
            {{-- <div class="col-xl-6 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Bar Chart</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="call_age" style="width: 100%; height: 300px"></canvas>
                    </div>
                </div>
            </div> --}}

            <div class="col-xl-6 col-md-12">
                <div class="card card-no-hover m-b-30">
                  <div class="card-header">
                      <div class="card-title">Campaign Stats</div>
                  </div>
                  <div class="card-body">
                      <div class="chart">
                          <div id="apexchart-006" class="chart-canvas"></div>
                      </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-6 col-md-12">
                <div class="card card-no-hover m-b-30">
                  <div class="card-header">
                      <div class="card-title">Call Stats</div>
                  </div>
                  <div class="card-body">
                      <div class="chart">
                          <div id="call_stats" class="chart-canvas"></div>
                      </div>
                  </div>
                </div>
              </div>

              
        </div>

        {{-- <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Bar [ Horizontal ] Chart</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="deviceChart2" style="width: 100%; height: 300px"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="card card-default" id="activity-user">
                  <div class="card-header justify-content-center">
                    <h2>Demographic – Age Group</h2>
                  </div>
                  <div class="card-body" ><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                      <canvas id="currentUser" width="988" height="680" style="display: block; height: 340px; width: 494px;" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
            </div>
        </div> --}}
        <!--End Charts start -->

        <div class="row">
            <!-- Agent Summery table data-basic-custom start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Agent Summery</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="multi-colum-dt" class="table table-striped table-bordered nowrap">
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
            </div>
            <!-- Agent Summery table end -->
        </div>

      </div>
      <!-- [ Main Content ] end -->
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


<!-- datatable Js -->
<script src={{ asset("assets/js/plugins/jquery.dataTables.min.js")}}></script>
<script src={{ asset("assets/js/plugins/dataTables.bootstrap4.min.js")}}></script>
{{-- <script src={{ asset("assets/js/pages/data-advance-custom.js")}}></script> --}}
<script src={{ asset("assets/js/pages/data-basic-custom.js") }}></script>

<script>
    var colors = ["red", "green","blue","orange","brown"];
    (function ($) 
    {
    'use strict';
    if ($("#apexchart-006").length) 
        {

            var options = {
                colors:['#F44336', '#3cb371', '#9C27B0'],
                chart: {

                    type: 'bar',
                },
                height:{height: '300',

                },

                plotOptions: {
                    bar: {
                        horizontal: false,
                        endingShape: 'rounded',
                        columnWidth: '55%',
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 1,
                    colors: ['transparent']
                },
                series: [{
                    name: 'Total Calls',
                    data: [63, 60, 66]
                }, {
                    name: 'Pending Calls',
                    data: [91, 114, 94]
                }, {
                    name: 'Completed Calls',
                    data: [52, 53, 41]
                }],
                xaxis: {
                    categories: ['NDR', 'Order Confirmation', 'Abendoned Cart'],
                },
                fill: {
                    opacity: 1

                },
                // legend: {
                //     floating: true
                // },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return "$ " + val + " thousands"
                        }
                    }
                }
            }

            var chart = new ApexCharts(
                document.querySelector("#apexchart-006"),
                options
            );

            chart.render();
        }
    })(window.jQuery);
</script>

<script>
    var colors = ["red", "green","blue","orange","brown"];
    (function ($) 
    {
    'use strict';
    if ($("#call_stats").length) 
        {

            var options = {
                colors:['#F44336', '#3cb371', '#9C27B0'],
                chart: {

                    type: 'bar',
                },
                height:{height: '300',

                },

                plotOptions: {
                    bar: {
                        horizontal: false,
                        endingShape: 'rounded',
                        columnWidth: '55%',
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 1,
                    colors: ['transparent']
                },
                series: [{
                    name: 'Total Calls',
                    data: [66, 60, 66]
                }, {
                    name: 'Pending Calls',
                    data: [55, 34, 24]
                }, {
                    name: 'Completed Calls',
                    data: [34, 53, 31]
                }],
                xaxis: {
                    categories: ['NDR', 'Order Confirmation', 'Abendoned Cart'],
                },
                fill: {
                    opacity: 1

                },
                // legend: {
                //     floating: true
                // },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return "$ " + val + " thousands"
                        }
                    }
                }
            }

            var chart = new ApexCharts(
                document.querySelector("#call_stats"),
                options
            );

            chart.render();
        }
    })(window.jQuery);
</script>

{{-- <script>
    /*======== 14. CURRENT USER BAR CHART ========*/
    // var data = JSON.parse(document.getElementById("call_age").innerHTML);
    // console.log(data);
    var cUser = document.getElementById("currentUser");
    var xValues = [ "41-65", "31-40", "20-30", "13-19"];
    var yValues = [20, 70, 23, 66];
    var barColors = ["red", "green","blue","orange","brown"];
    var data = {
      labels: xValues,
      datasets: [{
        label:  [ "41-65", "31-40", "20-30", "13-19"],
        data: yValues,
        backgroundColor: barColors
      }]
    }
  if (cUser !== null) {
    var myUChart = new Chart(cUser, {
      type: "horizontalBar",
      data: {
        labels: xValues,
        datasets: [
          {
            
            // label: "Italy",
            data: yValues,
            // data: [2, 3.2, 1.8, 2.1, 1.5, 3.5, 4, 2.3, 2.9, 4.5, 1.8, 3.4, 2.8],
            backgroundColor: barColors
            // backgroundColor: "#4c84ff"
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          display: false
        },
        scales: {
          xAxes: [
            {
              gridLines: {
                drawBorder: true,
                display: false,
              },
              ticks: {
                max: Math.max(...data.datasets[0].data) + 10,
                fontColor: "#8a909d",
                fontFamily: "Roboto, sans-serif",
                display: true, // hide main x-axis line
                beginAtZero: true,
                callback: function(tick, index, array) {
                  return index % 2 ? "" : tick;
                }
              },
              barPercentage: 1.8,
              categoryPercentage: 0.2
            }
          ],
          yAxes: [
            {
              
              gridLines: {
                drawBorder: true,
                display: true,
                color: "#eee",
                zeroLineColor: "#eee"
              },
              ticks: {
                fontColor: "#8a909d",
                fontFamily: "Roboto, sans-serif",
                display: true,
                beginAtZero: true
              },
              scaleLabel: {
                display: true,
                labelString: 'Age Group',

              }
              
            }
          ]
        },


        // tooltips: {
        //   mode: "index",
        //   titleFontColor: "#888",
        //   bodyFontColor: "#555",
        //   titleFontSize: 12,
        //   bodyFontSize: 15,
        //   backgroundColor: "rgba(256,256,256,0.95)",
        //   displayColors: true,
        //   xPadding: 10,
        //   yPadding: 7,
        //   borderColor: "rgba(220, 220, 220, 0.9)",
        //   borderWidth: 2,
        //   caretSize: 6,
        //   caretPadding: 5
        // }
      }
    });
  }
</script> --}}

{{-- <Script>
    var deviceChart = document.getElementById("deviceChart2");
    var mydeviceChart = new Chart(deviceChart, {
        type: "doughnut",
        data: {
            labels: ["In-Time Call", "After Hour Call", "Drop Out Cal", "Time Out Call", "Recived Call"],
            datasets: [
            {
                label: ["In-Time Call", "After Hour Call", "Drop Out Cal", "Time Out Call", "Recived Call"],
                data: [25, 45, 74, 85, 66],
                backgroundColor: [
                "rgba(60, 179, 113, 1)",
                "rgba(60, 60, 60, 1)",
                "rgba(255, 99, 71, 1)",
                "rgba(106, 90, 205, 1)",
                "rgba(2, 5, 73, 0.89)",
                ],
                borderWidth: 1
            }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
            display: true
            },
            cutoutPercentage: 75,
            tooltips: {
            callbacks: {
                title: function(tooltipItem, data) {
                return data["labels"][tooltipItem[0]["index"]];
                },
                label: function(tooltipItem, data) {
                return (
                    data["datasets"][0]["data"][tooltipItem["index"]] + " Calls"
                );
                }
            },

            titleFontColor: "#888",
            bodyFontColor: "#555",
            titleFontSize: 12,
            bodyFontSize: 15,
            backgroundColor: "rgba(256,256,256,0.95)",
            displayColors: true,
            xPadding: 10,
            yPadding: 7,
            borderColor: "rgba(220, 220, 220, 0.9)",
            borderWidth: 2,
            caretSize: 6,
            caretPadding: 5
            }
        }
        });
</Script> --}}

{{-- <script>
    $(document).ready(function() {
    // [ bar-chart ] start
    var bar = document.getElementById("chart-bar-1").getContext('2d');
    var data1 = {
        labels: [0, 1, 2, 3],
        datasets: [{
            label: "Data 1",
            data: [25, 45, 74, 85],
            borderColor: '#4680ff',
            backgroundColor: '#4680ff',
            hoverborderColor:'#4680ff',
            hoverBackgroundColor: '#4680ff',
        }, {
            label: "Data 2",
            data: [30, 52, 65, 65],
            borderColor: '#0e9e4a',
            backgroundColor: '#0e9e4a',
            hoverborderColor:'#0e9e4a',
            hoverBackgroundColor: '#0e9e4a',
        }]
    };
    var myBarChart = new Chart(bar, {
        type: 'bar',
        data: data1,
        options: {
            barValueSpacing: 20
        }
    });
    // [ bar-chart ] end
    )};
</script> --}}
@endsection