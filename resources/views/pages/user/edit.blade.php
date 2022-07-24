@extends('layouts.layout')

@push('css')
<!-- data tables css -->
<!-- GOOGLE FONTS -->

@endpush

@section('content')

<div class="register-box" id="register-form">
    <h2>Edit New User</h2>
    <form class="register-animation-form" method="POST" action="{{ route('user.update', $user->id) }}">
        @csrf

        <div class="row">
            <div class="form-group col-6">
                <label for="exampleFormControlInput1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                    value="{{ $user->name }}">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput2">extension</label>
                {{-- <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
                --}}
                <input type="text" name="extension" class="form-control" id="exampleFormControlInput2"
                    value="{{ $user->extension }}">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput3">password</label>
                <input type="password" name="password" class="form-control" id="exampleFormControlInput3"
                    value="{{ $user->password }}">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput4">api_key</label>
                <input type="text" name="api_key" class="form-control" id="exampleFormControlInput4"
                    value="{{ $user->api_key }}">
            </div>
            <div class="user-box form-group col-6">
                <label for="exampleFormControlInput4">on_hook</label>
                <select class="form-control" name="on_hook" id="exampleFormControlSelect3" required>
                    <option value="">--select on_hook--</option>
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
                </select>

            </div>

            <div class="form-group col-6">
                <label for="exampleFormControlInput5">conf_room</label>
                <input type="number" name="conf_room" class="form-control" id="exampleFormControlInput5"
                    value="{{ $user->conf_room }}">
            </div>

            <div class="user-box form-group col-6">
                <label for="exampleFormControlInput4">User Type</label>
                <select class="form-control" name="user_group_id" id="exampleFormControlSelect3" required>
                    <option value="">--select user type--</option>
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
                </select>

            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput6">is active</label>
                <select class="form-control" name="is_active" id="is_active">
                    <option value="" disabled="" selected="" hidden="">is_active</option>

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
            <div class="form-group col-6">
                <label for="exampleFormControlInput6">created_by</label>
                <input type="number" name="created_by" class="form-control" id="exampleFormControlInput6"
                    value="{{ $user->created_by }}">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput8">created_date</label>
                <input type="datetime-local" name="created_date" class="form-control" id="exampleFormControlInput8"
                    value="{{ $user->created_date }}">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput7">modified_by</label>
                <input type="number" name="modified_by" class="form-control" id="exampleFormControlInput7"
                    value="{{ $user->modified_by }}">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput8">modified_date</label>
                <input type="datetime-local" name="modified_date" class="form-control" id="exampleFormControlInput8"
                    value="{{ $user->modified_date }}">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput8">is_logged_in</label>
                <select class="form-control" name="is_logged_in" id="is_logged_in">
                    <option value="" disabled="" selected="" hidden="">is_logged_in</option>

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
            <div class="form-group col-6">
                <label for="exampleFormControlInput8">status</label>
                <select class="form-control" name="status" id="status">
                    <option value="" disabled="" selected="" hidden="">status</option>
                    {{-- <option value="paused">paused</option>
                    <option value="active">active</option>
                    <option value="being_connected">being_connected</option>
                    <option value="initiating_outbound">initiating_outbound</option>
                    <option value="in_live_call">in_live_call</option>
                    <option value="in_dispo">in_dispo</option>
                    <option value="in_dead_call">in_dead_call</option>
                    <option value="in_hangup">in_hangup</option>
                    <option value="logged_out">logged_out</option> --}}

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
            <div class="form-group col-6">
                <label for="exampleFormControlInput9">channel</label>
                <input type="text" name="channel" class="form-control" id="exampleFormControlInput9"
                    value="{{ $user->channel }}">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput10">customer_channel</label>
                <input type="text" name="customer_channel" class="form-control" id="exampleFormControlInput10"
                    value="{{ $user->customer_channel }}">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput11">transferee_channel</label>
                <input type="text" name="transferee_channel" class="form-control" id="exampleFormControlInput11"
                    value="{{ $user->transferee_channel }}">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput9">parked_at</label>
                <input type="text" name="parked_at" class="form-control" id="exampleFormControlInput9"
                    value="{{ $user->parked_at }}">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput10">current_call_id</label>
                <input type="text" name="current_call_id" class="form-control" id="exampleFormControlInput10"
                    value="{{ $user->current_call_id }}">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput11">current_agent_log_id</label>
                <input type="text" name="current_agent_log_id" class="form-control" id="exampleFormControlInput11"
                    value="{{ $user->current_agent_log_id }}">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput9">campaign_id</label>
                <input type="number" name="campaign_id" class="form-control" id="exampleFormControlInput9"
                    value="{{ $user->campaign_id }}">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput10">panel_id</label>
                <input type="text" name="panel_id" class="form-control" id="exampleFormControlInput10"
                    value="{{ $user->panel_id }}">
            </div>
            <div class="form-group col-6">
                <label for="exampleFormControlInput11">session_id</label>
                <input type="text" name="session_id" class="form-control" id="exampleFormControlInput11"
                    value="{{ $user->session_id }}">
            </div>



            <div class="form-footer pt-4 mt-4">
                <button type="submit" class="btn btn-primary btn-default">Edit User</button>
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