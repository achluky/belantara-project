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
								<h2><i class="ion ion-person-add"></i>&nbsp; <b>Daftar</b></h2>
							</div>
							<div class="form-body">
								<form action="{base_url()}grant/pendaftaran/save" method="post">
									<div class="form-group">
										<p class="login-box-msg">{$data['error_msg']}</p>
											
										<input class="form-control" data-val="true" data-val-required="The User name field is required." id="user" name="name" placeholder="Nama pengguna" value="" type="text">
									</div>
									<div class="form-group">
											<div class="text-error">
												<span class="field-validation-valid" data-valmsg-for="Password" data-valmsg-replace="true"></span>
											</div>
											<input class="form-control" data-val="true" data-val-required="The Email field is required." id="email" name="email" placeholder="Email" type="email" value="">
									</div>
									<div class="form-group">
											<div class="text-error">
												<span class="field-validation-valid" data-valmsg-for="Password" data-valmsg-replace="true"></span>
											</div>
											<input class="form-control" data-val="true" data-val-required="The Password field is required." id="pwd" name="password" placeholder="Kata sandi" type="password" value="">
									</div>

									<p><input type="checkbox" name="agree" id="agree"> Saya Setuju dengan <a href="">Syarat dan Kondisi</a></p>
									<button type="submit" class="btn btn-primary btn-block btn-flat daftar" disabled>Daftar</button>
									<hr>
									<p align="center"><a href="{base_url()}grant/login" >Login?</a></p>
								</form>                            
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
  </body>
	<script src="{base_url()}assets/js/jquery-2.0.3.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$("#agree").click(function() {
		    var checked_status = this.checked;
		    if (checked_status == true) {
		       $(".daftar").removeAttr("disabled");
		    } else {
		       $(".daftar").attr("disabled", "disabled");
		    }
		});
	</script>
</html>
