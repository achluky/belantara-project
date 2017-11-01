<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-01 15:18:38
         compiled from "application/views/admin/ref_category_employe_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18179529859f9d521870f10-43696434%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eee1da670dd47ca9a0943ffc8eaa8ff694a3c7ff' => 
    array (
      0 => 'application/views/admin/ref_category_employe_edit.tpl',
      1 => 1509545915,
      2 => 'file',
    ),
    '3d258d7b854b8ea9ff0b1aa93dfbf0411f25470d' => 
    array (
      0 => 'application/views/admin/template.tpl',
      1 => 1504155499,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18179529859f9d521870f10-43696434',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59f9d5218f3168_63247329',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59f9d5218f3168_63247329')) {function content_59f9d5218f3168_63247329($_smarty_tpl) {?><!DOCTYPE html>
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
					
    <i class="glyphicon glyphicon-home">
    </i>
    <?php $_smarty_tpl->tpl_vars['stopbreadcrumb'] = new Smarty_variable(0, null, 0);?>
      <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['label'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['breadcrumb']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['label']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
        <?php if ($_smarty_tpl->tpl_vars['stopbreadcrumb']->value++<count($_smarty_tpl->tpl_vars['data']->value['breadcrumb'])-1) {?>
    <li>
        <a href="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
">
            <?php echo $_smarty_tpl->tpl_vars['label']->value;?>

        </a>
    </li>
    <?php } else { ?>
    <li>
        <?php echo $_smarty_tpl->tpl_vars['label']->value;?>

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
                <h4>
                    Info!
                </h4>
                <p>
                    <?php echo $_smarty_tpl->tpl_vars['data']->value['alert'];?>

                </p>
            </div>
            <?php }?>
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Edit Category Employee</h3>
                </div>
                <!-- /.box-header -->
                <form action="<?php echo base_url();?>
referensi/category_update" class="form-horizontal" method="POST" name="">
                    <div class="box-body box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <input name="id" hidden value="<?php echo $_smarty_tpl->tpl_vars['data']->value['category']->id;?>
">
                                <label class="col-sm-2 control-label" for="inputEmail3">
                                    <?php echo $_smarty_tpl->tpl_vars['data']->value['label']['category'];?>

                                </label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="judul" name="category_ID" placeholder="Kategori Indonesia" required="" type="input" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['category']->category_ID;?>
">
                                    </input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="inputEmail3">
                                </label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="judul" name="category_EN" placeholder="Category On English" required="" type="input" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['category']->category_EN;?>
">
                                    </input>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <label class="col-sm-2 control-label" for="inputPassword3">
                        </label>
                        <a href="<?php echo base_url();?>
referensi/category">
                            Cancel
                        </a>
                        <button class="btn btn-info pull-right" type="submit">
                            update
                        </button>
                    </div>
                    <br/>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</link>

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

<?php echo '<script'; ?>
 src="<?php echo base_url();?>
assets/plugins/ckeditor/ckeditor.js">
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 charset="utf-8" src="<?php echo base_url();?>
assets/js/validator.min.js" type="text/javascript">
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $(function () {
        CKEDITOR.replace('content_EN');
        CKEDITOR.replace('content_ID');
    });
<?php echo '</script'; ?>
>


	
   </body>
</html><?php }} ?>
