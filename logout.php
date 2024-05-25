<?php
session_start();

// Unset the session variable and redirect to the login page
unset($_SESSION['loggedin']);
header('Location: loginpage.php');
exit;
