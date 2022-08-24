@extends('layouts.layout')

@section('content')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <a href="{{ route('users') }}">
                        <h5 class="m-b-10">Register New User</h5>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->
<!-- [ Main Content ] start -->
<div class="row">
    <!-- [ Form Validation ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>New User</h5>
            </div>
            <div class="card-body">
                <form id="validation-form123" method="POST" action="{{ route('user.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">User name</label>
                                <input type="text" class="form-control" name="name" placeholder="username">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">extension</label>
                                <input type="text" class="form-control" name="extension" placeholder="extension">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">password</label>
                                <input type="password" class="form-control" name="password" placeholder="password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">api_key</label>
                                <input type="text" class="form-control" name="api_key" maxlength="10"
                                    placeholder="api_key">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">On Hook</label>
                                <select class="form-control" name="on_hook">
                                    <option value disabled>All on hook's</option>
                                    <optgroup label="On Hook Groups">
                                        <option value="y">YES</option>
                                        <option value="n">NO</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">conf_room</label>
                                <input type="number" class="form-control" name="conf_room"
                                    placeholder="Phone: (+088) 999-9999">
                            </div>
                        </div> --}}

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">User group</label>
                                <select class="form-control" name="user_group_id">
                                    {{-- <option disabled="" value>User group</option> --}}
                                    <optgroup label="User group">
                                        <option value="3">Admin</option>
                                        <option value="2">Supervisor</option>
                                        <option value="1">Agent</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Active Status</label>
                                <select class="form-control" name="is_active">
                                    <option value>Status</option>
                                    <option value="y">YES</option>
                                    <option value="n">NO</option>
                                </select>
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">created_by</label>
                                <input type="number" class="form-control" name="created_by" placeholder="created_by">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">created_date</label>
                                <input type="datetime-local" class="form-control" name="created_date"
                                    placeholder="created_date">
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">modified_by</label>
                                <input type="number" class="form-control" name="modified_by" placeholder="modified_by">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">modified_date</label>
                                <input type="datetime-local" class="form-control" name="modified_date"
                                    placeholder="modified_date">
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">is_logged_in</label>
                                <select class="form-control" name="is_logged_in">
                                    <option value>is_logged_in</option>
                                    <option value="y">YES</option>
                                    <option value="n">NO</option>
                                </select>
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">status</label>
                                <select class="form-control" name="status">
                                    <option value disabled>status</option>
                                    <option value="paused">paused</option>
                                    <option value="active">active</option>
                                    <option value="being_connected">being_connected</option>
                                    <option value="initiating_outbound">initiating_outbound</option>
                                    <option value="in_live_call">in_live_call</option>
                                    <option value="in_dispo">in_dispo</option>
                                    <option value="in_dead_call">in_dead_call</option>
                                    <option value="in_hangup">in_hangup</option>
                                    <option value="logged_out">logged_out</option>
                                </select>
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">channel</label>
                                <input type="text" class="form-control" name="channel" placeholder="channel">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">customer_channel</label>
                                <input type="text" class="form-control" name="customer_channel"
                                    placeholder="customer_channel">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">transferee_channel</label>
                                <input type="text" class="form-control" name="transferee_channel"
                                    placeholder="transferee_channel">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">parked_at</label>
                                <input type="text" class="form-control" name="parked_at" placeholder="parked_at">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">current_call_id</label>
                                <input type="text" class="form-control" name="current_call_id"
                                    placeholder="current_call_id">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">current_agent_log_id</label>
                                <input type="text" class="form-control" name="current_agent_log_id"
                                    placeholder="current_agent_log_id">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">campaign_id</label>
                                <input type="number" class="form-control" name="campaign_id" placeholder="campaign_id">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">panel_id</label>
                                <input type="text" class="form-control" name="panel_id" placeholder="panel_id">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">session_id</label>
                                <input type="text" class="form-control" name="session_id" placeholder="session_id">
                            </div>
                        </div> --}}

                    </div>
                    <button type="submit" class="btn  btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- [ Form Validation ] end -->
</div>

@endsection

@section('scripts')

{{-- <script>
    $(document).ready(function() {
            $('#sampleTable').DataTable();
            // load_datatable();
        } );
</script> --}}

@endsection