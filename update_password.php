<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $new_password = $_POST['new_password'];

    // Validate token and update password in your database
    // Use password_hash() for secure password storage

    // Example query (use prepared statements to prevent SQL injection)
    // $stmt = $pdo->prepare("UPDATE users SET password = :password WHERE token = :token");
    // $stmt->execute(['password' => password_hash($new_password, PASSWORD_DEFAULT), 'token' => $token]);

    echo "Your password has been reset successfully.";
}
?>
