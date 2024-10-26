<?php
include __DIR__.'/config.php';
include './includes/database.php';
include './includes/functions.php';

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Validate the email (add your own logic to check if it exists in the database)
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Generate a token for the reset link
        $token = bin2hex(random_bytes(50));
        
        // Save the token in the database against the email (you'll need to implement this)
//        if ($db_otp == $email_otp) {
            
            $token_generation = date('Y-m-d H:i:s');
            // now update when the details are verified...
            $updateQuery = 'UPDATE `logintbl` SET ' . " "
                    . " `reset_token` = '$token' "
                    . " WHERE `email`= '$email' limit 1";
//echo $updateQuery;die;
            $exe = mysqli_query($link, $updateQuery);
//        }

            $resetLink = SITE_URL."/reset_password.php?token=" . $token.'&account='. urlencode($email);

        // Mail setup
        $subject = "Password Reset Request";
        $message = "Click on this link to reset your password: " . $resetLink;
        $headers = "From: no-reply@yourdomain.com";
            
             // -----------------------------------------
            // 
                $customer_mail_subject = 'Empire Salon | Password Reset Request';

                           $custoomer_mail_message = '
                               <html>
                               <head>
                                 <title>Password Reset Request</title>
                               </head>
                               <body>
                                 <p><a href="' . SITE_URL . '" class="navbar-brand"><img class="main_logo" src="' . convertImgToBase64(SITE_URL . 'img/logo.png') . '" alt="' . SITE_TITLE . '"></a></p>
                                     <p>Dear Customer,</p>
                       </p>
                       <p>
                       <br>Click on this link to reset your password: <a href="' . $resetLink.'"> click here</a>.
                       </p>
                       <p>
                       If you did not initiate this reset password request, please ignore this email.
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
                           $mail->addAddress($email);
//                           $mail->AddCC(EMAIL, SITE_TITLE);
//                           $mail->AddCC(ADMIN_EMAIL, 'MB');
//                           $mail->AddCC(PARAS_EMAIL, 'The Royal');
                           $mail->Subject = $customer_mail_subject;
                           $mail->Body = $custoomer_mail_message;
                           $mail->msgHTML($custoomer_mail_message);
//                               $mail->SMTPDebug = 2;
                           $customer_mail_sent = $mail->send();
//                           echo $custoomer_mail_message;
//                           var_dump($customer_mail_sent);die;
                           if ($customer_mail_sent) {
                               // Transfer the value 'sent' to ajax function for showing success message.
                               http_response_code(200);
                               $msg= 'Reset link has been sent to your email.';
                               header('location: '.SITE_URL.'/forgot_password.php?msg='.$msg.'&type=success');
                           } else {
                               // Set a 500 (internal server error) response code.
                               http_response_code(500);
                               $msg= 'Oops! Something went wrong and we couldn\'t send your email.';
                               header('location: '.SITE_URL.'/forgot_password.php?msg='.$msg.'&type=warning');
                           }
         
               // 
               // -----------------------------------------

        } else {
            $msg = "Failed to send email ";
            header('location: '.SITE_URL.'/forgot_password.php?msg='.$msg.'&type=warning');
        }
        
        
        
        // Send email
    } else {
        $msg = "Invalid email.";
        header('location: '.SITE_URL.'/forgot_password.php?msg='.$msg.'&type=warning');
//        echo "Invalid email.";
    }

?>
