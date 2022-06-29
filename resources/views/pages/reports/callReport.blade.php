@extends('layouts.layout')

@push('css')

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

    </div>
</div>
@endsection


@section('scripts')

@endsection