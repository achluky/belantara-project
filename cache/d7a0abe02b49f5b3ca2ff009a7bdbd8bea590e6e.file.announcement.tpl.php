<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-10-29 04:13:29
         compiled from "application/views/admin/announcement.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54141681959f5475933e300-19312857%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7a0abe02b49f5b3ca2ff009a7bdbd8bea590e6e' => 
    array (
      0 => 'application/views/admin/announcement.tpl',
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
  'nocache_hash' => '54141681959f5475933e300-19312857',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59f547593aa329_43177059',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59f547593aa329_43177059')) {function content_59f547593aa329_43177059($_smarty_tpl) {?><!DOCTYPE html>
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
                    <h3 class="box-title">Announcement List</h3>
                    <a href="<?php echo base_url();?>
announcement/add"class="btn btn-primary" style="float:right;"><i class="glyphicon glyphicon-plus-sign"></i> Add Announcement</a>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th width="500px;"><?php echo $_smarty_tpl->tpl_vars['data']->value['label']['tabel_title'];?>
</th>
                          <th width="100px;"><?php echo $_smarty_tpl->tpl_vars['data']->value['label']['tabel_date'];?>
</th>
                          <th width="20px;"><?php echo $_smarty_tpl->tpl_vars['data']->value['label']['tabel_lang'];?>
</th>
                          <th width="150px;"><?php echo $_smarty_tpl->tpl_vars['data']->value['label']['table_action'];?>
</th>
                        </tr>
                      </thead>
                      <tbody>
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
        //$("#example1").DataTable({
        // "processing": true,
        // "serverSide": true,
        // "ajax": "<?php echo base_url();?>
news/index"
        //});
        table = $('#example1').DataTable({
 
          "processing": true, //Feature control the processing indicator.
          "serverSide": true, //Feature control DataTables' server-side processing mode.
   
          // Load data for the table's content from an Ajax source
          "ajax": {
              "url": "<?php echo base_url();?>
announcement/announcement_list",
              "type": "POST"
          },
          
          "order": [[ 1, "desc" ]],

          //Set column definition initialisation properties.
          "columnDefs": [
          {
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
          },
          ],
   
        });
      });
    <?php echo '</script'; ?>
>


	
   </body>
</html><?php }} ?>