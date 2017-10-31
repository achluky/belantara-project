<!DOCTYPE html>
<html>
  {include file='header.tpl'}
  
   <link href="{base_url()}assets/css/loginstyle.css" rel="stylesheet" type="text/css" />
  <body class="login-page">
	  <div class="login-content">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-sm-7">
						<h1><strong>CMS</strong> Belantara Fondation</h1>
						<p>Selamat Datang di Management Website Belantara Fondation</p>
						<blockquote>Jangan memberikan akun login (nama pengguna dan kata sandi) anda pada siapapun. <br>Keamanan data anda terletak pada anda sendiri.</blockquote>
					</div>
					<!-- End Header Text -->
					<!-- Start login Optin Form-->
					<div class="col-lg-4 col-md-4 col-md-offset-1 col-sm-5">
						<div class="login-form">
							<div class="form-title">
								<h2><i class="glyphicon glyphicon-lock"></i>&nbsp; <b>Backend</b> CMS</h2>
							</div>
							<div class="form-body">
							<form action="{base_url()}admin/auth" method="post">
							<div class="form-group">
									<p class="login-box-msg">{$data['error_msg']}</p>
										
									<input class="form-control" data-val="true" data-val-required="The User name field is required." id="user" name="user" placeholder="Nama pengguna" value="ahmadluki" type="text">
									</div>
									<div class="form-group">
										<div class="text-error">
											<span class="field-validation-valid" data-valmsg-for="Password" data-valmsg-replace="true"></span>
										</div>
										<input class="form-control" data-val="true" data-val-required="The Password field is required." id="pwd" name="pwd" placeholder="Kata sandi" type="password" value="4hm4dluk1">
									</div>
								
								<button type="submit" class="btn btn-primary btn-block btn-flat">Login <span class="glyphicon glyphicon-log-in"></span></button>
									  
							</form>                            
							</div>
						</div>
					</div>
					<!-- End login Optin Form -->
				</div>
			</div>
		</div>
  </body>
</html>
