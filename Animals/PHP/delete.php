<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['admin' ]) ) {
 header("Location: login.php");
 exit;
}
    require_once 'dbconnect.php';
    if($_GET["id"]){
        $id = $_GET["id"];

        $sql = "DELETE FROM animals WHERE animals_id = $id";

        if(mysqli_query($conn, $sql)){
            echo "success <br> <a href='admin.php' >Back to home page</a>";
        }else{
            echo "error";
        }
    }
    $conn->close();
?>