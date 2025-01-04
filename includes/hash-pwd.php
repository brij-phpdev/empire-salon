<?php
// The plain password to be hashed
$password = 'Z{,W{-8I1F(V';

// Hash the password using bcrypt (the default algorithm in password_hash)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Output the hashed password (you can store this in your database)
echo $hashed_password;
?>
