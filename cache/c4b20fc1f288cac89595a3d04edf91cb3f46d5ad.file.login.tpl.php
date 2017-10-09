<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-10-08 21:59:26
         compiled from "application/views/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:41694156459d906499a2821-33104524%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4b20fc1f288cac89595a3d04edf91cb3f46d5ad' => 
    array (
      0 => 'application/views/login.tpl',
      1 => 1507492203,
      2 => 'file',
    ),
    '61ed60a7546335d396afc77570b8e4e7d851d16a' => 
    array (
      0 => 'application/views/template.tpl',
      1 => 1507415786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41694156459d906499a2821-33104524',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59d906499cc076_79776857',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59d906499cc076_79776857')) {function content_59d906499cc076_79776857($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head>
        <?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        
    </head>
    <!-- end::Head -->
    <!-- end::Body -->
    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >


        
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--singin" id="m_login">
		<div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
			<div class="m-stack m-stack--hor m-stack--desktop">
				<div class="m-stack__item m-stack__item--fluid">
					<div class="m-login__wrapper">
						<div class="m-login__logo">
							<a href="#">
								<img src="/belantara-project/assets/app/media/img/logos/logo-2.png">
							</a>
						</div>
						<div class="m-login__signin">
							<div class="m-login__head">
								<h3 class="m-login__title">
									Sign In To Admin Belantara
								</h3>
							</div>

							<form class="m-login__form m-form"  action="<?php echo base_url();?>
admin/auth" method="post">

				                <?php if (isset($_smarty_tpl->tpl_vars['data']->value['error_msg'])&&($_smarty_tpl->tpl_vars['data']->value['error_msg']!='')) {?>
				               	<div class="m-alert m-alert--outline alert alert-danger alert-dismissible" role="alert">			
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>			
									<span><?php echo $_smarty_tpl->tpl_vars['data']->value['error_msg'];?>
</span>		
								</div>
				                <?php }?>
												
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" placeholder="Username" name="user" autocomplete="off" value="ahmadluki">
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="pwd" value="4hm4dluk1">
								</div>
								<div class="row m-login__form-sub">
									<div class="col m--align-left">
										<label class="m-checkbox m-checkbox--focus">
											<input type="checkbox" name="remember">
											Remember me
											<span></span>
										</label>
									</div>
									<div class="col m--align-right">
										<a href="javascript:;" id="m_login_forget_password" class="m-link">
											Forget Password ?
										</a>
									</div>
								</div>
								<div class="m-login__form-action">
									<button class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
										Sign In
									</button>
								</div>
							</form>
						</div>
						<div class="m-login__forget-password">
							<div class="m-login__head">
								<h3 class="m-login__title">
									Forgotten Password ?
								</h3>
								<div class="m-login__desc">
									Enter your email to reset your password:
								</div>
							</div>
							<form class="m-login__form m-form" action="">
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
								</div>
								<div class="m-login__form-action">
									<button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
										Request
									</button>
									<button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom">
										Cancel
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1	m-login__content" style="background-image: url(/belantara-project/assets/app/media/img//bg/bg-4.jpg)">
		</div>
	</div>
</div>
<!-- end:: Page -->


        <!--begin::Base Scripts -->
        <?php echo '<script'; ?>
 src="/belantara-project/assets/vendors/base/vendors.bundle.js" type="text/javascript"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="/belantara-project/assets/demo/default/base/scripts.bundle.js" type="text/javascript"><?php echo '</script'; ?>
>
        <!--end::Base Scripts -->
        <!--begin::Page Snippets -->
        <?php echo '<script'; ?>
 src="/belantara-project/assets/snippets/pages/user/login.js" type="text/javascript"><?php echo '</script'; ?>
>
        <!--end::Page Snippets -->

        <!-- Addons Plugins -->
        
        <!-- Addons Scripts -->
        

    </body>
    <!-- end::Body -->
</html>
<?php }} ?>
