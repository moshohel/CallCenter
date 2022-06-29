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

              <div class="row">

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-green" id="total_calls">0</h4>
                                    <h6 class="text-muted m-b-0">Total</h6>
                                </div>
                                <div class="col-4 text-end">
                                    {{-- <i class="feather icon-file-text f-28"></i> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-green">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">Calls</p>
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
                                    <h4 class="text-c-blue" id="total_inbound_calls">0</h4>
                                    <h6 class="text-muted m-b-0">Total Inbound</h6>
                                </div>
                                <div class="col-4 text-end">
                                    {{-- <i class="feather icon-thumbs-down f-28"></i> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-blue">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0">Calls</p>
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
                                      <h4 class="text-c-yellow" id="total_outbound_calls">0</h4>
                                      <h6 class="text-muted m-b-0">Tatal Outbound</h6>
                                  </div>
                                  <div class="col-4 text-end">
                                      {{-- <i class="feather icon-bar-chart-2 f-28"></i> --}}
                                  </div>
                              </div>
                          </div>
                          <div class="card-footer bg-c-yellow">
                              <div class="row align-items-center">
                                  <div class="col-9">
                                      <p class="text-white m-b-0">Calls</p>
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
                                      <h4 class="text-c-red" id="total_failed_calls">0</h4>
                                      <h6 class="text-muted m-b-0">Total Failed</h6>
                                  </div>
                                  <div class="col-4 text-end">
                                      {{-- <i class="feather icon-calendar f-28"></i> --}}
                                      <i class="feather icon-thumbs-down f-28"></i>
                                  </div>
                              </div>
                          </div>
                          <div class="card-footer bg-c-red">
                              <div class="row align-items-center">
                                  <div class="col-9">
                                      <p class="text-white m-b-0">Calls</p>
                                  </div>
                                  <div class="col-3 text-end">
                                      <i class="feather icon-trending-down text-white f-16"></i>
                                      {{-- <i class="feather icon-bar-chart-2 f-28"></i> --}}
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

              </div>
              <!-- page statustic card end -->
          </div>


        <!-- [ vertically-modal ] start -->		
					
        <div id="exampleModalCenter" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle" style="text-align: center">Loading ..</h5>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button> --}}
                    </div>
                    {{-- <h6 style="text-align: center">Loading...</h6> --}}
                    <div class="modal-body">
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
                            
                            <div class="spinner-border text-dark" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            <div class="spinner-border text-light" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
                    
        <!-- [ vertically-modal ] end -->


          <!-- Charts start -->

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
                            <h5>Total Inbound Call Status <br><span class="badge badge-danger">Festival</span></h5>
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

                            <h5>Total Outbound Call Status<br><span class="badge badge-danger">Festival</span></h5>
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

        {{-- <div class="row">

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


        </div> --}}

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
                        <h5>Agent Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="agent_summary_table" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Agent Name</th>
                                        <th>Login Time</th>
                                        <th>Last LogOut</th>
                                        <th>Working Hours</th>
                                        <th>Incoming Calls</th>
                                        <th>Outgoing Calls</th>
                                        {{-- <th>Pause Time</th> --}}
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
                                        {{-- <td>test</td> --}}
                                    </tr>

                                </tbody>

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

    // Chart.defaults.color = "#ff0000";
    function inboundStatusChartFun(response)
    {
        var ctx = document.getElementById("inboundChart");
        let data = {
        datasets: [{
            label: "Answer",
            backgroundColor: "#AF7333",
            data: [response.c_answered_in],
        },{
            label: "Total Calls",
            backgroundColor: "#ff5252",
            data: [response.c_in],
        },{
            label: "Drop Calls",
            backgroundColor: "#00acc1",
            data: [response.c_dropped],
        },{
            label: "IVR Drop",
            backgroundColor: "#2A7888",
            data: [response.c_callmenu_dropped],
        },{
            label: "Queue Drop",
            backgroundColor: "#FF7777",
            data: [response.c_ingroup_dropped],
        }]
        };

        // console.log(data.datasets[0].data[0]);
        // console.log(data.datasets[1].data);
        // console.log(data.datasets[2].data);
        // console.log(data.datasets[3].data);
        // console.log(data.datasets[4].data);


        const myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
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
                    ctx.fillText(data, bar._model.x, bar._model.y - 1);
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

    function outboundStatusChartFun(response)

    {
        var ctx = document.getElementById("outboundChart");
        // debugger;
        let dataOutboundChart = {
            // labels: ["Inbound Live", "Calls in IVR", "Calls in Queue", "Drop Calls", "Total Drop", "Answered", "Dropped Percentage"],
        datasets: [{
            label: "Total Calls",
            backgroundColor: "#AF7333",
            data: [response.c_out],
        },{
            label: "Success Calls",
            backgroundColor: "#45A888",
            data: [response.c_answered_out],
        },{
            label: "Outbound Failed Calls",
            backgroundColor: "#FA4444",
            data: [response.c_failed_out],
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
    // const total_calls = document.getElementById("total_calls");

    $(document).ready(function(){
        let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        // API CAll and DATA TABLE DATA APPEND for LIVE CALLS
        $.ajax({
			async: true,
			data:{_token: CSRF_TOKEN},	//data : 'package='+1+'&day='+dayValue,
			type: 'post', //  or POST $(this).attr('method')
			url:  '{{ env('Dashboard_API_URL') }}',// the file to call //$(this).attr('action')
			dataType : 'json',
			beforeSend: function(  ) {
				// $('#exampleModalCenter').modal('toggle');
			}
		})
		.done(function( response ) {
            // $('#exampleModalCenter').modal('toggle');
			console.log(response);
            if(response.success=='y'){
				//$("#team_stats").empty();
                inboundStatusChartFun(response);
                outboundStatusChartFun(response);
                $('#total_calls').html(response.c_total_call);
                $('#total_inbound_calls').html(response.c_in);
                $('#total_outbound_calls').html(response.c_out);
                $('#total_failed_calls').html(response.c_failed_out);
                //live_calls.innerText = response.live_calls_dataset.length;
                // $('#live_calls').html(response.live_calls_dataset.length);

				$("#agent_summary_table tbody tr").remove();
				var output=response.agent_summary_dataset;
				// console.log(output);
                // <td>" + output[i].pause_time + "</td>
				for (i = 0; i < output.length; ++i) {
					var markup = "<tr><td>"+output[i].name+"</td><td>" + output[i].login_time + "</td><td>" + output[i].logout_time  + "</td><td>" + output[i].working_hour + "</td><td>" + output[i].c_in + "</td><td>" + output[i].c_out + "</td></tr>";
					// console.log(markup);
					//$("#team_stats > tbody").append(markup);
					$('#agent_summary_table > tbody:last-child').append(markup);
				}
				// setTimeout(get_team_stats, 10000);  //every 10 seconds
			}
		});
    });


</script>

{{-- <script>
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
</script> --}}

{{-- <script>
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
</script> --}}

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
