<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-10-29 04:13:24
         compiled from "application/views/admin/event.tpl" */ ?>
<?php /*%%SmartyHeaderCode:113394499859f547541ad375-95823303%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '239865b10a98c7d5ca591a9c11434fdaac0c4aa6' => 
    array (
      0 => 'application/views/admin/event.tpl',
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
  'nocache_hash' => '113394499859f547541ad375-95823303',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59f5475422bbd1_63737866',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59f5475422bbd1_63737866')) {function content_59f5475422bbd1_63737866($_smarty_tpl) {?><!DOCTYPE html>
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
                    <h3 class="box-title">Event List</h3>
                    <a href="<?php echo base_url();?>
event/add"class="btn btn-primary" style="float:right;"><i class="glyphicon glyphicon-plus-sign"></i> Add EVENT</a>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th width="500px;"><?php echo $_smarty_tpl->tpl_vars['data']->value['label']['tabel_title'];?>
</th>
                          <th><?php echo $_smarty_tpl->tpl_vars['data']->value['label']['tabel_start'];?>
</th>
                          <th><?php echo $_smarty_tpl->tpl_vars['data']->value['label']['tabel_end'];?>
</th>
                          <th width="20px;"><?php echo $_smarty_tpl->tpl_vars['data']->value['label']['tabel_lang'];?>
</th>
                          <th width="150px;"><?php echo $_smarty_tpl->tpl_vars['data']->value['label']['table_action'];?>
</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['event_list']->result(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                        <tr>
                          <td><?php echo $_smarty_tpl->tpl_vars['row']->value->judul;?>
</td>
                          <td><?php echo convert_date($_smarty_tpl->tpl_vars['row']->value->waktu);?>
</td>
                          <td><?php echo convert_date($_smarty_tpl->tpl_vars['row']->value->berakhir);?>
</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['row']->value->id_bahasa;?>
</td>
                          <td>
                              <a href="<?php echo base_url('event');?>
/<?php echo strtolower($_smarty_tpl->tpl_vars['row']->value->id_bahasa);?>
/<?php echo convert_date_format('Y',$_smarty_tpl->tpl_vars['row']->value->waktu);?>
/<?php echo convert_date_format('m',$_smarty_tpl->tpl_vars['row']->value->waktu);?>
/<?php echo slug($_smarty_tpl->tpl_vars['row']->value->judul);?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value->id_event;?>
"  class="btn btn-xs"><i class="fa fa-file fa-fw"></i> view</a>
                              <a href="<?php echo base_url();?>
event/edit/<?php echo $_smarty_tpl->tpl_vars['row']->value->id_bahasa;?>
/<?php echo $_smarty_tpl->tpl_vars['row']->value->id_event;?>
"  class="btn btn-xs"><i class="fa fa-edit fa-fw"></i> Edit</a>
                              <a href="<?php echo base_url();?>
event/delete/<?php echo $_smarty_tpl->tpl_vars['row']->value->id_event;?>
" class="btn btn-xs"><i class="fa fa-remove fa-fw"></i> Delete</a>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
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

<!-- DATA TABELS SCRIPT -->
<?php echo '<script'; ?>
 src="<?php echo base_url();?>
assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo base_url();?>
assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
>
      $(function () {
        $("#example1").DataTable({

          "order": [[ 1, "desc" ]]
        });
      });
    <?php echo '</script'; ?>
>


	
   </body>
</html><?php }} ?>