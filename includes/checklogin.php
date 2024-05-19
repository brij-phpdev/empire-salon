<?php
session_start(); // Start the session
include_once './database.php';
// Define a constant to control link disabling
define('DISABLE_LINKS', true);

$package_links = [
        'book.php' => 'Book an Appointment',
        'bride-packages.php' => 'Explore Bridal Packages',
        'groom-packages.php' => 'Explore Groom Packages',
        'offer-packages.php' => 'Offers',
        'checkout.php' => 'Checkout',
    ];
$GLOBALS['offer_links'] = $package_links;
// Common function to check if the user is logged in
function check_login() {
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {

        $basepath = basename($_SERVER['PHP_SELF']);
        
        if(in_array($basepath, array_keys($GLOBALS['offer_links']))){
//            echo 'yes in the list & should be redirected to login..';die;
            header('Location: login.php');
            exit();
        }

    }else{
        define('DISABLE_LINKS', false);
        
    }
}

check_login();

//    print_r($package_links);die;
?>
