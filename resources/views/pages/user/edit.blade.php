@extends('layouts.layout')

@push('css')
<!-- data tables css -->
<!-- GOOGLE FONTS -->

@endpush

@section('content')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <a href="{{ route('users') }}">
                        <h5 class="m-b-10">Edit User</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.messages')
<div class="row">
    <!-- [ Form Validation ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>New User</h5>
            </div>
            <div class="card-body">
                <form id="validation-form123" method="POST" action="{{ route('user.update', $user->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">User name</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">extension</label>
                                <input type="text" class="form-control" name="extension" value="{{ $user->extension }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">password</label>
                                <input type="password" class="form-control" name="password" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">api_key</label>
                                <input type="text" class="form-control" name="api_key" value="{{ $user->api_key }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">On Hook</label>
                                <select class="form-control" name="on_hook">
                                    <option value>All on hook's</option>
                                    <optgroup label="On Hook Groups">
                                        <?php 
                                            $on_hook_dropdown=array('y'=>'Yes','n'=>'NO');
                                            foreach ($on_hook_dropdown as $key => $value) {
                                                $selected="";
                                                if($user->on_hook==$key){
                                                    $selected="selected";
                                                }
                                                echo "<option value='$key' $selected >$value</option>";
                                            }
                                            ?>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">conf_room</label>
                                <input type="number" class="form-control" name="conf_room"
                                    value="{{ $user->conf_room }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">User group</label>
                                <select class="form-control" name="user_group_id">
                                    {{-- <option disabled="" value>User group</option> --}}
                                    <optgroup label="User group">
                                        <?php 
                                            $user_group_id_dropdown=array('1'=>'Agent','2'=>'Supervisor','3'=>'Admin');
                                            foreach ($user_group_id_dropdown as $key => $value) {
                                                $selected="";
                                                if($user->user_group_id==$key){
                                                    $selected="selected";
                                                }
                                                echo "<option value='$key' $selected >$value</option>";
                                            }
                                            ?>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Active Status</label>
                                <select class="form-control" name="is_active">
                                    <option value>is_active</option>
                                    <?php 
                                        $is_active_dropdown=array('y'=>'YES','n'=>'NO');
                                        foreach ($is_active_dropdown as $key => $value) {
                                            $selected="";
                                            if($user->is_active==$key){
                                                $selected="selected";
                                            }
                                            echo "<option value='$key' $selected >$value</option>";
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">created_by</label>
                                <input type="number" class="form-control" name="created_by"
                                    value="{{ $user->created_by }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">created_date</label>
                                <input type="datetime-local" class="form-control" name="created_date"
                                    value="{{ $user->created_date }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">modified_by</label>
                                <input type="number" class="form-control" name="modified_by"
                                    value="{{ $user->modified_by }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">modified_date</label>
                                <input type="datetime-local" class="form-control" name="modified_date"
                                    value="{{ $user->modified_date }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">is_logged_in</label>
                                <select class="form-control" name="is_logged_in">
                                    <option value>is_logged_in</option>
                                    <?php 
                                        $is_logged_in_dropdown=array('y'=>'YES','n'=>'NO');
                                        foreach ($is_logged_in_dropdown as $key => $value) {
                                            $selected="";
                                            if($user->is_logged_in==$key){
                                                $selected="selected";
                                            }
                                            echo "<option value='$key' $selected >$value</option>";
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">status</label>
                                <select class="form-control" name="status">
                                    {{-- <option value>status</option> --}}
                                    <?php 
                                        $status_dropdown=array('paused'=>'paused','active'=>'active',
                                        'being_connected'=>'being_connected','initiating_outbound'=>'initiating_outbound',
                                        'in_live_call'=>'in_live_call','in_dispo'=>'in_dispo',
                                        'in_dead_call'=>'in_dead_call','in_hangup'=>'in_hangup',
                                        'logged_out'=>'logged_out'
                                        );
                                        foreach ($status_dropdown as $key => $value) {
                                            $selected="";
                                            if($user->status==$key){
                                                $selected="selected";
                                            }
                                            echo "<option value='$key' $selected >$value</option>";
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">channel</label>
                                <input type="text" class="form-control" name="channel" value="{{ $user->channel }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">customer_channel</label>
                                <input type="text" class="form-control" name="customer_channel"
                                    value="{{ $user->customer_channel }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">transferee_channel</label>
                                <input type="text" class="form-control" name="transferee_channel"
                                    value="{{ $user->transferee_channel }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">parked_at</label>
                                <input type="text" class="form-control" name="parked_at" value="{{ $user->parked_at }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">current_call_id</label>
                                <input type="text" class="form-control" name="current_call_id"
                                    value="{{ $user->current_call_id }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">current_agent_log_id</label>
                                <input type="text" class="form-control" name="current_agent_log_id"
                                    value="{{ $user->current_agent_log_id }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">campaign_id</label>
                                <input type="number" class="form-control" name="campaign_id"
                                    value="{{ $user->campaign_id }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">panel_id</label>
                                <input type="text" class="form-control" name="panel_id" value="{{ $user->panel_id }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">session_id</label>
                                <input type="text" class="form-control" name="session_id"
                                    value="{{ $user->session_id }}">
                            </div>
                        </div>

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


{{-- <script src={{asset("assets/js/gsap.min.js")}}></script> --}}
{{-- custom js --}}
{{-- <script src={{asset("js/register_style.js")}}></script> --}}

@endsection