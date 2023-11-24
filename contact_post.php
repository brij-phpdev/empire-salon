<?php
include_once './includes/config.php';
    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["name"]));
		$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $emailTo = $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);

        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! There was a problem with your submission. Please complete the form and try again.";
            exit;
        }

        // Update this to your desired email address.
        $recipient = ADMIN_EMAIL;
	$subject = "Message from $name";

        // Email content.
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Subject: $subject\n\n";
        $email_content .= "Message: $message\n";
        
        
        // Message
        $mail_message = '
        <html>
        <head>
          <title>Review Request Reminder</title>
        </head>
        <body>
          <p>Here are the cases requiring your review in December:</p>
          <table>
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

        $headers = "MIME-Version: 1.1";
        $headers .= "Content-type: text/html; charset=iso-8859-1";
        $headers .= "From: " . $emailTo . "\r\n"; // Sender's E-mail
        $headers .= "Return-Path:". $emailTo;
        // Email headers.
//        $email_headers = "From: $name <$email>\r\nReply-to: <$email>";

        // Send the email.
        if (mail($recipient, $subject, $mail_message, $headers)) {
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