<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
    // include file
    include 'config.php';
    include './includes/functions.php';
    include './includes/database.php';
    
    require './vendor/autoload.php';
    
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

    include_once('easebuzz-lib/easebuzz_payment_gateway.php');

    // salt for testing env
    $SALT = MERCHANT_SALT;

    /*
    * Get the API response and verify response is correct or not.
    *
    * params string $easebuzzObj - holds the object of Easebuzz class.
    * params array $_POST - holds the API response array.
    * params string $SALT - holds the merchant salt key.
    * params array $result - holds the API response array after valification of API response.
    *
    * ##Return values
    *
    * - return array $result - hoids API response after varification.
    * 
    * @params string $easebuzzObj - holds the object of Easebuzz class.
    * @params array $_POST - holds the API response array.
    * @params string $SALT - holds the merchant salt key.
    * @params array $result - holds the API response array after valification of API response.
    *
    * @return array $result - hoids API response after varification.
    *
    */
    
//    check Status
    
    $easebuzzObj = new Easebuzz($MERCHANT_KEY = null, $SALT, $ENV = null);
//    print_r($easebuzzObj);die;
    $result = $easebuzzObj->easebuzzResponse( $_POST );
 
    $responseArray = json_decode($result,true);
//    echo '<pre>';
//    print_r($responseArray);die;
    $transaction_status = $responseArray['data']['status'];
   
    
    if($transaction_status=='dropped'){
        // redirect back to the site with a message of failure transaction 
        
//        header('Location: book.php');
        header('location: thankyou.php?status=failed&type=warning&msg=Oops! Something went wrong and we couldn\'t send your message.#gallery');
    
    exit;
        
    }
    if($transaction_status=='failure'){
        // redirect back to the site with a message of failure transaction 
        
//        header('Location: book.php');
        
        header('location: thankyou.php?status=failed&type=warning&msg=Oops! Something went wrong and we couldn\'t send your message.#gallery');
    
    exit;
        
    }
    if($transaction_status=='userCancelled'){
        // redirect back to the site with a message of failure transaction 
        
//        header('Location: book.php');
        
        header('location: thankyou.php?status=failed&type=warning&msg=Transaction cancelled by user.#gallery');
    
    exit;
        
    }
    if($transaction_status=='success'){
        // now enter booking details into the booting table & send mail..
        
        
        
        
        $name = $responseArray['data']['firstname'];
        $email = $responseArray['data']['email'];
        $phone = $responseArray['data']['phone'];
        $productinfo = $responseArray['data']['productinfo'];
        $net_amount_debit = $responseArray['data']['net_amount_debit'];
        $serviceId = $responseArray['data']['udf1'];
        $transaction_msg = $responseArray['data']['error_Message'];
        if(empty($serviceId)){
            $serviceId = 1;
        }
//die('m here');
        // now update into booking table..
        $update_booking_sql = "UPDATE `bookingtbl` SET `serviceBill` = '$net_amount_debit' WHERE `bookingtbl`.`id` = $serviceId";

        $exe = mysqli_query($link, $update_booking_sql);
//var_dump($exe);die;
        if ($exe == 1) {

            $bookingId= $serviceId;
//            die;
////$package_info_title = 'Salon Package';
//$total_to_be_paid = '';
            // get booking details for customer offer..
            $select_booking_sql = "SELECT * FROM `bookingtbl` WHERE `id` = $bookingId ";

            if ($res = mysqli_query($link, $select_booking_sql)) {
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
//                        print_r($row);die;
                        $package_info_id = $row['serviceId'];
                        $date = $row['date'];
                        $timing = $row['timing'];
                        $adults = $row['adults'];
                        $childrens = $row['childrens'];
                    }
                    
                    // get package info... 
                    
                    $package_service_table_sql = "SELECT `servicetable`.* FROM `servicetable` WHERE `id`='".$package_info_id. "'  ORDER BY `id` DESC";
                    $package_info_title = 'Offer Package';
                    if ($res2 = mysqli_query($link, $package_service_table_sql)) {
                        if (mysqli_num_rows($res2) > 0) {
                            while ($row_ser = mysqli_fetch_assoc($res2)) {
//                                print_r($row_ser);die;
                                $package_info_title = $row_ser['title'];
                                $total_to_be_paid = $row_ser['member_price'];

                            }
                        }
                    }
                    
                    
                }
            }
            
 
            /* --------------------------------------------------------------
            
            // prepare & send SMS for booking confirmation..
            // 
            // 
            
                // Define the phone number and other details
//                $phone = '9012099666'; // Recipient's phone number

                // These values should be dynamically set based on user input or your data
//                $package = 'Premium Package';  // Example package name
//                $amount_paid = 499;            // Amount paid by the user (in INR, USD, etc.)
//                $date = date('Y-m-d');         // Current date
//                $time = date('H:i:s');         // Current time


                // Construct the message with the relevant details
                $msg = "Dear $name,%0A";
                $msg .= "Thank you for purchasing the $package_info_title.%0A";
                $msg .= "You have paid an amount of ₹".$responseArray['data']['net_amount_debit'].".%0A";
                $msg .= "Package Activation Date: $date%0A";
                $msg .= "Activation Time: $timing%0A";
                $msg .= "Thank you for choosing our service.%0A";
                $msg .= "We look forward to serving you!";
                
                sendBookingconfimationSMS($phone, $msg);
                
            // 
            // 
            // prepare & send SMS for booking confirmation ends here..
            --------------------------------------------------------------*/
            
            // let us generate the invoice & attach the same..
            $invoice_generate_link = SITE_URL.'includes/generateInvoice.php?orderId='.$bookingId;
            $current_directory = __DIR__; 
            $invoice_file_path = $current_directory . '/invoices/invoice-' . $bookingId . '.pdf';

            $ch = file_get_contents($invoice_generate_link);
            file_put_contents($invoice_file_path, $ch);
            
        //let us redirect to payment before sending mail...


//            mysqli_close($link);


            // customer email ...
            $customer_mail_subject = 'Empire Salon | Booking Confirmation | '. $date .' | '.$name;
//            echo $customer_mail_subject;die;
//echo 'm here';die;
            $custoomer_mail_message = '
                <html>
                <head>
                  <title>Order Booking</title>
                </head>
                <body>
                  <p><a href="'.SITE_URL.'" class="navbar-brand"><img class="main_logo" src="'.convertImgToBase64(SITE_URL.'img/logo.png').'" alt="'.SITE_TITLE.'"></a></p>
                      <p>Dear '.ucfirst($name).',</p>
                      <p>Congratulations on taking the first step towards a fresh and fabulous look! We are delighted to confirm that your Salon Service at <b>'.SITE_TITLE.' has been successfully booked</b> through our online platform.
        </p>
        <p><b>Booking Details:</b>
                  <table style="display: block;">
                    <tr>
                      <th>Name</th><td>'.$name.'</td>
                    </tr>
                    <tr>
                      <th>Date</th><td>'.$date.'</td>
                    </tr>
                    <tr>
                      <th>Time</th><td>'.$timing.'</td>
                    </tr>
                    <tr>
                      <th>Email</th><td>'.$email.'</td>
                    </tr>
                    <tr>
                      <th>Package</th><td>'.$package_info_title.'</td>
                    </tr>
                    
                    <tr>
                      <th>Net amount</th><td>₹ '.$responseArray['data']['net_amount_debit'].'</td>
                    </tr>
                    <tr>
                      <th>Total to be paid</th><td>₹ '.$total_to_be_paid.'</td>
                    </tr>
                    <tr>
                      <th>Transaction ID</th><td>'.$responseArray['data']['txnid'].'</td>
                    </tr>
                    <tr>
                      <th>Phone</th><td>'.$phone.'</td>
                    </tr>
                    <tr>
                      <th>No. of Adults</th><td>'.$adults.'</td>
                    </tr>

                  </table>

        <p>
        <b>What to Expect:</b><br/>
        At '.SITE_TITLE.', we are committed to providing a personalized and enjoyable experience. Here\'s a glimpse of what awaits you:
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
        If you have any specific requests or questions before your appointment, feel free to reach out to us at ' . EMAIL . ' or <a href="tel:'.PHONE.'" > ' . PHONE .' </a>  . We are here to make your experience seamless and enjoyable.
        <br>
        </p>
        <p>
        We are genuinely excited to welcome you to '.SITE_TITLE.' and to create a hairstyle that perfectly complements your personality.
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

//echo $custoomer_mail_message;die;

                  $mail = new PHPMailer();

                $mail->isSMTP();
                $mail->Host = EMAIL_HOST;
                $mail->SMTPSecure = 'tls';
                $mail->Port = EMAIL_PORT;
                $mail->SMTPAuth = true;
                $mail->Username = EMAIL_USERNAME;
                $mail->Password = EMAIL_PASSWORD;
                $mail->setFrom(EMAIL_USERNAME,SITE_TITLE);
                $mail->addReplyTo(EMAIL_USERNAME, SITE_TITLE);
                $mail->addAddress($email,$name);
                $mail->AddBCC(EMAIL, SITE_TITLE);
                $mail->AddBCC(ADMIN_EMAIL, 'MB');
                $mail->AddBCC(PARAS_EMAIL, 'The Royal');
                $mail->Subject = $customer_mail_subject;
                $mail->Body    = $custoomer_mail_message;
                $mail->msgHTML($custoomer_mail_message);
                // Check if the file was generated and exists before adding the attachment
                if (file_exists($invoice_file_path)) {
                    // Attach the generated file
                    $mail->addAttachment($invoice_file_path);
                }
        //        $mail->SMTPDebug = 2;
                $customer_mail_sent = $mail->send(); 


            if ($customer_mail_sent)
            {
                    // Transfer the value 'sent' to ajax function for showing success message.
//                http_response_code(200);
                header('location: thankyou.php?status=success&msg=Thank You! Your booking information has been sent to your email.#gallery');
//                    echo 'Thank You! Your booking information has been sent to your email.';
            }
            else
            {
                    // Set a 500 (internal server error) response code.
//                    http_response_code(500);
//                    echo 'Oops! Something went wrong and we couldn\'t send your message.';
                    header('location: thankyou.php?status=failed&type=warning&msg=Oops! Something went wrong and we couldn\'t send your message.#gallery');
            }

        } else {
            echo "ERROR: Some error occured while booking. "
            . mysqli_error($link);
        }
        if ($bookingId) {
            echo "An appointment is fixed";
            // send email to the user
        //        echo json_encode(['result'=>'success']);
            header('Location: thankyou.php?status=success&msg=Thank You! An appointment is fixed');
            die;
        }




        
        
        
    }
    die;
    
    
 function generatePassword($length = 8) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }
    return $result;
}

function sendBookingconfimationSMS($phone, $msg) {
    $apiKey = FAST2SMS_API_KEY;

//    $apiKey = 'KI80VaOYdrLA5Tm1ZyqucxW6ifsoXRNSD2CBPhtJpkw7Q9bGHFpLIyMKFiASc09DgbdH7wtoWOTU8keZ'; // Your Fast2SMS API key
    
    // API URL with necessary parameters
    $url = "https://www.fast2sms.com/dev/bulkV2?authorization=$apiKey&route=q&message=" . urlencode($msg) . "&flash=0&numbers=$phone&schedule_time=";

    // Send the request using file_get_contents
    $response = file_get_contents($url);

    return $response;
}

    
?>

