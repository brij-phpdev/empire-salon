<?php
function sendSMS($phone, $otp) {
    $apiKey = 'YOUR_FASTSMS_API_KEY';
    $message = "Your OTP for password reset is: " . $otp;
    $url = "https://www.fastsms.com/api/v1/send?apikey=$apiKey&to=$phone&message=" . urlencode($message);

    $response = file_get_contents($url);
    return $response;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];

    // Validate the phone number (add your own logic to check if it exists in the database)
    if (preg_match('/^[0-9]{10}$/', $phone)) {
        $otp = rand(100000, 999999);
        // Save the OTP in the session or database for later verification
        
        if (sendSMS($phone, $otp)) {
            echo "OTP has been sent to your phone.";
        } else {
            echo "Failed to send OTP.";
        }
    } else {
        echo "Invalid phone number.";
    }
}
?>
