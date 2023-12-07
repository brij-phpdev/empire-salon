<?php
//error_reporting(E_ALL);

include_once './includes/config.php';
include_once './includes/functions.php';

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Get the form fields and remove whitespace.
        $name = sanitizeInput(trim($_POST["name"]));
//	$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $emailTo = $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = sanitizeInput($_POST["message"]);
//        var_dump($name);var_dump($emailTo);var_dump($message);die;

        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! There was a problem with your submission. Please complete the form and try again.";
            exit;
        }

        // Update this to your desired email address.
        $recipient = ADMIN_EMAIL;
	$subject = "Empire Salon | Contact request from $name " . date('d M Y');

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
          <table style="display: block;">
            <tr>
              <th>Name</th><td>'.$name.'</td>
            </tr>
            <tr>
              <th>Email</th><td>'.$email.'</td>
            </tr>
            <tr>
              <th>Subject</th><td>'.$subject.'</td>
            </tr>
            <tr>
              <th>Message</th><td>'.$message.'</td>
            </tr>
            
          </table>
<br/>          
Thanks!<br/>
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
        $mail->Password = EMAIL_PASSOWRD;
        $mail->setFrom(EMAIL_USERNAME,SITE_TITLE);
        $mail->addReplyTo(EMAIL_USERNAME, SITE_TITLE);
//        $mail->addAddress(EMAIL_USERNAME,SITE_TITLE);
        $mail->addAddress(EMAIL, SITE_TITLE);
        $mail->AddCC(ADMIN_EMAIL, 'The Royal');
        $mail->Subject = $subject;
        $mail->Body    = $mail_message;
        $mail->msgHTML($mail_message);
//        $mail->SMTPDebug = 2;
        $mail_sent = $mail->send();
        
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

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>