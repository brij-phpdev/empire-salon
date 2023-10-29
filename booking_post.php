<?php
error_reporting(E_ALL);
include_once './includes/config.php';
include_once './includes/database.php';

//print_r($_POST);
//die;

// lets check if user exists if not then create user first... to pick the id

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$serviceId = trim($_POST['serviceId']);
$other_services = implode(",",trim($_POST['other_services']));
$agentId = trim($_POST['agentId']);
$adults = trim($_POST['serviceAdult']);
$childrens = trim($_POST['serviceChildren']);
$date = date('m-d-Y',strtotime(trim($_POST['date'])));
$timing = trim($_POST['select_time']);
$serviceBill = '0';
$paymentStatus = '0';
$orderId = '';
$serviceStatus = '';
$upload_date = date('Y-m-d H:i:s');

//
//$name = 'client1';
//$email = 'client1@mail.com';
//$phone = '+923335754716';


$check_user_sql = "SELECT * FROM `logintbl` WHERE `fullName`='$name' AND `email`='$email' AND `phone`='$phone' ORDER BY `id` DESC";
//$res = mysqli_query($link, $check_user_sql);
//var_dump($res);die;
if ($res = mysqli_query($link, $check_user_sql)) {
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $userId = $row['id'];
            }
        }else{
    // insert 

    $userPwd = generatePassword();
    $userLoginPwd = md5($userPwd);
    $insert_user_sql = "INSERT INTO `logintbl` (`id`,`fullName`,`email`,`password`,`verifiedEmail`,`image`,`photoURL`,"
            . "`role`,`phone`,`gender`,`bookingId`,`activated`,`google`,`facebook`,`privacy`,`register_date`)  "
            . "VALUES (NULL,'$name','$email','$userLoginPwd',0,'','',"
            . "'0','$phone','','0','0','0','0','0','$upload_date') ";  
         
    $exe = mysqli_query($link,$insert_user_sql);
    if($exe){
    
        $userId = mysqli_insert_id($link);
    }else{
        echo "ERROR: Some error occured while registering user. "
                                .mysqli_error($link); 
    }
    
        }
}
mysqli_free_result($res); 


// now insert into booking table..
     $insert_booking_sql = "INSERT INTO `bookingtbl` "
             . "(`id`,`serviceId`,`agentId`,`adults`,`childrens`,`date`,`timing`,`serviceBill`,`paymentStatus`,"
             . "`orderId`,`serviceStatus`,`userId`,`upload_date`) "
             . " VALUES (NULL,'$serviceId','$agentId','$adults','$childrens','$date','$timing','$serviceBill','$paymentStatus',"
             . "'$orderId','$serviceStatus','$userId','$upload_date') "
             . " ";       
        
    $exe = mysqli_query($link,$insert_booking_sql);
    if($exe){
    
        $bookingId = mysqli_insert_id($link);
    }else{
        echo "ERROR: Some error occured while booking. "
                                .mysqli_error($link); 
    }
    if($bookingId){
        echo "An appointment is fixed";
//        echo json_encode(['result'=>'success']);
        die;
    }

     
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