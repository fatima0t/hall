<?php
// Start the session
session_start();

// Destroy the session and all its data
session_destroy();

// Set the appropriate headers to prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Set a session variable to indicate successful logout
$_SESSION['logout_success'] = true;

// Redirect the user to the login page
header("Location: login.php");
exit();
?>