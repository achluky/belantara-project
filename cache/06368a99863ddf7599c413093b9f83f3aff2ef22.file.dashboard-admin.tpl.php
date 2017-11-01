<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-01 04:36:47
         compiled from "application/views/dashboard/dashboard-admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:136502986259f5474c73f424-42308264%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06368a99863ddf7599c413093b9f83f3aff2ef22' => 
    array (
      0 => 'application/views/dashboard/dashboard-admin.tpl',
      1 => 1509507395,
      2 => 'file',
    ),
    '43ec2c08ec64bf1d14cbdaeacf4983c7ccf91339' => 
    array (
      0 => 'application/views/admin/template_dashboard.tpl',
      1 => 1508939296,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136502986259f5474c73f424-42308264',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59f5474c7b8235_84852082',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59f5474c7b8235_84852082')) {function content_59f5474c7b8235_84852082($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <?php echo $_smarty_tpl->getSubTemplate ('admin/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        
    </head>
    <body class="skin-blue fixed">
        <div class="wrapper">
            <?php echo $_smarty_tpl->getSubTemplate ('admin/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                

    <div class="judul-atas-dashboard content-header-media">
		<div class="header-section">
			<img src="" alt="Logo Belantara" class="pull-right" style="margin-right: 10px;margin-top:-6px;" />
			<h1><small><?php echo lang('label.dashboard.title');?>
</small></h1>
		</div>
		<img src="" alt="header image" class="animation-pulseSlow" />
	</div>

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>

                    </h1>
                    <ol class="breadcrumb">
                        
                    </ol>

                </section>
                <!-- Main content -->
                <section class="content">
                    <!-- konten nantinya disini -->
                    
    <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="<?php echo base_url();?>
news" class="small-box-footer">
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>50</h3>
                      <p><strong style="text-transform: uppercase;"><?php echo lang('label.dashboard.news');?>
</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-document"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="<?php echo base_url();?>
event" class="small-box-footer">
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>150</h3>
                      <p><strong style="text-transform: uppercase;"><?php echo lang('label.dashboard.event');?>
</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-calendar"></i>
                    </div>
                  </div>
              </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="<?php echo base_url();?>
announcement" class="small-box-footer">
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3><img src="<?php echo base_url();?>
assets/img/www.png" alt="www" style="width:30px;"/></h3>
                      <p><strong style="text-transform: uppercase;"><?php echo lang('label.dashboard.announcment');?>
</strong></p>
                    </div>
                    <div class="icon">
                      <i class="glyphicon glyphicon-bullhorn"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
			
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="<?php echo base_url();?>
banner" class="small-box-footer">
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>150</h3>
                      <p><strong style="text-transform: uppercase;"><?php echo lang('label.dashboard.banner');?>
</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-images"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="<?php echo base_url();?>
page" class="small-box-footer">
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>150</h3>
                      <p><strong style="text-transform: uppercase;"><?php echo lang('label.dashboard.page');?>
</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-android-folder"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="<?php echo base_url();?>
link" class="small-box-footer">
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>150</h3>
                      <p><strong style="text-transform: uppercase;"><?php echo lang('label.dashboard.link');?>
</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-link"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="<?php echo base_url();?>
link" class="small-box-footer">
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>150</h3>
                      <p><strong style="text-transform: uppercase;"><?php echo lang('label.dashboard.menu');?>
</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-drag"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="<?php echo base_url();?>
incidental" class="small-box-footer">
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>150</h3>
                      <p><strong style="text-transform: uppercase;"><?php echo lang('label.dashboard.incidental');?>
</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-ios-infinite"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
    </div>
    <hr/>
	  <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="<?php echo base_url();?>
user" class="small-box-footer">
                  <div class="small-box bg-gray">
                    <div class="inner">
                      <h3>150</h3>
                      <p><strong style="text-transform: uppercase;"><?php echo lang('label.dashboard.user');?>
</strong></p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
                <a href="<?php echo base_url();?>
setting" class="small-box-footer">
                  <div class="small-box bg-gray">
                    <div class="inner">
                      <h3>150</h3>
                      <p><strong style="text-transform: uppercase;"><?php echo lang('label.dashboard.setting');?>
</strong></p>
                    </div>
                    <div class="icon">
                      <i class="glyphicon glyphicon-cog"></i>
                    </div>
                  </div>
                </a>
            </div><!-- ./col -->
    </div>

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <footer class="main-footer">
				<div class="pull-right hidden-xs">
                    <b><a href="http://belantara.or.id/">Belantara Fondation</a></b>
                </div>
                <strong>Copyright &copy; <?php echo date('Y');?>
 | All rights reserved.
				</strong>    
			</footer>
            
        </div><!-- ./wrapper -->
    
<!-- jQuery 2.1.3 -->
<?php echo '<script'; ?>
 src="<?php echo base_url();?>
assets/plugins/jQuery/jQuery-2.1.3.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<!-- jQuery UI 1.11.2 -->
<?php echo '<script'; ?>
 src="<?php echo base_url();?>
assets/plugins/jQuery/jquery-ui.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 3.3.2 JS -->
<?php echo '<script'; ?>
 src="<?php echo base_url();?>
assets/bootstrap/js/bootstrap.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo base_url();?>
assets/js/jquery.slimscroll.js" type="text/javascript"><?php echo '</script'; ?>
>
<!-- AdminLTE App -->
<?php echo '<script'; ?>
 src="<?php echo base_url();?>
assets/dist/js/app.min.js" type="text/javascript"><?php echo '</script'; ?>
>

<!-- Addons Plugins -->
<!-- Addons Plugins -->

    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo base_url();?>
assets/plugins/knob/jquery.knob.js"><?php echo '</script'; ?>
>

<!-- Addons Scripts -->



	
   </body>
</html><?php }} ?>
