<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-10-10 01:09:28
         compiled from "application/views/backend/side-menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:149331712859dbf3c304b733-77492459%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80f0478e2f9054b7723565f25e1f3880cf675027' => 
    array (
      0 => 'application/views/backend/side-menu.tpl',
      1 => 1507590565,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149331712859dbf3c304b733-77492459',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59dbf3c3058af8_68756608',
  'variables' => 
  array (
    'navbar' => 0,
    'item' => 0,
    'subitem' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59dbf3c3058af8_68756608')) {function content_59dbf3c3058af8_68756608($_smarty_tpl) {?>
<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " data-menu-vertical="true" data-menu-scrollable="false" data-menu-dropdown-timeout="500"  >
    <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
                <a  href="index.html" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Dashboard
                            </span>
                        </span>
                    </span>
                </a>
            </li>

            <?php if (isset($_smarty_tpl->tpl_vars['navbar']->value)) {?>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['navbar']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                
                <li class=" m-menu__item  m-menu__item--submenu <?php echo $_smarty_tpl->tpl_vars['item']->value["status"];?>
 " aria-haspopup="true"  data-menu-submenu-toggle="hover">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value["url"];?>
" class="m-menu__link m-menu__toggle">
                        <i class="m-menu__link-icon  <?php echo $_smarty_tpl->tpl_vars['item']->value["class"];?>
"></i>
                        <span class="m-menu__link-text"><?php echo $_smarty_tpl->tpl_vars['item']->value["name"];?>
</span>
                        <?php if (is_array($_smarty_tpl->tpl_vars['item']->value["submenu"])) {?>
                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                        <?php }?>
                    </a>
                    <div class="m-menu__submenu">
                        <span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
                                <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value["url"];?>
" class="m-menu__link">
                                    <span class="m-menu__link-text">
                                        <?php echo $_smarty_tpl->tpl_vars['item']->value["name"];?>

                                    </span>
                                </a>
                            </li>

                            <?php  $_smarty_tpl->tpl_vars['subitem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['subitem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value["submenu"]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['subitem']->key => $_smarty_tpl->tpl_vars['subitem']->value) {
$_smarty_tpl->tpl_vars['subitem']->_loop = true;
?>
                            <li class="m-menu__item <?php echo $_smarty_tpl->tpl_vars['subitem']->value["status"];?>
" aria-haspopup="true" >
                                <a  href="<?php echo $_smarty_tpl->tpl_vars['subitem']->value["url"];?>
" class="m-menu__link ">
                                    <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="m-menu__link-text">
                                        <?php echo $_smarty_tpl->tpl_vars['subitem']->value["name"];?>

                                    </span>
                                </a>
                            </li>
                            <?php } ?>
                            

                        </ul>
                    </div>

                </li>
                
            <?php } ?>
            <?php }?>


    </ul>
</div><?php }} ?>
