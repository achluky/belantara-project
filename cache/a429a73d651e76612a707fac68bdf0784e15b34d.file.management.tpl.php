<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-01 12:04:04
         compiled from "application/views/front-end/management.tpl" */ ?>
<?php /*%%SmartyHeaderCode:56135177859f94beeadd4e9-98773937%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a429a73d651e76612a707fac68bdf0784e15b34d' => 
    array (
      0 => 'application/views/front-end/management.tpl',
      1 => 1509533522,
      2 => 'file',
    ),
    '4f153afbf5ab44676433787db7c5dcc57bad2a2c' => 
    array (
      0 => 'application/views/front-end/template.tpl',
      1 => 1509507395,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56135177859f94beeadd4e9-98773937',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59f94beeb20171_83944099',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59f94beeb20171_83944099')) {function content_59f94beeb20171_83944099($_smarty_tpl) {?>
    <?php echo $_smarty_tpl->getSubTemplate ('front-end/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    
    
        <section id="page-title" style="background-image: url('http://belantara.or.id/wp-content/uploads/HistoryH02Nm_BelantaraFoundation_1920x600px.jpg');background-size: cover; background-position: center bottom;">
            <div class="container">
                <div class="page-title">
                    <h1>OUR MANAGEMENT</h1>
                </div>
            </div>
        </section>
        <section id="page-content">
            <div class="container">
                <!-- Portfolio Filter --><nav class="grid-filter gf-classic" data-layout="#portfolio">
                    <ul class="no-display">
                        <li class="active"><a href="#" data-category="*">Show All</a></li>
                        <li><a href="#" data-category=".Trustees">Board Of Trustees</a></li>
                        <li><a href="#" data-category=".Supervisory">Supervisory Boards</a></li>
                        <li><a href="#" data-category=".Executive">Executive Boards</a></li>
                        <li><a href="#" data-category=".Advisory">Advisory Boards</a></li>
                    </ul>
                    <div class="grid-active-title no-display">Show All</div>
                </nav>
                <!-- end: Portfolio Filter -->
                <div class="heading heading-center p-t-30">
                <h3>The Foundation’s Management Team is responsible for the day to day operation and management of Belantara’s conservation, restoration, and community development activities and projects.</h3></div>

                <!-- Portfolio -->
                <div id="portfolio" class="grid-layout portfolio-4-columns" data-margin="20">


                    <!-- portfolio item -->
                    <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['employee_management']->result(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                    <div class="portfolio-item no-overlay img-zoom Trustees p-b-50">
                        <div class="portfolio-item-wrap">
                            <div class="portfolio-image">
                                <img src="<?php echo base_url();?>
document/images/employee/<?php echo $_smarty_tpl->tpl_vars['row']->value->image;?>
" alt="" class="img-circle">
                            </div>
                            <div class="portfolio-description">
                                <a href="">
                                    <h3><a href="<?php echo base_url();?>
home/boardsdetail/<?php echo $_smarty_tpl->tpl_vars['row']->value->id;?>
" data-lightbox="ajax"><?php echo $_smarty_tpl->tpl_vars['row']->value->name;?>
</a></h3>
                                    <span><?php echo $_smarty_tpl->tpl_vars['row']->value->jabatan;?>
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
