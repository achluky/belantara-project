<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="INSPIRO" />
    <meta name="description" content="Themeforest Template Polo">
    <link rel="stylesheet" type="text/css" href="{base_url()}assets/front-end/fonts/flaticon.css">
    <!-- Document title -->
    <title>BELANTARA FOUNDATION</title>
    <!-- Stylesheets & Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,800,700,600|Montserrat:400,500,600,700|Raleway:100,300,600,700,800" rel="stylesheet" type="text/css" />
    <link href="{base_url()}assets/front-end/css/plugins.css" rel="stylesheet">
    <link href="{base_url()}assets/front-end/css/style.css" rel="stylesheet">
    <link href="{base_url()}assets/front-end/css/responsive.css" rel="stylesheet"> 
    <link href="{base_url()}assets/front-end/css/custom.css" rel="stylesheet"> 
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
                        <a href="index.html" class="logo" data-dark-logo="{base_url()}assets/front-end/images/logo-dark.png">
                            <img src="{base_url()}assets/front-end/images/logo.png" alt="Polo Logo">
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
                        <a href="{base_url()}lang/s/ID?url={$data.url}"><img src="{base_url()}assets/front-end/images/id.png"></a>
                        <a href="{base_url()}lang/s/EN?url={$data.url}"><img src="{base_url()}assets/front-end/images/gb.png"></a>
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
                    {if $data.site_lang eq 'EN' }
                    <div id="mainMenu" class="light">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li><a href="{base_url()}">Home</a></li>
                                    <li class="dropdown"> <a href="#">About</a>
                                        <ul class="dropdown-menu">
                                            <li> <a href="{base_url()}about-us">About Us</a> </li>
                                            <li> <a href="{base_url()}management">Our Management</a> </li>
                                            <li> <a href="{base_url()}boards">Our Boards</a> </li>
                                            <li><a href="{base_url()}our-program">Our Program</a></li>
                                            <li><a href="{base_url()}grant-distribution-area">Grant Distribution Area</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href="#">Programs</a>
                                        <ul class="dropdown-menu">
                                            <li> <a href="{base_url()}our-approach">Our Approach</a> </li>
                                            <li> <a href="{base_url()}advisory-committee">Advisory Committee</a> </li>
                                        </ul>
                                    </li>
                                    <li> <a href="{base_url()}project">Projects</a></li>
                                    <li class="dropdown"> <a href="#">Grants</a></li>
                                    <li class="dropdown"> <a href="#">Publication</a>
                                        <ul class="dropdown-menu">
                                            <li> <a href="{base_url()}blog">Blog</a> </li>
                                            <li> <a href="{base_url()}gallery">Gallery</a> </li>
                                            <li> <a href="{base_url()}related-news">Related News</a> </li>
                                            <li> <a href="{base_url()}press-release">Press Release</a> </li>
                                            <li> <a href="{base_url()}references">References</a> </li>
                                            <li> <a href="{base_url()}resources">Resources</a> </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href="{base_url()}contact-us">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    
                    {else }
                    <div id="mainMenu" class="light">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li><a href="{base_url()}">Beranda</a></li>
                                    <li class="dropdown"> <a href="#">Tentang</a>
                                        <ul class="dropdown-menu">
                                            <li> <a href="{base_url()}about-us">Tentang Kami</a> </li>
                                            <li> <a href="{base_url()}management">Manajemen Kami</a> </li>
                                            <li> <a href="{base_url()}boards">Our Boards</a> </li>
                                            <li><a href="{base_url()}our-program">Program Kami</a></li>
                                            <li><a href="{base_url()}grant-distribution-area">Wilayah Distribusi Hibah</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href="#">Progam</a>
                                        <ul class="dropdown-menu">
                                            <li> <a href="{base_url()}our-approach">Pendekatan Kami</a> </li>
                                            <li> <a href="{base_url()}advisory-committee">Komite Penasihat</a> </li>
                                        </ul>
                                    </li>
                                    <li > <a href="{base_url()}project">Proyek</a></li>
                                    <li class="dropdown"> <a href="#">Hibah</a></li>
                                    <li class="dropdown"> <a href="#">Publikasi</a>
                                        <ul class="dropdown-menu">
                                            <li> <a href="{base_url()}blog">Blog</a> </li>
                                            <li> <a href="{base_url()}gallery">Galeri</a> </li>
                                            <li> <a href="{base_url()}related-news">Berita Terkait</a> </li>
                                            <li> <a href="{base_url()}press-release">Press Release</a> </li>
                                            <li> <a href="{base_url()}references">Referensi</a> </li>
                                            <li> <a href="{base_url()}resources">Resources</a> </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"> <a href="{base_url()}contact-us">Kontak</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    
                    {/if}
                    <!--end: Navigation-->
                </div>
            </div>
        </header>