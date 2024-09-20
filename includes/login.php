<?php

// Handle login
if (isset($_POST['login'])) {
    $login_input = $_POST['login_input'];
    $password = $_POST['password'];// Normal Password
    
    // Securing password using password_hash
//    $secure_pass = password_hash($password, PASSWORD_BCRYPT);

    $sql = "SELECT * FROM users WHERE (phone='$login_input' OR email='$login_input') AND password=PASSWORD('$password')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Login successful!";
    } else {
        echo "Invalid credentials.";
    }
}