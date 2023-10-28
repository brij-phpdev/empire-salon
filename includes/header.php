<?php 
require_once( 'config.php' );
require_once( './couch-admin/cms.php' );
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
        
        <link rel="stylesheet" href="css/book.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

<!--        <div id='preloader' >
            <div class='loader' >
                <img src="img/loading.gif" width="80" alt="">
            </div>
        </div> Preloader -->

        <header id="header" class="header-section">
            <div class="container">
                <nav class="navbar ">
                    <a href="index.php" class="navbar-brand"><img class="main_logo" src="img/logo.png" alt="Empire Salon"></a>
                    <div class="d-flex menu-wrap align-items-center">
                       <div id="mainmenu" class="mainmenu">
                           <ul class="nav">
                               <li><a data-scroll class="nav-link active" href="index.php">Home</a>
<!--                                    <ul>
                                       <li><a href="index.php">Home Default</a></li>
                                       <li><a href="index-2.php">Home Modern</a></li>
                                       <li><a href="index-3.php">Home Classic</a></li>
                                    </ul>-->
                                </li>
                                <li><a href="about-us.php">About</a>
                                    <ul>
                                       <li><a href="jobs.php">Jobs</a></li>
                                       <li><a href="franchise.php">Franchise</a></li>
                                    </ul>
                                </li>
                                <li><a class="verifyOTP open-popup-link" href="#" data-link="<?php echo SHOP_URL ?>" target="_blank" >Shop</a></li>
                                <li><a href="services.php">Services</a>
                                </li>
                                <li><a href="#">Blog</a>
                                    <ul>
                                       <li><a href="blog-grid.php">Blog Grid</a></li>
                                    </ul>
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