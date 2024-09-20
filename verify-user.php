<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
</head>
<body>
    <form id="otpForm" action="checkUser.php" method="POST">
    <input type="hidden" name="eowr" id="eowr" value="<?php echo ($_GET['eowr']); ?>">
    <input type="hidden" name="ri$ky" id="ri5ky" value="<?php echo ($_GET['ri$ky']); ?>">
    <input type="hidden" name="t0ken" id="t0ken" value="<?php echo $_GET['t0ken']; ?>">
    <input type="hidden" name="action" id="action" value="verify_email_otp">
</form>
?>
<script>
    // Automatically submit the form
    window.onload = function() {
        document.getElementById('otpForm').submit();
    };
</script>

</body>
</html>
