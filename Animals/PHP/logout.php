<?php
ob_start();
session_start();
if (!isset($_SESSION['customer'])) {
 header( "Location: login.php");
} else if(isset($_SESSION[ 'customer'])!="") {
 header("Location: home.php");
}

if  (isset($_GET['logout'])) {
 unset($_SESSION['customer' ]);
 session_unset();
 session_destroy();
 header("Location: login.php");
 exit;
}
?>