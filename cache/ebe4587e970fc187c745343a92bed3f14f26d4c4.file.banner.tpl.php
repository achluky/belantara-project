<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-10-30 13:44:30
         compiled from "application/views/admin/banner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:72431375659f71eae720377-85458031%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ebe4587e970fc187c745343a92bed3f14f26d4c4' => 
    array (
      0 => 'application/views/admin/banner.tpl',
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
  'nocache_hash' => '72431375659f71eae720377-85458031',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59f71eae7cddc9_34811204',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59f71eae7cddc9_34811204')) {function content_59f71eae7cddc9_34811204($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <?php echo $_smarty_tpl->getSubTemplate ('admin/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        
<?php echo '<script'; ?>
 type="text/css">
  img.lazy {
        width: 700px; 
        height: 467px; 
        display: block;
        
        /* optional way, set loading as background */
        background-image: url('../../../assets/img/loading.gif');
        background-repeat: no-repeat;
        background-position: 50% 50%;
    }
<?php echo '</script'; ?>
>

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

                <a href="<?php echo base_url();?>
banner/add" class="btn btn-primary"><i class="glyphicon glyphicon-plus-sign"></i> Add Banner</a>
                <br/><br/>
                <?php if (isset($_smarty_tpl->tpl_vars['data']->value['alert'])&&($_smarty_tpl->tpl_vars['data']->value['alert']!='')) {?>
                <div class="callout callout-info">
                  <h4>Info!</h4>
                  <p><?php echo $_smarty_tpl->tpl_vars['data']->value['alert'];?>
</p>
                </div>
                <?php }?>
                  
                <div class="row">
                <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['banner_list']->result(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                  <div class="col-lg-3 col-md-4 col-xs-6 thumb" style="height:230px;">
                      <div style="float:right;">
                      <?php if ($_smarty_tpl->tpl_vars['row']->value->look==1) {?>
                      <span class="glyphicon glyphicon-pushpin fa-1x" style="float:right;"></span><br/>
                      <?php }?>
                      <a href="<?php echo base_url();?>
banner/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value->id;?>
"><span class="fa fa-edit fa-1x" style="float:right;"></span></a> <br/>
                      <a href="<?php echo base_url();?>
banner/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value->id;?>
"><span class="glyphicon glyphicon-remove fa-1x" style="float:right;"></span></a>
                      </div>
                      <p class="box-title" style="height:50px;"><?php echo ucwords(strtolower($_smarty_tpl->tpl_vars['row']->value->title_en));?>
</p>
                      <a href="#" class="thumbnail">
                      <img class="img-responsive lazy" src="http://ipb.ac.id/media/images/banner/<?php echo $_smarty_tpl->tpl_vars['row']->value->image;?>
">
                      </a>
                  </div>
                <?php } ?>
                </div>

                <nav>
                  <ul class="pager">
                    <li class="previous"><a href="<?php echo base_url();?>
banner?p=<?php echo $_smarty_tpl->tpl_vars['data']->value['page']-$_smarty_tpl->tpl_vars['data']->value['limit'];?>
"><span aria-hidden="true">&larr;</span> P</a></li>
                    <li class="next"><a href="<?php echo base_url();?>
banner?p=<?php echo $_smarty_tpl->tpl_vars['data']->value['page']+$_smarty_tpl->tpl_vars['data']->value['limit'];?>
">N <span aria-hidden="true">&rarr;</span></a></li>
                  </ul>
                </nav>

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
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
   $(function() {
        $('.lazy').lazy();
    });
<?php echo '</script'; ?>
>


	
   </body>
</html><?php }} ?>
