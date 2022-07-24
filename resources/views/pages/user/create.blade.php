@extends('layouts.layout')

@push('css')
<!-- data tables css -->
<!-- GOOGLE FONTS -->

@endpush

@section('content')

<div class="register-box" id="register-form">
    <h2>Register New User</h2>
    <form class="register-animation-form" method="POST" action="{{ route('user.store') }}">
        @csrf

        <div class="row">
            <div class="form-group col-6">
                <label for="exampleFormControlInput1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                    placeholder="corporate name">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput2">extension</label>
                {{-- <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
                --}}
                <input type="text" name="extension" class="form-control" id="exampleFormControlInput2"
                    placeholder="extension">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput3">password</label>
                <input type="password" name="password" class="form-control" id="exampleFormControlInput3"
                    placeholder="password">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput4">api_key</label>
                <input type="text" name="api_key" class="form-control" id="exampleFormControlInput4"
                    placeholder="api_key">
            </div>
            <div class="user-box">
                <select class="form-control" name="on_hook" id="on_hook">
                    <option value="" disabled="" selected="" hidden="">on_hook</option>
                    <option value="y">YES</option>
                    <option value="n">NO</option>
                </select>

            </div>

            <div class="form-group col-6">
                <label for="exampleFormControlInput5">conf_room</label>
                <input type="number" name="conf_room" class="form-control" id="exampleFormControlInput5"
                    placeholder="conf_room">
            </div>
            <div class="user-box">
                <select class="form-control" name="user_group_id" id="user_group_id">
                    <option value="" disabled="" selected="" hidden="">user_group_id</option>
                    <option value="3">Admin</option>
                    <option value="2">Super user</option>
                    <option value="1">Agent</option>
                </select>

            </div>
            <div class="user-box">
                <select class="form-control" name="is_active" id="is_active">
                    <option value="" disabled="" selected="" hidden="">is_active</option>
                    <option value="y">YES</option>
                    <option value="n">NO</option>
                </select>

            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput6">created_by</label>
                <input type="number" name="created_by" class="form-control" id="exampleFormControlInput6"
                    placeholder="created_by">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput8">created_date</label>
                <input type="datetime-local" name="created_date" class="form-control" id="exampleFormControlInput8"
                    placeholder="created_date">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput7">modified_by</label>
                <input type="number" name="modified_by" class="form-control" id="exampleFormControlInput7"
                    placeholder="modified_by">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput8">modified_date</label>
                <input type="datetime-local" name="modified_date" class="form-control" id="exampleFormControlInput8"
                    placeholder="modified_date">
            </div>
            <div class="user-box">
                <select class="form-control" name="is_logged_in" id="is_logged_in">
                    <option value="" disabled="" selected="" hidden="">is_logged_in</option>
                    <option value="y">YES</option>
                    <option value="n">NO</option>
                </select>

            </div>
            <div class="user-box">
                <select class="form-control" name="status" id="status">
                    <option value="" disabled="" selected="" hidden="">status</option>
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
            <div class="form-group col-6">
                <label for="exampleFormControlInput9">channel</label>
                <input type="text" name="channel" class="form-control" id="exampleFormControlInput9"
                    placeholder="channel">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput10">customer_channel</label>
                <input type="text" name="customer_channel" class="form-control" id="exampleFormControlInput10"
                    placeholder="customer_channel">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput11">transferee_channel</label>
                <input type="text" name="transferee_channel" class="form-control" id="exampleFormControlInput11"
                    placeholder="transferee_channel">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput9">parked_at</label>
                <input type="text" name="parked_at" class="form-control" id="exampleFormControlInput9"
                    placeholder="parked_at">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput10">current_call_id</label>
                <input type="text" name="current_call_id" class="form-control" id="exampleFormControlInput10"
                    placeholder="current_call_id">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput11">current_agent_log_id</label>
                <input type="text" name="current_agent_log_id" class="form-control" id="exampleFormControlInput11"
                    placeholder="current_agent_log_id">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput9">campaign_id</label>
                <input type="number" name="campaign_id" class="form-control" id="exampleFormControlInput9"
                    placeholder="campaign_id">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput10">panel_id</label>
                <input type="text" name="panel_id" class="form-control" id="exampleFormControlInput10"
                    placeholder="panel_id">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput11">session_id</label>
                <input type="text" name="session_id" class="form-control" id="exampleFormControlInput11"
                    placeholder="session_id">
            </div>



            <div class="form-footer pt-4 mt-4">
                <button type="submit" class="btn btn-primary btn-default">Add User</button>
                <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
            </div>

    </form>
</div>

@endsection


@section('scripts')


{{-- <script src={{asset("assets/js/gsap.min.js")}}></script> --}}
{{-- custom js --}}
<script src={{asset("js/register_style.js")}}></script>

@endsection

{{-- @include('partials.scripts') --}}