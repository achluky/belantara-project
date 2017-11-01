<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-01 16:59:52
         compiled from "application/views/admin/person_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134579133159f9e93d025951-24898461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0cc8f16882220045e3fe66987c6904a8fb6e4e1' => 
    array (
      0 => 'application/views/admin/person_delete.tpl',
      1 => 1509551991,
      2 => 'file',
    ),
    '3d258d7b854b8ea9ff0b1aa93dfbf0411f25470d' => 
    array (
      0 => 'application/views/admin/template.tpl',
      1 => 1504155499,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134579133159f9e93d025951-24898461',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59f9e93d026299_26529250',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59f9e93d026299_26529250')) {function content_59f9e93d026299_26529250($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <?php echo $_smarty_tpl->getSubTemplate ('admin/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        
    </head>
    <body class="skin-blue fixed">
        <div class="wrapper">
            <?php echo $_smarty_tpl->getSubTemplate ('admin/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
				<div class="judul-atas">
					<div class="header-section">
						<h1>
							<div class="glyph-atas">
								<i class="glyph-icon flaticon-university"></i>
							</div>
							<?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>

						</h1>
					</div>
				</div>
				<ul class="breadcrumb breadcrumb-top">
					
      <i class="glyphicon glyphicon-home"></i> &nbsp;
	  <?php $_smarty_tpl->tpl_vars['stopbreadcrumb'] = new Smarty_variable(0, null, 0);?>
      <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['label'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['breadcrumb']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['label']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
		<?php if ($_smarty_tpl->tpl_vars['stopbreadcrumb']->value++<count($_smarty_tpl->tpl_vars['data']->value['breadcrumb'])-1) {?>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['label']->value;?>
</a></li>
		<?php } else { ?>
			<li><?php echo $_smarty_tpl->tpl_vars['label']->value;?>
</li>
		<?php }?>
      <?php } ?>

				</ul>
                <!-- Main content -->
                <section class="content">
                    <!-- konten nantinya disini -->
                    
<div class="row"> 
    <div class="col-xs-12">
          <?php if (isset($_smarty_tpl->tpl_vars['data']->value['alert'])&&($_smarty_tpl->tpl_vars['data']->value['alert']!='')) {?>
          <div class="callout callout-info">
            <h4>Info!</h4>
            <p><?php echo $_smarty_tpl->tpl_vars['data']->value['alert'];?>
</p>
          </div>
          <?php }?>
          <div>
          </div>
          <a href="<?php echo base_url();?>
person"><button type="button" class="btn btn-default">Cancle</button></a>
          <a href="<?php echo base_url();?>
person/delete/<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
?n=true"><button type="submit" class="btn btn-danger">Delete</button></a>
    </div>
    <!-- /.col -->
</div>

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <footer class="main-footer">
				<div class="pull-right hidden-xs">
                    <b><a href="http://ict.ipb.ac.id">DIDSI IPB</a></b>
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

<!-- Addons Scripts -->


	
   </body>
</html><?php }} ?>
