<?php

error_reporting(E_ALL);
include_once './includes/config.php';
include_once './includes/database.php';
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

        $mobile = $_POST['mobile'];
//var_dump($mobile);die;
        $isValidUser = false;
        if (isset($mobile)) {
            
            // condition to get OTP on mobile...
            

            
                $page_id = $_SERVER['HTTP_REFERER'];
                $last_visit = base64_decode($_POST['last_visit']);

                // ========================================================
                // check if user is already validated or we need to validate by sending OTP...
                // ========================================================


                $check_user_sql = "SELECT id as unique_id, phone, fullName, email, verifiedMobile, verifiedEmail FROM `logintbl` WHERE `phone`='$mobile' ORDER BY `id` DESC LIMIT 1"; // `fullName`='$name' AND  removed name as it may be changed later

//$res = mysqli_query($link, $check_user_sql);
//var_dump($res);die;
if ($res = mysqli_query($link, $check_user_sql)) {
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            echo
                            json_encode([
                                'success' => true,
                                'user_details' => $row,
                                'msg' => 'User already exists!',
                            ]);
//            echo json_encode($row);
        }
    } else {
        // Send OTP... 
        
        
          /**
                **/

//                $response = '{"return":true,"request_id":"up0i26z4hndv8ms","message":["SMS sent successfully."]}';

                if(empty($err)){$err = 'NULL';}

                ###############################################
                // save the OTP to verify in database...



    //            //INSERT INTO `pre_fast2sms_api_log` (`id`, `mobile`, `sent_otp`, `shop_id`, `ip_address`, `user_agent`, `api_response`, `error`, `created_at`) VALUES (NULL, '9999887788', '0987', '0', '0921029', 'ahello', '{\"return\":true,\"request_id\":\"up0i26z4hndv8ms\",\"message\":[\"SMS sent successfully.\"]}', NULL, current_timestamp());
                $insert_otp_query = 'INSERT INTO `fast2sms_api_log` '. " "
                        . "(`id`, `mobile`, `sent_otp`, `page_id`, `ip_address`, `user_agent`, `api_response`, `error`, `created_at`) "
                        . "VALUES (NULL, '$mobile', '$otp', '$page_id', '$ip_address', '$user_agent', '$response', $err, now()) " ;
//                echo $insert_otp_query;die;
                $exe = mysqli_query($link,$insert_otp_query);
                if($exe){

                    $userId = mysqli_insert_id($link);
                }else{
                    echo "ERROR: Some error occured while registering user. "
                                            .mysqli_error($link); 
                }
                
    //            if (Db::getInstance()->execute($query) == false) {
    //                return false;
    //            }


                ################################################



                $obj_response = json_decode($response);
    //            print_r($obj_response);
                $otp_return = $obj_response->return;
                $otp_request_id = $obj_response->request_id;
                $otp_message = $obj_response->message;

                if($otp_return == true && !empty($otp_request_id)){
                    $isSMSSent = true;
                    $api_message = $otp_message[0];
                }else{
                    $api_message = $otp_message[0];
                    if(!empty($err)){
                        $api_message .= $err;
                    }
                }

                echo json_encode(array('success'=>$isSMSSent,'message'=>$api_message));


                // ========================================================
                // curl to send OTP via POST method using API ends here...
                // ========================================================

            }
        
    }
    }

                


              
            
            if($_POST['action']=='verify_mobile_otp'){
                
                $mobile_otp = $_POST['mobile_otp'];

                $isValidated = false;
                if (isset($mobile) && isset($mobile_otp)) {


                    $db_otp_array = getOTPAgainstMobileInDB($mobile,$link);
//                    print_r($db_otp_array);die;
                    $db_id = $db_otp_array['id'];
                    $db_otp = $db_otp_array['sent_otp'];

                    if($db_otp == $mobile_otp){
                        $isValidated = true;
                        $verified_time = date('Y-m-d H:i:s');
                        // now update when the details are verified...
                        $updateQuery = 'UPDATE `fast2sms_api_log` SET '. " "
                            . " `is_verified` = '1' AND `verified_at` = '$verified_time'"
                                . " WHERE `id`= '$db_id'" ;

                        
                            $exe = mysqli_query($link,$updateQuery);
                        if($exe){

                            $bookingId = mysqli_insert_id($link);
                        }else{
                            echo "ERROR: Some error occured while OTP Verification. "
                                                    .mysqli_error($link); 
                        }
                        


                    }            


                    if (true === $isValidated) {

                        // set cookie

                        echo
                            json_encode([
                                'success' => true,
                                'message' => 'OTP verified successfully!',
                            ]);
                        
                    }else{

                        echo
                            json_encode([
                                'success' => false,
                                'message' => 'Invalid OTP provided!'
                        ]);
                    }
                }

            }
        
        
        
        
        function getOTPAgainstMobileInDB($mobile,$link)
    {
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
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}