<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-10-31 18:29:26
         compiled from "application/views/front-end/boards.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30248066059f8b2d4d85e57-19152066%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2996e39634081b49a895dea520100b8d9a08f9c1' => 
    array (
      0 => 'application/views/front-end/boards.tpl',
      1 => 1509470964,
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

    
    
        <section id="page-title" style="background-image:url(<?php echo base_url();?>
assets/front-end/images/parallax/5.jpg);">
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
                        <li><a href="#" data-category=".Trustees">Board Of Trustees</a></li>
                        <li><a href="#" data-category=".Supervisory">Supervisory Boards</a></li>
                        <li><a href="#" data-category=".Executive">Executive Boards</a></li>
                        <li><a href="#" data-category=".Advisory" data-intro = "eeeeee">Advisory Boards</a></li>
                    </ul>
                    <div class="grid-active-title">Show All</div>
                </nav>
                <!-- end: Portfolio Filter -->



                <!-- Portfolio -->
                <div id="portfolio" class="grid-layout portfolio-4-columns p-t-40" data-margin="20">


                    <!-- portfolio item -->
                    <div class="portfolio-item no-overlay img-zoom Trustees p-b-50">
                        <div class="portfolio-item-wrap">
                            <div class="portfolio-image">
                                <a href="#"><img src="<?php echo base_url();?>
assets/front-end/images/team/1.jpg" alt="" class="img-circle"></a>
                            </div>
                            <div class="portfolio-description">
                                <a href="portfolio-page-grid-gallery.html">
                                    <h3>Indrajaya Gunawan</h3>
                                    <span>Vice Manager</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-item no-overlay img-zoom Supervisory p-b-50">
                        <div class="portfolio-item-wrap">
                            <div class="portfolio-image">
                                <a href="#"><img src="<?php echo base_url();?>
assets/front-end/images/team/2.jpg" alt="" class="img-circle"></a>
                            </div>
                            <div class="portfolio-description">
                                <a href="portfolio-page-grid-gallery.html">
                                    <h3>Indrajaya Gunawan</h3>
                                    <span>Vice Manager</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-item no-overlay img-zoom Executive  p-b-50">
                        <div class="portfolio-item-wrap">
                            <div class="portfolio-image">
                                <a href="#"><img src="<?php echo base_url();?>
assets/front-end/images/team/3.jpg" alt="" class="img-circle"></a>
                            </div>
                            <div class="portfolio-description">
                                <a href="portfolio-page-grid-gallery.html">
                                   <h3>Indrajaya Gunawan</h3>
                                   <span>Vice Manager</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-item no-overlay img-zoom Advisory  p-b-50">
                        <div class="portfolio-item-wrap">
                            <div class="portfolio-image">
                                <a href="#"><img src="<?php echo base_url();?>
assets/front-end/images/team/4.jpg" alt="" class="img-circle"></a>
                            </div>
                            <div class="portfolio-description">
                                <a href="portfolio-page-grid-gallery.html">
                                    <h3>Indrajaya Gunawan</h3>
                                    <span>Vice Manager</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-item no-overlay img-zoom Trustees  p-b-50">
                        <div class="portfolio-item-wrap">
                            <div class="portfolio-image">
                                <a href="#"><img src="<?php echo base_url();?>
assets/front-end/images/team/1.jpg" alt="" class="img-circle"></a>
                            </div>
                            <div class="portfolio-description">
                                <a href="portfolio-page-grid-gallery.html">
                                    <h3>Indrajaya Gunawan</h3>
                                    <span>Vice Manager</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-item no-overlay img-zoom Supervisory  p-b-50">
                        <div class="portfolio-item-wrap">
                            <div class="portfolio-image">
                                <a href="#"><img src="<?php echo base_url();?>
assets/front-end/images/team/2.jpg" alt="" class="img-circle"></a>
                            </div>
                            <div class="portfolio-description">
                                <a href="portfolio-page-grid-gallery.html">
                                    <h3>Indrajaya Gunawan</h3>
                                    <span>Vice Manager</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-item no-overlay img-zoom Advisory  p-b-50">
                        <div class="portfolio-item-wrap">
                            <div class="portfolio-image">
                                <a href="#"><img src="<?php echo base_url();?>
assets/front-end/images/team/3.jpg" alt="" class="img-circle"></a>
                            </div>
                            <div class="portfolio-description">
                                <a href="portfolio-page-grid-gallery.html">
                                    <h3>Indrajaya Gunawan</h3>
                                    <span>Vice Manager</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-item no-overlay img-zoom Executive  p-b-50">
                        <div class="portfolio-item-wrap">
                            <div class="portfolio-image">
                                <a href="#"><img src="<?php echo base_url();?>
assets/front-end/images/team/4.jpg" alt="" class="img-circle"></a>
                            </div>
                            <div class="portfolio-description">
                                <a href="portfolio-page-grid-gallery.html">
                                    <h3>Indrajaya Gunawan</h3>
                                    <span>Vice Manager</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-item no-overlay img-zoom Executive  p-b-50">
                        <div class="portfolio-item-wrap">
                            <div class="portfolio-image">
                                <a href="#"><img src="<?php echo base_url();?>
assets/front-end/images/team/1.jpg" alt="" class="img-circle"></a>
                            </div>
                            <div class="portfolio-description">
                                <a href="portfolio-page-grid-gallery.html">
                                    <h3>Indrajaya Gunawan</h3>
                                    <span>Vice Manager</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-item no-overlay img-zoom Trustees  p-b-50">
                        <div class="portfolio-item-wrap">
                            <div class="portfolio-image">
                                <a href="#"><img src="<?php echo base_url();?>
assets/front-end/images/team/2.jpg" alt="" class="img-circle"></a>
                            </div>
                            <div class="portfolio-description">
                                <a href="portfolio-page-grid-gallery.html">
                                    <h3>Indrajaya Gunawan</h3>
                                    <span>Vice Manager</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- end: portfolio item -->
                </div>
                <!-- end: Portfolio -->

            </div>
        </section>


                
    <?php echo $_smarty_tpl->getSubTemplate ('front-end/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    
	<?php }} ?>
