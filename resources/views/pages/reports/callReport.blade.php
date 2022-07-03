@extends('layouts.layout')

@push('css')
<link rel="stylesheet" href={{ asset("assets/css/plugins/dataTables.bootstrap4.min.css")}}>
@endpush

@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                        <a href="{{ route('report.call') }}"><h5 class="m-b-10">Call Report</h5></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <!-- [ breadcrumb ] end -->
    <div class="row">
        <!-- Agent Summery table data-basic-custom start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Call Report</h5>
                </div>
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="call_report_table" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>Call Type</th>
                                    <th>Call Date</th>
                                    <th>Customer Number</th>
                                    <th>DID</th>
                                    <th>Call Status</th>
                                    <th>Campaign</th>
                                    <th>Ingroup</th>
                                    <th>Agent Name</th>
                                    <th>Agent Extension</th>
                                    <th>Queue Sec</th>
                                    <th>Talk Sec</th>
                                    <th>Dead Sec</th>
                                    <th>Disposition Sec</th>
                                    <th>Hangup Side</th>
                                    <th>Record</th>
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
                                    <td>test</td>
                                    <td>test</td>
                                    <td>test</td>
                                    <td>test</td>
                                    <td>test</td>
                                    <td>test</td>
                                    <td>test</td>
                                    <td>test</td>
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
</div>
@endsection


@section('scripts')
<script src={{asset("assets/js/plugins/jquery-ui.min.js")}}></script>
<!-- datatable Js -->
<script src={{ asset("assets/js/plugins/jquery.dataTables.min.js")}}></script>
<script src={{ asset("assets/js/plugins/dataTables.bootstrap4.min.js")}}></script>

<script>
$(document).ready(function () {
    setTimeout(function () {
        $('#call_report_table').DataTable()
    }, 350)
})
</script>


<script>
    // const total_calls = document.getElementById("total_calls");

    $(document).ready(function(){
        let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        // API CAll and DATA TABLE DATA APPEND for LIVE CALLS
        $.ajax({
			async: true,
			data:{_token: CSRF_TOKEN},	//data : 'package='+1+'&day='+dayValue,
			type: 'get', //  or POST $(this).attr('method')
			url:  '{{ env('Call_Report_API_URL') }}',// the file to call //$(this).attr('action')
			dataType : 'json',
			beforeSend: function(  ) {
				// $('#exampleModalCenter').modal('toggle');
			}
		})
		.done(function( response ) {
            // $('#exampleModalCenter').modal('toggle');
			console.log(response);
            if(response.success=='y'){
				

				$("#call_report_table tbody tr").remove();
				var output=response.call_report_dataset;
				// console.log(output);
                // <td>" + output[i].pause_time + "</td>
                let base = '172.16.252.7/metro_recording/';
				for (i = 0; i < output.length; ++i) {
                    var audio_control="";
                    if(output[i].record!=''){
                        audio_control="<audio controls autoplay muted> <source src='http://172.16.252.7/metro_recording/"+output[i].record+"' type='audio/wav'> Your browser does not support the audio element. </audio>";
                    }

					var markup = "<tr><td>"+output[i].call_type+"</td><td>" + output[i].calldate + 
                        "</td><td>" + output[i].customer_no  + "</td><td>" + output[i].did + 
                            "</td><td>" + output[i].call_status + "</td><td>" + output[i].campaign + 
                                "</td><td>"+output[i].ingroup+"</td><td>" + output[i].agent_name + 
                                    "</td><td>" + output[i].agent_exten  + "</td><td>" + output[i].queue_sec + 
                                        "</td><td>" + output[i].talk_sec + "</td><td>" + output[i].dead_sec + "</td><td>" 
                                            + output[i].dispo_sec + "</td><td>" + output[i].hangup_side + "</td><td>" 
                                                + audio_control + "</td></tr>";
					// console.log(markup);
					//$("#team_stats > tbody").append(markup);
					$('#call_report_table > tbody:last-child').append(markup);
				}

			}
		});
    });


</script>
@endsection
