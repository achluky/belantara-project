<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-01 04:58:32
         compiled from "application/views/admin/page_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26951215459f94668277136-70423776%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '872e47af7d3e333c87d64374f8fe667d92e91303' => 
    array (
      0 => 'application/views/admin/page_edit.tpl',
      1 => 1509507395,
      2 => 'file',
    ),
    'f724b491564f7f403f316fafca5537229a955f47' => 
    array (
      0 => 'application/views/admin/template.tpl',
      1 => 1508939296,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26951215459f94668277136-70423776',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59f946682f9c78_17488276',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59f946682f9c78_17488276')) {function content_59f946682f9c78_17488276($_smarty_tpl) {?><!DOCTYPE html>
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
                    <h3 class="box-title">Edit Page</h3>
                </div>
                <!-- /.box-header -->
                <form action="<?php echo base_url();?>
page/update" class="form-horizontal" method="POST" name="">
                    <div class="box-body box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <input name="id" hidden value="<?php echo $_smarty_tpl->tpl_vars['data']->value['page']->id;?>
">
                                <label class="col-sm-2 control-label" for="inputEmail3">
                                    Judul
                                </label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="judul" name="title_EN" placeholder="Judul English" required="" type="input" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['page']->title_EN;?>
">
                                    </input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="inputEmail3">
                                </label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="judul" name="title_ID" placeholder="Judul Indonesia" required="" type="input" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['page']->title_ID;?>
">
                                    </input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="inputPassword3">
                                    Isi
                                </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="content_EN" placeholder="Isi English" required="" rows="10">
                                    <?php echo $_smarty_tpl->tpl_vars['data']->value['page']->content_EN;?>

                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="inputPassword3">
                                </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="content_ID" placeholder="Isi Indonesia" required="" rows="10">
                                    <?php echo $_smarty_tpl->tpl_vars['data']->value['page']->content_ID;?>

                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="inputPassword3">
                                    Keyword
                                </label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="keyword" name="keyword_EN" placeholder="Keyword English" required="" type="input" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['page']->keyword_EN;?>
">
                                    </input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="inputPassword3">
                                </label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="keyword" name="keyword_ID" placeholder="Keyword Indonesia" required="" type="input" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['page']->keyword_ID;?>
">
                                    </input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="inputPassword3">
                                    URL
                                </label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="keyword" name="url" placeholder="Alamat URL" required="" type="input" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['page']->url;?>
">
                                    </input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="inputPassword3">
                                    Sidebar Content
                                </label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="sidebar" readonly="">
                                        <option selected="" value="0">
                                            -Menu-
                                        </option>
                                        <option value="0">
                                            Profile
                                        </option>
                                        <option value="0">
                                            Link
                                        </option>
                                    </select>
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
main_menu">
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
