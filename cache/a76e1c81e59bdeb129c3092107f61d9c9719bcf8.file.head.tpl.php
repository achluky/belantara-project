<?php /* Smarty version Smarty-3.1.21-dev, created on 2017-11-05 11:15:04
         compiled from "application/views/front-end/head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:119342192259fee4a868bc73-09400658%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a76e1c81e59bdeb129c3092107f61d9c9719bcf8' => 
    array (
      0 => 'application/views/front-end/head.tpl',
      1 => 1509858412,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '119342192259fee4a868bc73-09400658',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_59fee4a86baa03_16193411',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59fee4a86baa03_16193411')) {function content_59fee4a86baa03_16193411($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="INSPIRO" />
    <meta name="description" content="Themeforest Template Polo">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>
assets/front-end/fonts/flaticon.css">
    <!-- Document title -->
    <title>BELANTARA FOUNDATION</title>
    <!-- Stylesheets & Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,800,700,600|Montserrat:400,500,600,700|Raleway:100,300,600,700,800" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>
assets/front-end/css/plugins.css" rel="stylesheet">
    <link href="<?php echo base_url();?>
assets/front-end/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>
assets/front-end/css/responsive.css" rel="stylesheet"> 
</head>
<body class="">
    <div class="no-page-loader"></div>
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- Header -->
        <header id="header" class="header-transparent dark">
            <div id="header-wrap">
                <div class="container">
                    <!--Logo-->
                    <div id="logo">
                        <a href="index.html" class="logo" data-dark-logo="<?php echo base_url();?>
assets/front-end/images/logo-dark.png">
                            <img src="<?php echo base_url();?>
assets/front-end/images/logo.png" alt="Polo Logo">
                        </a>
                    </div>
                    <!--End: Logo-->
                    <!--Top Search Form-->
                    <div id="top-search">
                        <form action="search-results-page.html" method="get">
                            <input type="text" name="q" class="form-control" value="" placeholder="Start typing & press  &quot;Enter&quot;">
                        </form>
                    </div>
                    <!--end: Top Search Form-->
                    <!--Header Extras-->
                    <div class="header-extras" style=" line-height: 75px;">
                        <a href="<?php echo base_url();?>
lang/s/ID?url=<?php echo $_smarty_tpl->tpl_vars['data']->value['url'];?>
"><img src="<?php echo base_url();?>
assets/front-end/images/id.png"></a>
                        <a href="<?php echo base_url();?>
lang/s/EN?url=<?php echo $_smarty_tpl->tpl_vars['data']->value['url'];?>
"><img src="<?php echo base_url();?>
assets/front-end/images/gb.png"></a>
                    </div>
                    <!--end: Header Extras-->

                    <!--Navigation Resposnive Trigger-->
                    <div id="mainMenu-trigger">
                        <button class="lines-button x"> <span class="lines"></span> </button>
                    </div>
                    <!--end: Navigation Resposnive Trigger-->

                    <!--Navigation
                    <div id="mainMenu" class="light">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li class="dropdown"> <a href="#">About</a>
                                        <ul class="dropdown-menu">
                                            <li> <a href="aboutus.php">About Us</a> </li>
                                            <li> <a href="management.php">Our Management</a> </li>
                                            <li> <a href="boards.php">Our Boards</a> </li>
                                            <li><a href="ourprogram.php">Our Program</a></li>
                                            <li><a href="workingarea.php">Working Area</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href="#">Programs</a>
                                        <ul class="dropdown-menu">
                                            <li> <a href="ourapproach.php">Our Approach</a> </li>
                                            <li> <a href="advisory-committee.php">Advisory Committee</a> </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href="#">Projects</a></li>
                                    <li class="dropdown"> <a href="#">Grants</a></li>
                                    <li class="dropdown"> <a href="#">News</a>
                                        <ul class="dropdown-menu">
                                            <li> <a href="blog.php">Blog</a> </li>
                                            <li> <a href="anouncement.php">Anouncement</a> </li>
                                            <li> <a href="press.php">Press Release</a> </li>
                                            
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href="#">Resource</a></li>
                                    <li class="dropdown"> <a href="#">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>-->
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['site_lang']=='EN') {?>
                    <div id="mainMenu" class="light">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li><a href="<?php echo base_url();?>
">Home</a></li>
                                    <li class="dropdown"> <a href="#">About</a>
                                        <ul class="dropdown-menu">
                                            <li> <a href="<?php echo base_url();?>
about-us">About Us</a> </li>
                                            <li> <a href="<?php echo base_url();?>
management">Our Management</a> </li>
                                            <li> <a href="<?php echo base_url();?>
boards">Our Boards</a> </li>
                                            <li><a href="<?php echo base_url();?>
our-program">Our Program</a></li>
                                            <li><a href="<?php echo base_url();?>
grant-distribution-area">Grant Distribution Area</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href="#">Programs</a>
                                        <ul class="dropdown-menu">
                                            <li> <a href="<?php echo base_url();?>
our-approach">Our Approach</a> </li>
                                            <li> <a href="<?php echo base_url();?>
advisory-committee">Advisory Committee</a> </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href="#">Projects</a></li>
                                    <li class="dropdown"> <a href="#">Grants</a></li>
                                    <li class="dropdown"> <a href="#">Publication</a>
                                        <ul class="dropdown-menu">
                                            <li> <a href="<?php echo base_url();?>
blog">Blog</a> </li>
                                            <li> <a href="<?php echo base_url();?>
gallery">Gallery</a> </li>
                                            <li> <a href="<?php echo base_url();?>
related-news">Related News</a> </li>
                                            <li> <a href="<?php echo base_url();?>
press-release">Press Release</a> </li>
                                            <li> <a href="<?php echo base_url();?>
references">References</a> </li>
                                            <li> <a href="<?php echo base_url();?>
resources">Resources</a> </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href="<?php echo base_url();?>
contact-us">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    
                    <?php } else { ?>
                    <div id="mainMenu" class="light">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li><a href="<?php echo base_url();?>
">Beranda</a></li>
                                    <li class="dropdown"> <a href="#">Tentang</a>
                                        <ul class="dropdown-menu">
                                            <li> <a href="<?php echo base_url();?>
about-us">Tentang Kami</a> </li>
                                            <li> <a href="<?php echo base_url();?>
management">Manajemen Kami</a> </li>
                                            <li> <a href="<?php echo base_url();?>
boards">Our Boards</a> </li>
                                            <li><a href="<?php echo base_url();?>
our-program">Progream Kami</a></li>
                                            <li><a href="<?php echo base_url();?>
grant-distribution-area">Wilayah Distribusi Hibah</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href="#">Progam</a>
                                        <ul class="dropdown-menu">
                                            <li> <a href="<?php echo base_url();?>
our-approach">Pendekatan Kami</a> </li>
                                            <li> <a href="<?php echo base_url();?>
advisory-committee">Komite Penasihat</a> </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href="#">Proyek</a></li>
                                    <li class="dropdown"> <a href="#">Hibah</a></li>
                                    <li class="dropdown"> <a href="#">Publikasi</a>
                                        <ul class="dropdown-menu">
                                            <li> <a href="<?php echo base_url();?>
blog">Blog</a> </li>
                                            <li> <a href="<?php echo base_url();?>
gallery">Galeri</a> </li>
                                            <li> <a href="<?php echo base_url();?>
related-news">Berita Terkait</a> </li>
                                            <li> <a href="<?php echo base_url();?>
press-release">Press Release</a> </li>
                                            <li> <a href="<?php echo base_url();?>
references">Referensi</a> </li>
                                            <li> <a href="<?php echo base_url();?>
resources">Resources</a> </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href="<?php echo base_url();?>
contact-us">Kontak</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    
                    <?php }?>
                    <!--end: Navigation-->
                </div>
            </div>
        </header><?php }} ?>
