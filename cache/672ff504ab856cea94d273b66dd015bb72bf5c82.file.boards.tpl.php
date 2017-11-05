<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-01 19:15:26
         compiled from "application/views/front-end/boards.tpl" */ ?>
<?php /*%%SmartyHeaderCode:81573351459fa0f3e869b97-75747739%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '672ff504ab856cea94d273b66dd015bb72bf5c82' => 
    array (
      0 => 'application/views/front-end/boards.tpl',
      1 => 1509529240,
      2 => 'file',
    ),
    '4f153afbf5ab44676433787db7c5dcc57bad2a2c' => 
    array (
      0 => 'application/views/front-end/template.tpl',
      1 => 1509507395,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81573351459fa0f3e869b97-75747739',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59fa0f3e8ad3a4_92516348',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59fa0f3e8ad3a4_92516348')) {function content_59fa0f3e8ad3a4_92516348($_smarty_tpl) {?>
    <?php echo $_smarty_tpl->getSubTemplate ('front-end/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    
    
        <section id="page-title" style="background-image: url('http://belantara.or.id/wp-content/uploads/HistoryH02Nm_BelantaraFoundation_1920x600px.jpg');background-size: cover;
background-position: center bottom;">
            <div class="container">
                <div class="page-title">
                    <h1>Our Boards</h1>
                </div>
            </div>
        </section>
        <section id="page-content">
            <div class="container">

                <!-- Portfolio Filter -->
                <nav class="grid-filter gf-classic" data-layout="#portfolio">
                    <ul>
                        <li class="active"><a href="#" data-category="*">Show All</a></li>
                        <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['boards_category']->result(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                        <li><a href="#" data-category=".<?php echo $_smarty_tpl->tpl_vars['row']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value->category;?>
</a></li>
                        <?php } ?>
                    </ul>
                    <div class="grid-active-title">Show All</div>
                </nav>
                <!-- end: Portfolio Filter -->



                <!-- Portfolio -->
                <div id="portfolio" class="grid-layout portfolio-4-columns p-t-40" data-margin="20">

                    <!-- portfolio item -->

                    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['employee_boards']->result(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                    <div class="portfolio-item no-overlay img-zoom <?php echo $_smarty_tpl->tpl_vars['row']->value->idcategory;?>
 p-b-50">
                        <div class="portfolio-item-wrap">
                            <div class="portfolio-image">
                                <img src="<?php echo base_url();?>
document/images/employee/<?php echo $_smarty_tpl->tpl_vars['row']->value->image;?>
" alt="" class="img-circle">
                            </div>
                            <div class="portfolio-description">
                                <a href="portfolio-page-grid-gallery.html">
                                    <h3><a href="<?php echo base_url();?>
home/boardsdetail/<?php echo $_smarty_tpl->tpl_vars['row']->value->id;?>
" data-lightbox="ajax"><?php echo $_smarty_tpl->tpl_vars['row']->value->name;?>
</a></h3>
                                    <span><?php echo $_smarty_tpl->tpl_vars['row']->value->category;?>
 - <?php echo $_smarty_tpl->tpl_vars['row']->value->jabatan;?>
</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- end: portfolio item -->
                </div>
                <!-- end: Portfolio -->

            </div>
        </section>


                
    <?php echo $_smarty_tpl->getSubTemplate ('front-end/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    
	<?php }} ?>
