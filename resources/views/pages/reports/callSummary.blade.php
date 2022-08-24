@extends('layouts.layout')

@push('css')
<link rel="stylesheet" href={{ asset("assets/css/plugins/dataTables.bootstrap4.min.css")}}>
@endpush

@section('content')

<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <a href="{{ route('report.call') }}">
                        <h5 class="m-b-10">Call Report</h5>
                    </a>
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
                <h5>Call Summary</h5>

                {{-- Filter --}}
                <form action="{{ route('callSummary.search') }}" method="post" enctype="multipart/form-data"
                    id="search">
                    @csrf
                    <div class="row card-body pt-0 pb-5 position-relative">
                        {{-- <div class="form-group col-4">
                            <label for="exampleFormControlInput2">Designation</label>
                            <input type="text" name="designation" class="form-control" id="exampleFormControlInput2"
                                placeholder="Designation">
                        </div> --}}
                        <div class="form-group col-3">
                            <label for="exampleFormControlSelect3">Availed</label>
                            <select name="availed" id="exampleFormControlSelect3" placeholder="availed">
                                <option value="" disabled selected hidden>availed</option>
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>

                            </select>
                        </div>

                        {{-- <div class="form-group col-3" id="from_date">
                            <label for="exampleFormControlInput6">Start Date</label>
                            <input type="date" class="form-control" name="from_date" id="exampleFormControlInput6"
                                placeholder="Chamber Time">
                        </div>
                        <div class="form-group col-3" id="to_date">
                            <label for="exampleFormControlInput5"> End Date</label>
                            <input type="date" class="form-control" name="to_date" id="exampleFormControlInput5"
                                placeholder="Chamber Time">
                        </div> --}}

                        <div class="form-group col-3 m-4 pt-2">
                            <button type="submit" class="btn btn-info btn-default" id="search-btn">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table id="call_summary" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Total Incoming</th>
                                <th>Total Outgoing</th>
                                <th>Received Call(Incoming)</th>
                                <th>Successful Outgoing</th>
                                <th>Queue Drop</th>
                                <th>IVR Drop</th>
                                <th>Abandoned Incoming Call</th>
                                <th>Average Queue Time(excluding IVR Drop)</th>
                                <th>Received Call Talktime Average</th>
                                <th>Received Call Talktime Duration</th>
                                <th>Unsuccessful Outgoing</th>
                                <th>Successful Outgoing Talktime Average</th>
                                <th>Successful Outgoing Talktime Duration</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($outputs as $output)
                            {{-- <p>This is user {{ $user->id }}</p> --}}
                            <tr>
                                <td>{{ $output['calldate'] }}</td>
                                <td>{{ $output['total_in'] }}</td>
                                <td>{{ $output['total_out'] }}</td>
                                <td>{{ $output['success_in'] }}</td>
                                <td>{{ $output['success_out'] }}</td>
                                <td>{{ $output['queue_drop'] }}</td>
                                <td>{{ $output['ivr_drop'] }}</td>
                                <td>{{ $output['abandoned_in'] }}</td>
                                <td>{{ $output['avg_queue_time'] }}</td>
                                <td>{{ $output['avg_talk_in'] }}</td>
                                <td>{{ $output['total_talk_in'] }}</td>
                                <td>{{ $output['unsuccessful_out'] }}</td>
                                <td>{{ $output['avg_talk_out'] }}</td>
                                <td>{{ $output['total_talk_out'] }}</td>

                            </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Agent Summery table end -->
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
        $('#call_report_table').DataTable({
      order: [[0, 'desc']],
    })
    }, 350)
})
</script>

<script>
    $(document).ready(function () {
    setTimeout(function () {
        $('#call_summary').DataTable({
      order: [[0, 'desc']],
    })
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

					var markup = "<tr><td>"+output[i].calldate+"</td><td>" + output[i].call_type + 
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