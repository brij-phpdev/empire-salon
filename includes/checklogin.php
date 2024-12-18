<?php
//error_reporting(E_ALL);
//ini_set('display_errors',1);
//session_start(); // Start the session
include_once 'database.php';
// Define a constant to control link disabling

$package_links = [
        'book.php' => 'Book an Appointment',
        'bride-packages.php' => 'Explore Bridal Packages',
        'groom-packages.php' => 'Explore Groom Packages',
        'offer-packages.php' => 'Offers',
        'checkout.php' => 'Checkout',
        'myaccount.php' => 'My Account',
    ];
$GLOBALS['offer_links'] = $package_links;

// Check if the logout_success parameter is set
$logout_success = isset($_GET['logout_success']) && $_GET['logout_success'] == 1;

// Display the logout success message if the parameter is set
if ($logout_success) {
//    $msg = '<div class="alert alert-success">You have been successfully logged out.</div>';
    $msg = 'You have been successfully logged out.';
    header('location: '.SITE_URL.'/login.php?msg='.$msg.'&type=success');
    
}

// Common function to check if the user is logged in
function check_login() {
//    print_r($_SESSION);
    
//    die;
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {

        $basepath = basename($_SERVER['PHP_SELF']);
        define('DISABLE_LINKS', true);
        if(in_array($basepath, array_keys($GLOBALS['offer_links']))){
//            echo 'yes in the list & should be redirected to login..';die;
            header('Location: login.php');
            exit();
        }

    }else{
        
        define('DISABLE_LINKS', false);
        // excluding as already done....
//        $user_id = $_SESSION['user_id'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '141';
//        $link = $GLOBALS['link'];
//        var_dump($GLOBALS);
        // Fetch user information from the database
        
//        $user_info = get_user_info($user_id);
//        $_SESSION['user_info'] = $user_info;
//        print_r($_SESSION);die;
//        header('Location: myaccount.php');
//        exit();
    }
}

check_login();


function get_user_info($user_id) {
    $link = $GLOBALS['db_link'];
    
    $check_user_sql = "SELECT id as unique_id, phone, fullName, email, verifiedMobile, verifiedEmail FROM `logintbl` WHERE `id`='$user_id' ORDER BY `id` DESC LIMIT 1"; 
    $res = mysqli_query($link, $check_user_sql);
//var_dump($res);die;
    if ($res = mysqli_query($link, $check_user_sql)) {
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                return $row;

    //            echo json_encode($row);
                }
            } else {
                // no user found..
            }
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    print_r($_POST);die;
    // Example login check
    $username = $_POST['email'];
    $password = $_POST['password'];

    // In a real application, you should validate credentials against a database
    if ($username === 'admin' && $password === 'password') {
        $_SESSION['loggedin'] = true;
        //    print_r($package_links);die;
        // Get the logged-in user's ID
        $user_id = $_SESSION['user_id'] = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '141';
        
        

        header('Location: myaccount.php');
        exit();
    } else {
        $error = 'Invalid login credentials';
    }
}
?>

