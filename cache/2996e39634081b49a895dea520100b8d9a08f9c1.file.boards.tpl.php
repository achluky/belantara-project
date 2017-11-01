<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-01 16:22:28
         compiled from "application/views/front-end/boards.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30248066059f8b2d4d85e57-19152066%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2996e39634081b49a895dea520100b8d9a08f9c1' => 
    array (
      0 => 'application/views/front-end/boards.tpl',
      1 => 1509549744,
      2 => 'file',
    ),
    'aa05a97be8403772d7ec676845277f02b53e3008' => 
    array (
      0 => 'application/views/front-end/template.tpl',
      1 => 1509462416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30248066059f8b2d4d85e57-19152066',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59f8b2d4dd2759_84773513',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59f8b2d4dd2759_84773513')) {function content_59f8b2d4dd2759_84773513($_smarty_tpl) {?>
    <?php echo $_smarty_tpl->getSubTemplate ('front-end/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    
    
        <section id="page-title" style="background-image: url('http://belantara.or.id/wp-content/uploads/HistoryH02Nm_BelantaraFoundation_1920x600px.jpg');background-size: cover; background-position: center bottom;">
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
"><?php echo $_smarty_tpl->tpl_vars['row']->value->category_EN;?>
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
home/boardsdetail/<?php echo $_smarty_tpl->tpl_vars['row']->value->idPerson;?>
" data-lightbox="ajax"><?php echo $_smarty_tpl->tpl_vars['row']->value->name;?>
</a></h3>
                                    <span><?php echo $_smarty_tpl->tpl_vars['row']->value->category_EN;?>
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
