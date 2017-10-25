<!DOCTYPE html>
<html>
  {include file='admin/header.tpl'}
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="{{base_url()}}"><b>Backend</b>IPB</a>
      </div>
      <div class="login-box-body">


          <p class="login-box-msg">Please Update Your Password</p>

          <form action="{base_url()}user_recovery/send" method="post">
            <div class="form-group has-feedback">
              <select class="form-control" name="username">
                <option>-Selected Username-</option>
                {foreach $data.user->result() as $row}
                <option value="{$row->username}">{$row->username}</option>
                {/foreach}
              </select>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="New Password" name="new-pwd" value="">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Again new Password" name="new-pwd2" value="">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-xs-6">
                <a href="{base_url()}">Login <span class="glyphicon glyphicon-log-in"></span></a>
              </div><!-- /.col -->
              <div class="col-xs-6">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Update <span class="glyphicon glyphicon-refresh"></span></button>
              </div><!-- /.col -->
            </div>
          </form>

      </div>
      <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
  </body>
</html>
