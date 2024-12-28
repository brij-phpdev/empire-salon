<?php
include_once 'config.php';
function sendSMS($phone, $msg) {
    $apiKey = FAST2SMS_API_KEY;

//    $apiKey = 'KI80VaOYdrLA5Tm1ZyqucxW6ifsoXRNSD2CBPhtJpkw7Q9bGHFpLIyMKFiASc09DgbdH7wtoWOTU8keZ'; // Your Fast2SMS API key
    
    // API URL with necessary parameters
    $url = "https://www.fast2sms.com/dev/bulkV2?authorization=$apiKey&route=q&message=" . urlencode($msg) . "&flash=0&numbers=$phone&schedule_time=";

    // Send the request using file_get_contents
    $response = file_get_contents($url);

    return $response;
}

// Define the phone number and other details
$phone = '9012099666'; // Recipient's phone number

// These values should be dynamically set based on user input or your data
$package = 'Premium Package';  // Example package name
$amount_paid = 499;            // Amount paid by the user (in INR, USD, etc.)
$date = date('Y-m-d');         // Current date
$time = date('H:i:s');         // Current time
$name = 'John Doe';            // User's name (could be dynamically set)

// Construct the message with the relevant details
$msg = "Dear $name,%0A";
$msg .= "Thank you for purchasing the $package.%0A";
$msg .= "You have paid an amount of ₹$amount_paid.%0A";
$msg .= "Package Activation Date: $date%0A";
$msg .= "Activation Time: $time%0A";
$msg .= "Thank you for choosing our service.%0A";
$msg .= "We look forward to serving you!";

// Send the SMS with the generated message
$response = sendSMS($phone, $msg);

// Check the response and provide feedback
if ($response) {
    echo "SMS has been sent to $phone.";
} else {
    echo "Failed to send SMS.";
}
?>
