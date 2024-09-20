<?php
die;
error_reporting(E_ALL);
require 'vendor/autoload.php';
use PHPMailer;


include_once './includes/config.php';
include_once './includes/functions.php';


        // Update this to your desired email address.
        $name = 'Brij Raj Singh';
        $recipient = EMAIL_USERNAME;
        $email = $emailTo = ADMIN_EMAIL;
	$subject = "Message from $name";
        $$message = 'demo mail';

        // Email content.
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Subject: $subject\n\n";
        $email_content .= "Message: $message\n";
        
        
        // Message
        $mail_message = '
        <html>
        <head>
          <title>Contact Request Reminder</title>
        </head>
        <body>
          <p><a href="'.SITE_URL.'" class="navbar-brand"><img class="main_logo" src="'.convertImgToBase64(SITE_URL.'img/logo.png').'" alt="'.SITE_TITLE.'"></a></p>
          <table style="display: none;">
            <tr>
              <th>Case title</th><th>Category</th><th>Status</th><th>Due date</th>
            </tr>
            <tr>
              <td>Case 1</td><td>Development</td><td>pending</td><td>Dec-20</td>
            </tr>
            <tr>
              <td>Case 1</td><td>DevOps</td><td>pending</td><td>Dec-21</td>
            </tr>
          </table>
          <div>'.$email_content.'</div>
        </body>
        </html>
        ';

//        $headers = "MIME-Version: 1.1";
//        $headers .= "Content-type: text/html; charset=iso-8859-1";
//        $headers .= "From: " . $emailTo . "\r\n"; // Sender's E-mail
//        $headers .= "Return-Path:". $emailTo;
        // Email headers.
//        $email_headers = "From: $name <$email>\r\nReply-to: <$email>";

//       echo $mail_message;die; 

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = EMAIL_HOST;
$mail->SMTPSecure = 'tls';
$mail->Port = EMAIL_PORT;
$mail->SMTPAuth = true;
$mail->Username = EMAIL_USERNAME;
$mail->Password = EMAIL_PASSOWRD;
$mail->setFrom(EMAIL_USERNAME,SITE_TITLE);
$mail->addReplyTo(EMAIL_USERNAME, SITE_TITLE);
$mail->addAddress($emailTo, $name);
$mail->Subject = $subject;
$mail->Body    = $mail_message;
$mail->msgHTML($mail_message);
$mail->SMTPDebug = 2;
$mail_sent = $mail->send();
//print_r($mail);
//var_dump($mail_sent);die;
        
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
    echo 'The email message was sent!';
}
die;

        // Send the email.
        if ($mail_sent) {
            
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
        }

?>