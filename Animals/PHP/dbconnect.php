
<?php
    // this will avoid mysql_connect() deprecation error.
    error_reporting( ~E_DEPRECATED & ~E_NOTICE );

    $hostName= "localhost";
    $userName= "root";
    $password= "";
    $dbName= "cr_11_udo_riedl_petadoption"; //changed

    $conn = mysqli_connect($hostName, $userName, $password, $dbName);
    if(!$conn){
        echo "error";
    }
?>