<?php
session_start();
//error_reporting(E_ALL);
//include_once 'config.php';
include_once './includes/database.php';



if ($_SERVER["REQUEST_METHOD"] === "POST") {

    
    if ($_POST['action'] == 'verify_email_otp') {

    $email_otp = $_POST['eowr'];

    $isValidated = false;

    if (isset($email_otp) && isset($email_otp)) {


        $db_otp_array = getOTPAgainstEmailInDB($email_otp, $link);
        if(empty($db_otp_array)){
            die('invalid token or hack attempt!');
        }
//                    print_r($db_otp_array);die;
        $db_id = $db_otp_array['id'];
        $db_otp = $db_otp_array['sent_otp'];
        
        if ($db_otp == $email_otp) {
            
            $verified_time = date('Y-m-d H:i:s');
            // now update when the details are verified...
            $updateQuery = 'UPDATE `logintbl` SET ' . " "
                    . " `verifiedEmail` = '1' "
                    . " WHERE `id`= '$db_id'";
//echo $updateQuery;die;
            $exe = mysqli_query($link, $updateQuery);
            if ($exe) {
                $isValidated = true;
                $msg = "Email verified successfully!";
                header('location: '.SITE_URL.'/login.php?msg='.$msg.'&type=success');
                
            } else {
                $msg =  "ERROR: Some error occured while OTP Verification. "
                . mysqli_error($link);
                
                header('location: '.SITE_URL.'/login.php?msg='.$msg.'&type=warning');
            }
        }
        

        if (true === $isValidated) {

            // set cookie

            echo
            json_encode([
                'success' => true,
                'message' => 'OTP verified successfully!',
            ]);
        } else {

            echo
            json_encode([
                'success' => false,
                'message' => 'Invalid OTP provided!'
            ]);
        }
    }
}


    
        if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
            die("CSRF token validation failed");
        }
     


/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$mobile = $_POST['mobile'];
//var_dump($mobile);die;
$isValidUser = false;


if($_POST['action'] == 'login_attempt'){
//    print_r($_POST);
    $mobile = $_POST['mobile'];
//    $mobile = 'abc@gmail.com';
    $password = $_POST['password'];
//    $password = '1234@123';
    $checkUserLogin = checkAndAllowLogin($mobile, $password, $link);
//    print_r($checkUserLogin);
    if(!empty($checkUserLogin)){
        if(isset($checkUserLogin['status']) && $checkUserLogin['status']==false){
//            print_r($checkUserLogin);
            $msg = $checkUserLogin['user_msg'];
            header('location: '.SITE_URL.'/login.php?msg='.$msg.'&type=warning');
        }else{
            //  set session
            ini_set('session.use_only_cookies', 1); // Prevent session ID from being passed in URLs
            ini_set('session.cookie_httponly', 1); // Prevent JavaScript access to session cookie
            ini_set('session.cookie_secure', 1); // Only send the cookie over HTTPS (if your site uses SSL)
            ini_set('session.use_strict_mode', 1); // Prevent uninitialized session IDs

            $_SESSION['user_info']['devtoken']= $checkUserLogin['devtoken'];
            $_SESSION['user_info']['phone']= $checkUserLogin['phone'];
            $_SESSION['user_info']['email']= $checkUserLogin['email'];
            $_SESSION['user_info']['myname']= $checkUserLogin['myname'];
            $_SESSION['user_info']['profilepic']= $checkUserLogin['profilepic'];
            $_SESSION['loggedin'] = true;
            // Optionally regenerate session ID for security
            session_regenerate_id(true);

            // Redirect to my account page
            header("Location: myaccount.php");
            exit();
            
        }
    }
    die;
}

$is_valid_mob = validate_mobile($mobile);

//var_dump($is_valid_mob); die;

if(!$is_valid_mob){
    echo
            json_encode([
                'success' => false,
                'message' => 'Invalid mobile number. Kindly enter mobile number first without "0" only 10 digit allowed'
            ]);
}

if (isset($mobile) && $is_valid_mob && $_POST['action'] == 'check_user') {

    // condition to get OTP on mobile...

    $page_id = $_SERVER['HTTP_REFERER'];
    $last_visit = @base64_decode($_POST['last_visit']);

    // ========================================================
    // check if user is already validated or we need to validate by sending OTP...
    // ========================================================


    $check_user_sql = "SELECT id as unique_id, phone, fullName, email, verifiedMobile, verifiedEmail FROM `logintbl` WHERE `phone`='$mobile' ORDER BY `id` DESC LIMIT 1"; // `fullName`='$name' AND  removed name as it may be changed later
//$res = mysqli_query($link, $check_user_sql);
//var_dump($res);die;
    if ($res = mysqli_query($link, $check_user_sql)) {
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                // before sending response .. let us create a session of the user..
                
                echo
                json_encode([
                    'success' => true,
                    'user_details' => $row,
                    'message' => 'You are already a registered user!',
                ]);
//            echo json_encode($row);
            }
        } else {
            // Send OTP... 


            /**
             * */
            $page_id = $_SERVER['HTTP_REFERER'];
            $ip_address = get_client_ip();
            $user_agent = $_SERVER['HTTP_USER_AGENT'];
            $api_key = FAST2SMS_API_KEY;

            // ========================================================
            // curl to send OTP via POST method using API...
            // ========================================================



            $otp = rand(1111, 9999);

            /*             * *
             * 
              uncomment this to send SMS
             * 
             */

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2?authorization=" . $api_key . "&variables_values=" . $otp . "&route=otp&flash=1&numbers=" . urlencode($mobile),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "cache-control: no-cache"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
                
            curl_close($curl);
 
            // check if technical server error..
            $technical_failure_check = (str_contains($response, ":996"));
            if($technical_failure_check){
                echo json_encode(array('return' => false, 'message' => 'Some technical error. Please try again'));die;
            }

            if ($err) {
                $err = "cURL Error #:" . $err;
                } else {
//                  echo $response;
            }


//                $response = '{"return":true,"request_id":"up0i26z4hndv8ms","message":["SMS sent successfully."]}';
                if(empty($err)){$err = 'NULL';} // always enable this to handle database blank column
            ###############################################
            // save the OTP to verify in database...
            //            //INSERT INTO `pre_fast2sms_api_log` (`id`, `mobile`, `sent_otp`, `shop_id`, `ip_address`, `user_agent`, `api_response`, `error`, `created_at`) VALUES (NULL, '9999887788', '0987', '0', '0921029', 'ahello', '{\"return\":true,\"request_id\":\"up0i26z4hndv8ms\",\"message\":[\"SMS sent successfully.\"]}', NULL, current_timestamp());
            $insert_otp_query = 'INSERT INTO `fast2sms_api_log` ' . " "
                    . "(`id`, `mobile`, `sent_otp`, `page_id`, `ip_address`, `user_agent`, `api_response`, `error`, `created_at`) "
                    . "VALUES (NULL, '$mobile', '$otp', '$page_id', '$ip_address', '$user_agent', '$response', $err, now()) ";
//                echo $insert_otp_query;die;
            $exe = mysqli_query($link, $insert_otp_query);
            if ($exe) {

                $userId = mysqli_insert_id($link);
            } else {
                echo "ERROR: Some error occured while registering user. "
                . mysqli_error($link);
            }

            //            if (Db::getInstance()->execute($query) == false) {
            //                return false;
            //            }
            ################################################



            $obj_response = json_decode($response);
//                        print_r($obj_response);
            $otp_return = $obj_response->return;
            $otp_request_id = $obj_response->request_id;
            $otp_message = $obj_response->message;

            if ($otp_return == true && !empty($otp_request_id)) {
                $isSMSSent = true;
                $api_message = $otp_message[0];
            } else {
                $api_message = $otp_message[0];
                if (!empty($err)) {
                    $api_message .= $err;
                }
            }
//            print_r($api_message);
            echo json_encode(array('return' => $isSMSSent, 'message' => 'New User: '.$api_message));

            // ========================================================
            // curl to send OTP via POST method using API ends here...
            // ========================================================
        }
    }
}


if ($_POST['action'] == 'verify_mobile_otp') {

    $mobile_otp = $_POST['mobile_otp'];

    $isValidated = false;
    if (isset($mobile) && isset($mobile_otp)) {


        $db_otp_array = getOTPAgainstMobileInDB($mobile, $link);
//                    print_r($db_otp_array);die;
        $db_id = $db_otp_array['id'];
        $db_otp = $db_otp_array['sent_otp'];
        
        if ($db_otp == $mobile_otp) {
            $isValidated = true;
            $verified_time = date('Y-m-d H:i:s');
            // now update when the details are verified...
            $updateQuery = 'UPDATE `fast2sms_api_log` SET ' . " "
                    . " `is_verified` = '1' "
                    . " WHERE `id`= '$db_id'";

            $exe = mysqli_query($link, $updateQuery);
            if ($exe) {

                $bookingId = mysqli_insert_id($link);
            } else {
                echo "ERROR: Some error occured while OTP Verification. "
                . mysqli_error($link);
            }
        }
        

        if (true === $isValidated) {

            // set cookie

            echo
            json_encode([
                'success' => true,
                'message' => 'OTP verified successfully!',
            ]);
        } else {

            echo
            json_encode([
                'success' => false,
                'message' => 'Invalid OTP provided!'
            ]);
        }
    }
}



 }else{
     die('hack attempt!');
 }


 /**
  * Associated functions 
  * @param type $email
  * @param type $link
  * @return type
  */
 
function getOTPAgainstEmailInDB($email_otp, $link) {
    $query = "SELECT * FROM `logintbl` WHERE `activationCode` = '$email_otp' ORDER BY `id` DESC limit 1;";
    $returnOTP = array();
    if ($res = mysqli_query($link, $query)) {
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $returnOTP['id'] = $row['id'];
                $returnOTP['sent_otp'] = $row['activationCode'];
                $returnOTP['email'] = $row['email'];
            }
        }
    }
    return $returnOTP;
}

function checkAndAllowLogin($email_or_phone, $password, $link) {
//    $hashpassword = password_hash($password, PASSWORD_BCRYPT);
    $query = "SELECT * FROM `logintbl` WHERE `email` = '$email_or_phone' or `phone` = '$email_or_phone' ORDER BY `id` DESC limit 1;";
    $returnOTP = array();
    if ($res = mysqli_query($link, $query)) {
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                
                if($row['verifiedEmail']==0){
                    $returnOTP['user_msg'] = 'Your account is not verified. Please check your email for a verification link to activate your account.';
                    $returnOTP['status'] = false;
                }else{

                    $hashpassword = $row['password'];
                    if(password_verify($password, $hashpassword)){
                        $returnOTP['devtoken'] = base64_encode(base64_encode($row['id']));
                        $returnOTP['phone'] = $row['phone'];
                        $returnOTP['email'] = $row['email'];
                        $returnOTP['myname'] = $row['fullName'];
                        $returnOTP['profilepic'] = $row['photoURL'];
                    }else{
                        $returnOTP['user_msg'] = 'incorrect user or password';
                        $returnOTP['status'] = false;
                    }
                }
            }
        }else{
            $returnOTP['user_msg'] = 'No user exists. Kindly register';
            $returnOTP['status'] = false; 
        }
    }else{
        $returnOTP['user_msg'] = 'Not a registered user';
        $returnOTP['status'] = false;
    }

    return $returnOTP;
}

function getOTPAgainstMobileInDB($mobile, $link) {
    $query = 'SELECT fal.`id`, fal.`sent_otp` ' .
            'FROM `fast2sms_api_log` fal ' .
            'WHERE  fal.`mobile` = \'' . $mobile . '\''
            . ' ORDER BY fal.id DESC limit 1';
//        echo $query;die;

    if ($res = mysqli_query($link, $query)) {
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $returnOTP['id'] = $row['id'];
                $returnOTP['sent_otp'] = $row['sent_otp'];
            }
        }
    }


//        print_r($returnOTP);die;
    return $returnOTP;
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function validate_mobile($mobile)
{
    return preg_match('/^[0-9]{10}+$/', $mobile);
}

function validate_email($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}