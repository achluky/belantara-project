<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-01 12:17:54
         compiled from "application/views/front-end/people-ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:158365407959f94e9c71cfa6-28643056%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c08be94bc1414d57d62a66ef8dcd83c5820f614f' => 
    array (
      0 => 'application/views/front-end/people-ajax.tpl',
      1 => 1509534903,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158365407959f94e9c71cfa6-28643056',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59f94e9c740524_95674925',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59f94e9c740524_95674925')) {function content_59f94e9c740524_95674925($_smarty_tpl) {?>
<div class="portfolio-ajax-page">
    <div class="row">
        <div class="col-md-12">
            <div class="project-description">
                <img src="<?php echo base_url();?>
document/images/employee/<?php echo $_smarty_tpl->tpl_vars['data']->value['people']->image;?>
" class="img-responsive img-people">
                <h2><?php echo $_smarty_tpl->tpl_vars['data']->value['people']->name;?>
</h2>
                <?php if ($_smarty_tpl->tpl_vars['data']->value['site_lang']=='EN') {?>
                <?php echo $_smarty_tpl->tpl_vars['data']->value['people']->deskripsi_EN;?>

                <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['data']->value['people']->deskripsi_ID;?>

                <?php }?>
                <hr>
            </div>
        </div>
    </div>
</div>
<?php }} ?>
