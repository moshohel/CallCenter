@extends('layouts.layout')

@push('css')
<link rel="stylesheet" href={{ asset("assets/css/plugins/dataTables.bootstrap4.min.css")}}>
<link rel="stylesheet" href={{ asset("assets/css/plugins/bootstrap-stars.css")}}>
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
                <div class="btn-group">
                    <a id="print_excel" href="#" class="btn btn-sm btn-secondary" style="display: none">
                        <i class="mdi mdi-content-save"></i> Download Excel</a>
                    <a id="print_pdf" class="btn btn-sm btn-secondary">
                        <i class="mdi mdi-printer" id="print_icon"></i> Download PDF</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('export.CallSummary')}}" id="myForm" method="get" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        {{-- <div class="col-sm-4">
                            <div class="form-group">
                                <label class="floating-label" for="Text">Call Type</label>
                                <input type="text" class="form-control" id="Text" placeholder="123">
                            </div>
                        </div> --}}
                        <div class="form-group col-sm-4">
                            <label class="form-label" for="exampleFormControlSelect1">Call Type</label>
                            <select class="form-select" name="call_type" id="exampleFormControlSelect1">
                                <option value="">select</option>
                                <option value="in">Incoming</option>
                                <option value="out">Outgoing</option>
                            </select>
                        </div>

                        <div class="form-group col-3" id="from_date">
                            <label for="exampleFormControlInput6">Start Date</label>
                            <input type="date" class="form-control" name="from_date" id="from_date_value"
                                placeholder="Chamber Time">
                        </div>
                        <div class="form-group col-3" id="to_date">
                            <label for="exampleFormControlInput5"> End Date</label>
                            <input type="date" class="form-control" name="to_date" id="to_date_value"
                                placeholder="Chamber Time">
                        </div>
                        <div class="form-group col-3 m-4 pt-2">
                            <button type="submit" class="btn btn-info btn-default" id="search-btn">Search</button>
                        </div>

                        <div class="form-group col-3 m-4 pt-2">
                            <button type="submit" class="btn btn-info btn-default" value='Excel'
                                formaction="{{route('export.CallSummary')}}" id="excel_id">Excel</button>
                            {{-- <input type="submit" class="btn btn-success btn-sm" value="Excel"
                                formaction="{{route('export.CallSummary')}}"> --}}
                        </div>
                    </div>
                </form>

                {{-- <button type="submit" formaction=" {{ route('callSummary.search') }}" form="myForm">Search</button>
                --}}
                <button type="submit" formaction="{{route('export.CallSummary')}}" form="myForm">Excel</button>


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
                            {{-- @foreach ($outputs as $output)

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
                            @endforeach --}}

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
<script src={{asset("assets/js/plugins/bootstrap.min.js")}}></script>
<!-- datatable Js -->
<script src={{ asset("assets/js/plugins/jquery.dataTables.min.js")}}></script>
<script src={{ asset("assets/js/plugins/dataTables.bootstrap4.min.js")}}></script>


<script>
    $(document).ready(function () {
    setTimeout(function () {
        $('#call_summary').DataTable({
      order: [[0, 'desc']],
      "destroy": true,
    })
    }, 350)
})

function editButtonClick() {
    alert($('form').attr('action'));
   $('#search').action = "{{route('export.CallSummary')}}";
   alert($('form').attr('action'));
   $('form').submit();
//if doesn't work
//ajax.get()
// .then((response)>{
//     var a = new document.a;
//     a.href = "data:" + response.data;
//     a.download = "download";
//     a.click();
// })
}

// $("#excel_id").click(function(){
//   alert($(this).attr('action'));
//   $('#search').attr('action', "{{route('export.CallSummary')}}");
//   alert($('form').attr('action'));
// });

// $('#excel-btn').click(function(){
//     alert(('#search').attr('action'));
//    $('#search').attr('action', "{{route('export.CallSummary')}}");
//    alert(('#search').attr('action'));
//     $('form').submit();
// });
</script>

<script>
    $( "#search-btn" ).click(function( e ) {
        let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        e.preventDefault();
        e.stopImmediatePropagation();
		$("#result").show();
    // alert($(this).attr('action'));
		$.ajax({
            data: $(this).serialize(), // get the form data
            type: $(this).attr('method'), // GET or POST
            url: "{{ route('callSummary.search') }}", // the file to call
            dataType : 'json',
            })
            .done(function( response ) {

                $("#call_summary tbody tr").remove();
				var output=response;
				console.log(output);
                // <td>" + output[i].pause_time + "</td>
                let base = '172.16.252.7/metro_recording/';
				for (i = 0; i < output.length; ++i) {
                    
					var markup = "<tr><td>"+output[i].calldate+"</td><td>" + output[i].total_in + 
                        "</td><td>" + output[i].total_out  + "</td><td>" + output[i].success_in + 
                            "</td><td>" + output[i].success_out + "</td><td>" + output[i].queue_drop + 
                                "</td><td>"+output[i].ivr_drop+"</td><td>" + output[i].abandoned_in + 
                                    "</td><td>" + output[i].avg_queue_time  + "</td><td>" + output[i].avg_talk_in + 
                                        "</td><td>" + output[i].total_talk_in + "</td><td>" + output[i].unsuccessful_out + "</td><td>" 
                                            + output[i].avg_talk_out + "</td><td>" + output[i].total_talk_out + "</td></tr>";
					// console.log(markup);
					//$("#team_stats > tbody").append(markup);
					$('#call_summary > tbody:last-child').append(markup);
				}

                // var additional_query=response.additional_query;
                // var download_pdf_url="BookingController/download_pdf?additional_query="+additional_query;
                // console.log('----------------',response);
                
                // load_datatable(additional_query);
                
                
                
            });
        //alert('form submitted');
        return false;
    });
</script>

<script>
    var nameValue = document.getElementById("from_date").value;
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