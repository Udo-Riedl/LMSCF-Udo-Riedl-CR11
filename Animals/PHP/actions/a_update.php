<?php
 ob_start();
 session_start();
 require_once '../dbconnect.php';

 //if session is not set this will redirect to login page
 if( !isset($_SESSION['admin' ]) ) {
  header("Location: login.php");
  exit;
 }

        if(isset($_POST['submit'])){
            $id = $_POST["id"];
            $img = $_POST["img"];
            $name = $_POST["name"];
            $type = $_POST["type"];
            $breed = $_POST["breed"];
            $age = $_POST["age"];
            $age_category = $_POST["age_category"];
            $size = $_POST["size"];
            $description = $_POST["description"];
            $hobbies = $_POST["hobbies"];
            $location = $_POST["location"];

        echo $id;
    
      //var_dump($size);
        $sql = "UPDATE animals SET img='$img', `name`='$name', `type`='$type', breed='$breed', age=$age, age_category='$age_category', `size`='$size', `description`='$description', hobbies='$hobbies', `location`='$location' WHERE animals_id={$id}";
        
       if(mysqli_query($conn , $sql)){
           echo "success <br> <a href='../admin.php'>Back to Home page</a>";
       }else {
           echo $conn ->error;
       }
    }else{
        echo "didnt submit";
    }
?>