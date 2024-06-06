<?php
// Start the session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page with a success message
$redirect_url = 'login.php?logout_success=1';
header('Location: ' . $redirect_url);
exit;