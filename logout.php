<?php
session_start();

// Destroy the session to log out
session_destroy();

// Redirect to the login page (index.html)
header("Location: index.html");
exit;
?>
