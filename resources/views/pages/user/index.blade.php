@extends('layouts.layout')

@section('content')

<div class="pcoded-main-container">
  <div class="pcoded-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
      <div class="page-block">
        <div class="row align-items-center">
          <div class="col-md-12">
            <div class="page-header-title">
              <a href="{{ route('users') }}">
                <h5 class="m-b-10">All Users</h5>
              </a>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">

        <div class="card-body pt-0 pb-5">

          <table class="table card-table table-responsive table-responsive-large" style="width:100%" id="sampleTable">
            <thead>
              <tr>
                <th>Name</th>
                <th>extension</th>
                <th class="d-none d-md-table-cell">user_group_id</th>
                <th>status</th>
                <th>channel</th>
                <th>option</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>

                <td class="d-none d-md-table-cell text-dark">{{ $user->name }}</td>
                <td class="d-none d-md-table-cell text-dark">{{ $user->extension }}</td>
                <td class="d-none d-md-table-cell text-dark">{{ $user->user_group_id }}</td>
                <td class="d-none d-md-table-cell text-dark">{{ $user->status }}</td>
                <td class="d-none d-md-table-cell text-dark">{{ $user->channel }}</td>
                <td>
                  <a class='badge bg-secondary' href="{{ route('user.edit', $user->id) }}">{{ $user->name }}</a>
                </td>


              </tr>
              @endforeach
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


@section('scripts')


<script>
  $(document).ready(function() {
            $('#sampleTable').DataTable();
            // load_datatable();
        } );



</script>











{{-- <script>
  $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#sampleTable tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
        } );

        // DataTable
        var table = $('#sampleTable').DataTable({
            initComplete: function () {
                // Apply the search
                this.api().columns().every( function () {
                    var that = this;

                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            }
        });

    } );
</script> --}}

@endsection