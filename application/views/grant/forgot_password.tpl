<!DOCTYPE html>
<html>
  {include file='grant/header.tpl'}
  
   <link href="{base_url()}assets/css/loginstyle.css" rel="stylesheet" type="text/css" />
  <body class="login-page">
	  <div class="login-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-md-offset-4 col-sm-5">
						<div class="login-form">
							<div class="form-title">
								<h2><i class="glyphicon glyphicon-lock"></i>&nbsp; <b>Reset Password</b></h2>
							</div>
							<div class="form-body">
								<form action="{base_url()}admin/auth" method="post">
									<div class="form-group">
											<div class="text-info">
												<p align="center">Masukan Email <br/>yang Digunakan Saat Pendaftaran</p>
											</div>
											<div class="text-error">
												<span class="field-validation-valid" data-valmsg-for="Password" data-valmsg-replace="true"></span>
											</div>
											<input class="form-control" data-val="true" data-val-required="The Email field is required." id="pwd" name="pwd" placeholder="Email" type="email" value="">
									</div>

									<button type="submit" class="btn btn-primary btn-block btn-flat">Masuk <span class="ion ion-log-in"></span></button>
									<hr>
									<p align="center"><a href="{base_url()}grant/pendaftaran">Belum Punya Akun?</a></p>
								</form>                            
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
  </body>
</html>
