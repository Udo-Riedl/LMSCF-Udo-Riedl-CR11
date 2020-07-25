<?php
    require_once '../dbconnect.php';

    if($_POST){
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

        $sql = "INSERT INTO `animals` (`img`, `name`, `type`, `breed`, `age`, `age_category`, `size`, `description`, `hobbies`, `location`) VALUES ('$img','$name', '$type', '$breed', '$age', '$age_category', '$size', '$description', '$hobbies', '$location')";
        
        if($conn->query($sql) === TRUE) {
            echo "<p>New Record Successfully Created</p>";
            echo "<a href='../create.php'><button type='button'>Back</button></a>";
             echo "<a href='../admin.php'><button type='button'>Home</button></a>";
        } else  {
            echo "Error " . $sql . ' ' . $conn->connect_error;
        }
     
        $conn->close();
     }
?>