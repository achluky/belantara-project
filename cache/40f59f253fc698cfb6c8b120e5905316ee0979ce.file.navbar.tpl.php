<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-05 11:09:21
         compiled from "application/views/admin/navbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:74466848359fee351675d10-49717540%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40f59f253fc698cfb6c8b120e5905316ee0979ce' => 
    array (
      0 => 'application/views/admin/navbar.tpl',
      1 => 1508939296,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74466848359fee351675d10-49717540',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'navbar' => 0,
    'item' => 0,
    'subitem' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59fee3516be109_47039659',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59fee3516be109_47039659')) {function content_59fee3516be109_47039659($_smarty_tpl) {?><header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url();?>
" class="logo">
		<!-- <img src="" alt="www." /> -->
		<b>WEB</b> <small>Belantara Foun.</small>
	</a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php echo lang('navigation.language');?>
 <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url();?>
lang/s/EN?url=<?php echo $_smarty_tpl->tpl_vars['data']->value['url'];?>
" style="padding:5px 0px 5px 10px;">
									<img src="<?php echo base_url('assets/img/en.png');?>
" alt="ID">
										<?php echo lang('navigation.language.en');?>

								</a>
							</li>
                            <li><a href="<?php echo base_url();?>
lang/s/ID?url=<?php echo $_smarty_tpl->tpl_vars['data']->value['url'];?>
" style="padding:5px 0px 5px 10px;">
									<img src="<?php echo base_url('assets/img/id.png');?>
"  alt="EN">
									<?php echo lang('navigation.language.id');?>

								</a>
							</li>
                        </ul>
                </li>
				
               
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <img src="<?php echo base_url('assets/img/belantara_profile.png');?>
" class="user-image" alt="User Image">
                      <span class="hidden-xs">
                          <?php echo $_smarty_tpl->tpl_vars['data']->value['session'];?>

                      </span>
                    </a>
					
					<ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                                <img alt="User Image" src="<?php echo base_url('assets/img/belantara_profile.png');?>
" class="img-circle">
								<p>
                                        <span><?php echo $_smarty_tpl->tpl_vars['data']->value['session'];?>
</span>
                                        <small><?php echo lang('navigation.label.ipb');?>
</small>
                                    </p>
                                </li>

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                        <a class="btn btn-default btn-flat" href="<?php echo base_url('admin/edit_profile');?>
"><i class="fa fa-pencil"></i><?php echo lang('navigation.label.edit_profile');?>
</a>
                                
                                        <a class="btn btn-default btn-flat" href="<?php echo base_url('admin/logout');?>
"><i class="fa fa-sign-out"></i><?php echo lang('navigation.label.logout');?>
</a>
                                </li>
                            </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<aside class="main-sidebar affix">
    <section class="sidebar">
		<div class="profile">
                <ul>
                    <li>
                        <img src="<?php echo base_url('assets/img/belantara_profile.png');?>
" class="user-image" alt="User Image">
                    </li>
                    <li><?php echo strtoupper($_smarty_tpl->tpl_vars['data']->value['session']);?>
</li>
                    <li><?php echo lang('navigation.label.last_login');?>
: <?php echo $_smarty_tpl->tpl_vars['data']->value['last_login'];?>
</li>
                </ul>
		</div>
        <ul class="sidebar-menu">
            <li class="header"><?php echo lang('navigation.label.main.navigation');?>
</li>
			<?php if (isset($_smarty_tpl->tpl_vars['navbar']->value)) {?>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['navbar']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
				
				<li class="treeview <?php echo $_smarty_tpl->tpl_vars['item']->value["status"];?>
">
					<a href="<?php echo $_smarty_tpl->tpl_vars['item']->value["url"];?>
">
						<i class="<?php echo $_smarty_tpl->tpl_vars['item']->value["class"];?>
"></i>
						<span><?php echo $_smarty_tpl->tpl_vars['item']->value["name"];?>
</span>
						<?php if (is_array($_smarty_tpl->tpl_vars['item']->value["submenu"])) {?>
						<i class="fa fa-angle-left pull-right"></i>
						<?php }?>
					</a>
					<?php if (is_array($_smarty_tpl->tpl_vars['item']->value["submenu"])) {?>
						<?php if ($_smarty_tpl->tpl_vars['item']->value["status"]=="active") {?>
						<ul class="treeview-menu menu-open">
						<?php } else { ?>
						<ul class="treeview-menu menu-open" style="display: none;">
						<?php }?>
						<?php  $_smarty_tpl->tpl_vars['subitem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['subitem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value["submenu"]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['subitem']->key => $_smarty_tpl->tpl_vars['subitem']->value) {
$_smarty_tpl->tpl_vars['subitem']->_loop = true;
?>
							<li class="<?php echo $_smarty_tpl->tpl_vars['subitem']->value["status"];?>
">
								<a href="<?php echo $_smarty_tpl->tpl_vars['subitem']->value["url"];?>
">
									<i class="<?php echo $_smarty_tpl->tpl_vars['subitem']->value["class"];?>
"></i> 
									<?php echo $_smarty_tpl->tpl_vars['subitem']->value["name"];?>

								</a>
							</li>
						<?php } ?>
						</ul>
					<?php }?>
				</li>
				
			<?php } ?>
			<?php }?>

        </ul>
    </section>
</aside><?php }} ?>
