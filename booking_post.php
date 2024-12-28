<?php
@session_start();
//error_reporting(E_ALL);
//ini_set('display_errors',1);
include_once __DIR__.'/config.php';
include_once './includes/database.php';
include_once './includes/function.php';
//print_r($_POST);
//die;
// lets check if user exists if not then create user first... to pick the id

if (DEBUG == TRUE) {
    $name = 'Brij Raj Singh';
    $email = ADMIN_EMAIL;
    $phone = '7618565004';
    $couponId = 1;
    $packageName = 'RUBY BLISS';
    $amount = 'MjEwMDA='; // $_POST['rnId'];
//    $serviceIds = '143';
    $serviceId = '118';
    $other_services = 'a:1:{i:0;s:4:"MTE4";}';
    //$agentId = trim($_POST['agentId']);
    $agentId = 0;
    $adults = 2;
    $childrens = 0;
    $date = '12-10-2023';
    $timing = '11:00 AM';
    $message = 'do your best';
    $paymentStatus = '0';
    $orderId = '';
    $serviceStatus = '';
    $upload_date = date('Y-m-d H:i:s');
    $total_amount_to_be_paid = getServicesAndTotalAmount($other_services, $link, true);
    $serviceBill = $total_amount_to_be_paid;
//    echo 
    // sending to payment page
    header('Location: initiate_payment.php?firstname=' . $name . '&rnAmt=' . $amount . '&email=' . $email . '&phone=' . $phone . '&packageName=' . $packageName);

    exit;
} else {
    
    //validate if any service is selected..
    if(!empty($_SESSION['cart_item'])):
//        echo "<pre>";
//            print_r($_SESSION['cart_item']);
            
            // extract service ids
            $serviceIds = array_column($_SESSION['cart_item'], 'id');
//            print_r($serviceIds);

//        print_r($_POST);
//        echo "</pre>";
    elseif(isset($_POST['direct_serviceId'])):
        $serviceIds[0] = $_POST['direct_serviceId'];
    $adults = 1;
    $childrens = 0;
//    $amount = base64_encode(base64_encode(20));
    else:
        
        header('location: book.php?type=warning&msg=no service selected yet!');
    endif;
    

//die;
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $couponId = !empty($_POST['couponId']) ? base64_decode(trim($_POST['couponId'])) : '';
//    $serviceIds = $_POST['serviceId'];
//    $serviceId = base64_decode($serviceIds[0]);
    $serviceId = ($serviceIds[0]);
//    $other_services = serialize($_POST['serviceId']);
    $other_services = serialize($serviceIds);
    //$agentId = trim($_POST['agentId']);
    $agentId = 0;
    $adults = trim($_POST['serviceAdult']);
    $childrens = trim($_POST['serviceChildren']);
    $date = date('m-d-Y', strtotime(trim($_POST['date'])));
    $timing = isset($_POST['select_time']) ? trim($_POST['select_time']) : '10:00 AM' ;
    $message = !empty($_POST['message']) ? trim($_POST['message']) : '';
    
    $paymentStatus = '0';
    $orderId = '';
    $serviceStatus = '';
    $upload_date = date('Y-m-d H:i:s');
    $amount = $_POST['rnId'];
//    var_dump(base64_decode($amount));die;
//    echo "<pre>";
//    print_r($_POST);
//    echo "</pre>";
//    die;
//    print_r($serviceId);
//    print_r($serviceIds);
//    print_r($other_services);
    
    $total_amount_to_be_paid = getServicesAndTotalAmount($other_services, $link, true);
    $serviceBill = $total_amount_to_be_paid;
    $packageName = trim($_POST['packageName']);
//echo $total_amount_to_be_paid;die;
    //
}
//die('asdsad');
//
//$name = 'client1';
//$email = 'client1@mail.com';
//$phone = '+923335754716';


$check_user_sql = "SELECT * FROM `logintbl` WHERE `email`='$email' AND `phone`='$phone' ORDER BY `id` DESC"; // `fullName`='$name' AND  removed name as it may be changed later
$res = mysqli_query($link, $check_user_sql);
//echo $check_user_sql;echo "<br/>";var_dump($res);die;
if ($res = mysqli_query($link, $check_user_sql)) {
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $userId = $row['id'];
        }
//    } else {
//        // insert 
//
//        $userPwd = generatePassword();
//        $userLoginPwd = md5($userPwd);
//        $insert_user_sql = "INSERT INTO `logintbl` (`id`,`fullName`,`email`,`password`,`verifiedEmail`,`image`,`photoURL`,"
//                . "`role`,`phone`,`gender`,`bookingId`,`activated`,`google`,`facebook`,`privacy`,`register_date`)  "
//                . "VALUES (NULL,'$name','$email','$userLoginPwd',0,'','',"
//                . "'0','$phone','','0','0','0','0','0','$upload_date') ";
////echo $insert_user_sql;die;
//        $exe = mysqli_query($link, $insert_user_sql);
//        if ($exe) {
//
//            $userId = mysqli_insert_id($link);
//        } else {
//            echo "ERROR: Some error occured while registering user. "
//            . mysqli_error($link);
//        }
    }
}else{
    header('location: login.php?type=warning&msg=not a registered user');
    die;
}
//var_dump($userId);die;
mysqli_free_result($res);

// now insert into booking table..
$insert_booking_sql = "INSERT INTO `bookingtbl` "
        . "(`id`,`serviceId`,`other_services`,`agentId`,`adults`,`childrens`,`date`,`timing`,`message`,`serviceBill`,`booking_amount`,`paymentStatus`,"
        . "`orderId`,`serviceStatus`,`couponId`,`userId`,`upload_date`) "
        . " VALUES (NULL,'$serviceId','$other_services','$agentId','$adults','$childrens','$date','$timing','$message','$serviceBill','". base64_decode(base64_decode($amount))."','$paymentStatus',"
        . "'$orderId','$serviceStatus','$couponId','$userId','$upload_date') "
        . " ";
echo $insert_booking_sql;die;
$exe = mysqli_query($link, $insert_booking_sql);

if ($exe) {

    $bookingId = mysqli_insert_id($link);

//let us redirect to payment before sending mail...

    mysqli_close($link);
    // sending to payment page
    header('Location: initiate_payment.php?firstname=' . $name . '&rnAmt=' . $amount . '&email=' . $email . '&phone=' . $phone . '&packageName=' . $packageName . '&booking=' . $bookingId);
    die;

    // customer email ...
    $customer_mail_subject = 'Empire Salon | Booking Confirmation | ' . $date . ' | ' . $name;

    $custoomer_mail_message = '
        <html>
        <head>
          <title>Order Booking</title>
        </head>
        <body>
          <p><a href="' . SITE_URL . '" class="navbar-brand"><img class="main_logo" src="' . convertImgToBase64(SITE_URL . 'img/logo.png') . '" alt="' . SITE_TITLE . '"></a></p>
              <p>Dear ' . ucfirst($name) . ',</p>
              <p>Congratulations on taking the first step towards a fresh and fabulous look! We are delighted to confirm that your Hair Salon Service at ' . SITE_TITLE . ' has been successfully booked through our online platform.
</p>
<p><b>Booking Details:</b>
          <table style="display: block;">
            <tr>
              <th>Name</th><td>' . $name . '</td>
            </tr>
            <tr>
              <th>Date</th><td>' . $date . '</td>
            </tr>
            <tr>
              <th>Time</th><td>' . $timing . '</td>
            </tr>
            <tr>
              <th>Email</th><td>' . $email . '</td>
            </tr>
            <tr>
              <th>Phone</th><td>' . $phone . '</td>
            </tr>
            <tr>
              <th>No. of Adults</th><td>' . $adults . '</td>
            </tr>
            
          </table>
          
<p>
<b>What to Expect:</b><br/>
At ' . SITE_TITLE . ', we are committed to providing a personalized and enjoyable experience. Here\'s a glimpse of what awaits you:
</p>
<p>
1. <b>Expert Stylists:</b><br/>
   Our team of skilled stylists is dedicated to bringing your vision to life. Be ready to receive personalized attention and expert advice tailored to your unique style.
<br/>
2. <b>Relaxing Atmosphere:</b><br>
   Immerse yourself in a welcoming and stylish atmosphere designed for your comfort. Your visit is not just a haircut; it\'s a moment of self-care and rejuvenation.
<br>
3. <b>Quality Products:</b><br>
   We use premium hair care products to ensure your hair looks stunning and feels healthy after every visit.
<br>
<br>
<b>Next Steps:</b><br>
If you have any specific requests or questions before your appointment, feel free to reach out to us at ' . EMAIL . ' or <a href="tel:' . PHONE . '" > ' . PHONE . ' </a>  . We are here to make your experience seamless and enjoyable.
<br>
</p>
<p>
We are genuinely excited to welcome you to ' . SITE_TITLE . ' and to create a hairstyle that perfectly complements your personality.
</p>
<p>
Thank you for choosing us for your hair care needs. We can\'t wait to see the amazing transformation!
</p>
<br><br><br>
<i>Best Regards,</i>
<br/>      
Team Empire Salon
        </body>
        </html>
        ';

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = EMAIL_HOST;
    $mail->SMTPSecure = 'tls';
    $mail->Port = EMAIL_PORT;
    $mail->SMTPAuth = true;
    $mail->Username = EMAIL_USERNAME;
    $mail->Password = EMAIL_PASSWORD;
    $mail->setFrom(EMAIL_USERNAME, SITE_TITLE);
    $mail->addReplyTo(EMAIL_USERNAME, SITE_TITLE);
    $mail->addAddress($email, $name);
    $mail->AddCC(EMAIL, SITE_TITLE);
    $mail->AddCC(ADMIN_EMAIL, 'MB');
    $mail->AddCC(PARAS_EMAIL, 'The Royal');
    $mail->Subject = $customer_mail_subject;
    $mail->Body = $custoomer_mail_message;
    $mail->msgHTML($custoomer_mail_message);
//        $mail->SMTPDebug = 2;
    $customer_mail_sent = $mail->send();

    if ($customer_mail_sent) {
        // Transfer the value 'sent' to ajax function for showing success message.
        http_response_code(200);
        echo 'Thank You! Your booking information has been sent to your email.';
    } else {
        // Set a 500 (internal server error) response code.
        http_response_code(500);
        echo 'Oops! Something went wrong and we couldn\'t send your message.';
    }
} else {
    echo "ERROR: Some error occured while booking. "
    . mysqli_error($link);
}
if ($bookingId) {
    echo "An appointment is fixed";
    // send email to the user
//        echo json_encode(['result'=>'success']);
    die;
}

/**
 * 
 * @param type $length
 * @return type
 */

function generatePassword($length = 8) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }
    return $result;
}


?>