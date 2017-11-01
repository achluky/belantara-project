<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-10-29 04:14:45
         compiled from "application/views/admin/announcement_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:168902809559f547a5510bb1-33149170%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22e71bb156871a128977ccedcec4856e48f64552' => 
    array (
      0 => 'application/views/admin/announcement_edit.tpl',
      1 => 1508939296,
      2 => 'file',
    ),
    'f724b491564f7f403f316fafca5537229a955f47' => 
    array (
      0 => 'application/views/admin/template.tpl',
      1 => 1508939296,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168902809559f547a5510bb1-33149170',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59f547a55bd358_56472706',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59f547a55bd358_56472706')) {function content_59f547a55bd358_56472706($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <?php echo $_smarty_tpl->getSubTemplate ('admin/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        
<link rel="stylesheet" href="<?php echo base_url();?>
assets/plugins/jasny-bootstrap/css/jasny-bootstrap.min.css" media="screen">

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
                    <h3 class="box-title">Edit Announcement</h3>
                  </div>
                  <!-- /.box-header -->



                  <div class="box-body box-primary">
                      <form class="form-horizontal" action="<?php echo base_url();?>
announcement/update" name="" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['announcement']->id_pengumuman;?>
">
                            <input type="hidden" name="id_bahasa" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['announcement']->id_bahasa;?>
">
                            

                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Type</label>
                              <div class="col-sm-10">
                                <select class="form-control" name="type" required>
                                    <option value="1" <?php echo $_smarty_tpl->tpl_vars['data']->value['announcement']->condolence_greetings==1 ? "selected" : '';?>
>Condolence</option>
                                    <option value="0" <?php echo $_smarty_tpl->tpl_vars['data']->value['announcement']->condolence_greetings==0 ? "selected" : '';?>
>Greetings</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['data']->value['label']['announcement_title'];?>
</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="judul" name="judul" placeholder="<?php echo $_smarty_tpl->tpl_vars['data']->value['label']['announcement_title'];?>
" value="<?php echo quotes_to_entities($_smarty_tpl->tpl_vars['data']->value['announcement']->judul);?>
" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['data']->value['label']['announcement_summary'];?>
</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" rows="3" placeholder="<?php echo $_smarty_tpl->tpl_vars['data']->value['label']['announcement_summary'];?>
" name="ringkasan" required><?php echo $_smarty_tpl->tpl_vars['data']->value['announcement']->ringkasan;?>
</textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['data']->value['label']['announcement_contet'];?>
</label>
                              <div class="col-sm-10">
                                <textarea class="form-control textarea" rows="10" placeholder="<?php echo $_smarty_tpl->tpl_vars['data']->value['label']['announcement_contet'];?>
" name="isi" required><?php echo $_smarty_tpl->tpl_vars['data']->value['announcement']->isi;?>
</textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['data']->value['label']['announcement_keyword'];?>
</label>
                              <div class="col-sm-10">
                                <input type="input" class="form-control" id="keyword" placeholder="<?php echo $_smarty_tpl->tpl_vars['data']->value['label']['announcement_keyword'];?>
" name="keyword" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['announcement']->keyword;?>
" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['data']->value['label']['announcement_image'];?>
</label>
                              <div class="col-sm-10">
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                      <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                      <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span>
                                      <input type="file" name="image" value="" >
                                      <input type="input" name="image" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['announcement']->image;?>
">
                                      </span>
                                      <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                    <?php if ((isset($_smarty_tpl->tpl_vars['data']->value['announcement']->image))&&($_smarty_tpl->tpl_vars['data']->value['announcement']->image!='')) {?>
                                    <img src="http://ipb.ac.id/media/images/announcement/<?php echo $_smarty_tpl->tpl_vars['data']->value['announcement']->image;?>
"  class="img-rounded img-responsive thumbnail">
                                    <?php }?>
                              </div> 
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                              <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                              <a href="<?php echo base_url();?>
announcement"><?php echo $_smarty_tpl->tpl_vars['data']->value['label']['announcement_cancel'];?>
</a>
                              <button type="submit" class="btn btn-info pull-right"><?php echo $_smarty_tpl->tpl_vars['data']->value['label']['announcement_update'];?>
</button>
                        </div><!-- /.box-footer -->
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
assets/plugins/jasny-bootstrap/js/jasny-bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo base_url();?>
assets/plugins/ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    $(function () {
        CKEDITOR.replace('isi');
        $('.fileinput').fileinput();
    });
  <?php echo '</script'; ?>
>


	
   </body>
</html><?php }} ?>
