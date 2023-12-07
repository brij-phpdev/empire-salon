<?php 
require_once( 'config.php' );
require_once( 'functions.php' );
//require_once( './couch-admin/cms.php' );
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php echo SITE_TITLE ?>">
        <meta name="author" content="The Royals">

        <title><?php echo SITE_TITLE ?></title>

		<link rel="shortcut icon" type="image/x-icon" href="<?php echo SITE_URL ?>img/favicon.png">

        <!-- Elegant Font Icons CSS -->
        <link rel="stylesheet" href="<?php echo SITE_URL ?>css/elegant-font-icons.css">
        <!-- Elegant Line Icons CSS -->
        <link rel="stylesheet" href="<?php echo SITE_URL ?>css/elegant-line-icons.css">
        <!-- Themify Icon CSS -->
        <link rel="stylesheet" href="<?php echo SITE_URL ?>css/themify-icons.css">
        <!-- Barber Icons CSS -->
        <link rel="stylesheet" href="<?php echo SITE_URL ?>css/barber-icons.css">
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo SITE_URL ?>css/bootstrap.min.css">
        <!-- animate CSS -->
        <link rel="stylesheet" href="<?php echo SITE_URL ?>css/animate.min.css">
        <!-- Slick Nav CSS -->
        <link rel="stylesheet" href="<?php echo SITE_URL ?>css/slicknav.min.css">
		<!-- Main CSS -->
        <link rel="stylesheet" href="<?php echo SITE_URL ?>css/main.css">
		<!-- Responsive CSS -->
        <link rel="stylesheet" href="<?php echo SITE_URL ?>css/responsive.css">
        
        <link rel="stylesheet" href="<?php echo SITE_URL ?>css/marquee.css">
        
        <link rel="stylesheet" href="<?php echo SITE_URL ?>css/book.css">

        
    </head>
    <body>

        <div id='preloader' class="d-none">
            <div class='loader' >
                <img src="<?php echo SITE_URL ?>img/logo.jpg" width="90" alt="Empire Salon">
            </div>
        </div> 
        <!--        Preloader -->

        <header id="header" class="header-section">
            <div class="container">
                <nav class="navbar ">
                    <a href="index.php" class="navbar-brand"><img class="main_logo" src="img/logo.png" alt="Empire Salon"></a>
                    <div class="d-flex menu-wrap align-items-center">
                       <div id="mainmenu" class="mainmenu">
                           <ul class="nav">
                               <li><a data-scroll class="nav-link active" href="index.php">Home</a>
                                </li>
                                <li><a href="about-us.php">About</a>
                                </li>
                                <li><a href="<?php echo SHOP_URL ?>" target="_blank">Shop</a></li>
                                <!--<li><a data-scroll href="#header" class="verifyOTP open-popup-link" data-link="<?php echo SHOP_URL ?>" target="_blank" >Shop</a></li>-->
                                <li><a href="services.php">Services</a>
                                </li>
                                <!--<li><a href="makeover-gallery.php">Makeover</a></li>-->
                                <li><a href="#">Packages</a>
                                    <ul>
                                       <li><a href="bride-packages.php">Bride Packages</a></li>
                                       <li><a href="groom-packages.php">Groom Packages</a></li>
                                       <li><a href="book.php">Standard Packages</a></li>
                                    </ul>
                                </li>
                                <li><a href="franchise.php">Franchise</a></li>
                                <!--<li><a href="blog-grid.php">Blog</a>-->
                                </li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                       </div>
                       <div class="header-btn">
                           <a href="book.php" class="menu-btn">Make Appointment</a>
                       </div>
                    </div>
                </nav>
            </div>
		</header> <!--.header-section -->