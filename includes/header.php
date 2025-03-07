<?php 
session_start(); // Start the session
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Generate a CSRF token
}
require_once 'checklogin.php';
require_once( dirname((__DIR__)).'/config.php' );
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Empire Salon">
        <meta name="author" content="The Royals">

        <title>Empire Salon</title>

		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">

        <!-- Elegant Font Icons CSS -->
        <link rel="stylesheet" href="css/elegant-font-icons.css">
        <!-- Elegant Line Icons CSS -->
        <link rel="stylesheet" href="css/elegant-line-icons.css">
        <!-- Themify Icon CSS -->
        <link rel="stylesheet" href="css/themify-icons.css">
        <!-- Barber Icons CSS -->
        <link rel="stylesheet" href="css/barber-icons.css">
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- animate CSS -->
        <link rel="stylesheet" href="css/animate.min.css">
		<!-- Venobox CSS -->
        <link rel="stylesheet" href="css/venobox/venobox.css">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="css/nice-select.css">
		<!-- OWL-Carousel CSS -->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <!-- Slick Nav CSS -->
        <link rel="stylesheet" href="css/slicknav.min.css">
		<!-- Main CSS -->
        <link rel="stylesheet" href="css/main.css">
		<!-- Responsive CSS -->
        <link rel="stylesheet" href="css/responsive.css">
        
        <link rel="stylesheet" href="css/marquee.css">
        <!--<link rel="stylesheet" href="css/calendar.css">-->
        
        <link rel="stylesheet" href="css/book.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>

        <div id='preloader' class="d-none">
            <div class='loader' >
                <img src="img/logo.jpg" width="90" alt="Empire Salon">
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
                                <li><a class="" href="#">Packages</a>
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
                           <a href="checkout.php"><img src="img/shopping-icon.png" class="menu-btn img-responsive" style="padding:3px!important" title="shopping bag"></a>
                           <a href="myaccount.php"><img src="img/user-icon.png" class="menu-btn img-responsive" style="padding:3px!important" title="shopping bag"></a>
                           <?php
                           
                           if(DISABLE_LINKS && in_array('Offers', $package_links)):
                               // it means redirect to login
                               ?>
                           <a href="login.php" style="color: cornsilk;" class="menu-btn">Offers</a>
                           <?php
                               else:
                           ?>
                           <a href="offer-packages.php" class="menu-btn">Offers</a>
                           <?php
                           endif;
                           ?>
                       </div>
                    </div>
                </nav>
            </div>
		</header> <!--.header-section -->