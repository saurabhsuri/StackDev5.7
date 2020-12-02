@extends('layouts.admin_layout.admin_design')

@section('content')

    <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Form elements</a>
    <h1>Admin Settings</h1>
  </div>


        @if(Session::has('flash_message_error'))
        <div class=" alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{!!Session('flash_message_error')!!}</strong>
        </div>
        @endif

        @if(Session::has('flash_message_success'))
        <div class=" alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{!!Session('flash_message_success')!!}</strong>
        </div>
        @endif
  </div>


  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Update Password</h5>
            </div>
            <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action={{url("admin/update-pwd")}} name="password_validate" id="password_validate" novalidate="novalidate">
                {{csrf_field()}}
                <div class="control-group">
                  <label class="control-label">Current Password</label>
                  <div class="controls">
                    <input type="password" name="current_password" id="current_password" />
                    <span id='chkpwd'></span>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">New Password</label>
                  <div class="controls">
                    <input type="password" name="new_password" id="new_password" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Confirm password</label>
                  <div class="controls">
                    <input type="password" name="confirm_password" id="confirm_password" />
                  </div>
                </div>
                <div class="form-actions">
                  <input type="submit" value="Update Password" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection