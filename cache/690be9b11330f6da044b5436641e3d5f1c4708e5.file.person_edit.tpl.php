<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-01 16:45:06
         compiled from "application/views/admin/person_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:193288468159f9dae98ddeb8-07239585%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '690be9b11330f6da044b5436641e3d5f1c4708e5' => 
    array (
      0 => 'application/views/admin/person_edit.tpl',
      1 => 1509551095,
      2 => 'file',
    ),
    '3d258d7b854b8ea9ff0b1aa93dfbf0411f25470d' => 
    array (
      0 => 'application/views/admin/template.tpl',
      1 => 1504155499,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193288468159f9dae98ddeb8-07239585',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59f9dae9980624_02725539',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59f9dae9980624_02725539')) {function content_59f9dae9980624_02725539($_smarty_tpl) {?><!DOCTYPE html>
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


                <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">Edit Employee</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body box-primary">
                      <form role="form" data-toggle="validator" class="form-horizontal" action="<?php echo base_url();?>
person/update" name="" method="POST" enctype="multipart/form-data">
                        
                        <div class="box-body">
                            <input name="id" hidden value="<?php echo $_smarty_tpl->tpl_vars['data']->value['employee']->idPerson;?>
">
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['employee']->name;?>
" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Jabatan</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="nama" name="jabatan" placeholder="Jabatan" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['employee']->jabatan;?>
" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Deskripsi</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" rows="10" placeholder="Deskripsi" name="deskripsi_ID" required><?php echo $_smarty_tpl->tpl_vars['data']->value['employee']->deskripsi_ID;?>
</textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" rows="10" placeholder="Deskripsi EN" name="deskripsi_EN" required><?php echo $_smarty_tpl->tpl_vars['data']->value['employee']->deskripsi_EN;?>
</textarea>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Foto</label>
                              <div class="col-sm-10">
                                <input type="file" class="form-control" id="keyword" placeholder="Keyword English" name="foto" value="">
                                <br/>
                                <div class="portfolio-image">
                                    <a href="#"><img src="<?php echo base_url();?>
document/images/employee/<?php echo $_smarty_tpl->tpl_vars['data']->value['employee']->image;?>
" alt="" class="img-thumbnail" width="150px;"></a>
                                </div>

                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['data']->value['label']['category'];?>
</label>
                              <div class="col-sm-10">
                                <select class="form-control" name="idcategory" readonly>
                                  <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['category_employee']->result(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['data']->value['site_lang']=="ID") {?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['row']->value->id;?>
" <?php echo $_smarty_tpl->tpl_vars['data']->value['employee']->idcategory==$_smarty_tpl->tpl_vars['row']->value->id ? "selected" : '';?>
 ><?php echo $_smarty_tpl->tpl_vars['row']->value->category_ID;?>
</option>
                                    <?php } else { ?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['row']->value->id;?>
" <?php echo $_smarty_tpl->tpl_vars['data']->value['employee']->idcategory==$_smarty_tpl->tpl_vars['row']->value->id ? "selected" : '';?>
 ><?php echo $_smarty_tpl->tpl_vars['row']->value->category_EN;?>
</option>
                                    <?php }?>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                        <!-- /.box-body -->
                        </div>
                        <div class="box-footer">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <a href="<?php echo base_url();?>
page">Cancel</a>
                              <button type="submit" class="btn btn-info pull-right">Update</button>
                        </div><!-- /.box-footer -->
                        <br/>
                      </form>

                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
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

<?php echo '<script'; ?>
 src="<?php echo base_url();?>
assets/plugins/ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo base_url();?>
assets/js/validator.min.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
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