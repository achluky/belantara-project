<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-01 16:15:20
         compiled from "application/views/front-end/people-ajax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:60324916559f9e3b47c0d92-59598988%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e50ba5a848f41e51955e53fe68863a73b25be826' => 
    array (
      0 => 'application/views/front-end/people-ajax.tpl',
      1 => 1509549317,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '60324916559f9e3b47c0d92-59598988',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59f9e3b4809779_49057638',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59f9e3b4809779_49057638')) {function content_59f9e3b4809779_49057638($_smarty_tpl) {?>
<div class="portfolio-ajax-page">
    <div class="row">
        <div class="col-md-12">
            <div class="project-description">
                <h2><?php echo $_smarty_tpl->tpl_vars['data']->value['people']->name;?>
</h2>
                <?php if ($_smarty_tpl->tpl_vars['data']->value['site_lang']=='EN') {?>

                <img src="<?php echo base_url();?>
document/images/employee/<?php echo $_smarty_tpl->tpl_vars['data']->value['people']->image;?>
" class="img-responsive img-people thumbnail" style="width:200px; float: left ; margin-right: 20px; margin-bottom: 20px;" >

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
