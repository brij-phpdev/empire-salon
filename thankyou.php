<?php
// Determine transaction status
$status = isset($_GET['status']) ? $_GET['status'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .thankyou-container {
            text-align: center;
            padding: 50px 20px;
        }
        .success {
            color: #28a745;
        }
        .error {
            color: #dc3545;
        }
        .message {
            font-size: 18px;
            margin-top: 20px;
        }
        .default_btn {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
        }
        .default_btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="thankyou-container">
        <?php if ($status === 'success'): ?>
            <h1 class="success">Thank You for Your Booking!</h1>
            <p class="message">Your payment was successful. Please check your email for booking details and confirmation.</p>
        <?php elseif ($status === 'failed'): ?>
            <h1 class="error">Transaction Failed</h1>
            <p class="message">We encountered an issue with your payment. Please try again or contact our support team.</p>
        <?php else: ?>
            <h1 class="error">Invalid Request</h1>
            <p class="message">It seems you accessed this page incorrectly. Please return to the homepage.</p>
        <?php endif; ?>
        
        <a href="index.php" class="default_btn">Return to Homepage</a>
    </div>
</body>
</html>
