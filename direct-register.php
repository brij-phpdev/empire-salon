<?php

@session_start();
include_once 'config.php';
include_once './includes/database.php';
include_once './includes/functions.php';

require_once './vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;

   $phone = $_POST['phone'];
    $email = filter_var(urldecode($_POST['email']), FILTER_SANITIZE_EMAIL);
    $name = $_POST['name'];
    $password = $_POST['phone'];

    // Generate OTP
    $otp = rand(100000, 999999);

    $password = password_hash($password, PASSWORD_BCRYPT);
    $date = date('Y-m-d H:i:s');
    
//    $userId = 143;
    $encryptedOtp = password_hash($otp, PASSWORD_BCRYPT);
    
    
    
    
    

    $insert_user_sql = "INSERT INTO `logintbl` (`id`,`fullName`,`email`,`password`,`verifiedEmail`,`verifiedMobile`,`image`,`photoURL`,"
                . "`role`,`phone`,`gender`,`bookingId`,`activated`,`activationCode`,`google`,`facebook`,`privacy`,`register_date`)  "
                . "VALUES (NULL,'$name','$email','$password',0,1,'','', "
                . "'0','$phone','','0','0','$encryptedOtp','0','0','0','$date') ";
//echo $insert_user_sql;die;
        $exe = mysqli_query($link, $insert_user_sql);
        if ($exe) {

            $userId = mysqli_insert_id($link);
            
             // -----------------------------------------
            // 
                $customer_mail_subject = 'Empire Salon | User Activation | ' . $name;

                           $custoomer_mail_message = '
                               <html>
                               <head>
                                 <title>User Registration</title>
                               </head>
                               <body>
                                 <p><a href="' . SITE_URL . '" class="navbar-brand"><img class="main_logo" src="' . convertImgToBase64(SITE_URL . 'img/logo.png') . '" alt="' . SITE_TITLE . '"></a></p>
                                     <p>Dear ' . ucfirst($name) . ',</p>
                                     <p>Thank you for registering with us! To complete your registration.
                       </p>
                       <p>
                       <br>Click <a href="'.SITE_URL.'verify-user.php?eowr='.$encryptedOtp.'&ri5ky='. base64_encode(base64_encode($otp)).'&t0ken='. base64_encode(base64_encode($date)).'">here</a> to verify.
                       </p>
                       <p>
                       If you did not initiate this registration, please ignore this email.
                       </p>
                       <br><br><br>
                       <i>Best Regards,</i>
                       <br/>      
                       Team Empire Salon
                       <br/>'. SITE_TITLE .'
                       <br/>'. SITE_URL .'
                               </body>
                               </html>
                               ';

                           $mail = new PHPMailer(); // Passing `true` enables exceptions

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
//                           $mail->AddCC(EMAIL, SITE_TITLE);
                           $mail->AddBCC(ADMIN_EMAIL, 'MB');
                           $mail->AddBCC(PARAS_EMAIL, 'The Royal');
                           $mail->Subject = $customer_mail_subject;
                           $mail->Body = $custoomer_mail_message;
                           $mail->msgHTML($custoomer_mail_message);
                       //        $mail->SMTPDebug = 2;
                           $customer_mail_sent = $mail->send();

                           if ($customer_mail_sent) {
                               // Transfer the value 'sent' to ajax function for showing success message.
                               http_response_code(200);
                               $msg= 'Registration successful! Please check your email to verify your account.';
                               header('location: '.SITE_URL.'/login.php?msg='.$msg.'&type=success');
                           } else {
                               // Set a 500 (internal server error) response code.
                               http_response_code(500);
                               $msg= 'Oops! Something went wrong and we couldn\'t send your message.';
                               header('location: '.SITE_URL.'/register.php?msg='.$msg.'&type=warning');
                           }

                           
               // 
               // -----------------------------------------

        }
