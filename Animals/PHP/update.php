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

       $sql = "SELECT * FROM animals WHERE animals_id = $id";
       $result = mysqli_query($conn, $sql); 

       $row = $result->fetch_assoc();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="Style/style.css">
    <link rel="shortcut icon" type="image/png" href="favicon/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
</head>
<body>
    <div class="update">
    <form action="actions/a_update.php" method="post">
    <div class="form-group">
    
        <input type="hidden" name="id" value="<?php echo $row['bikes_id'] ?>">
        <input type="text" placeholder="IMG" name="img" value="<?php echo $row['img'] ?>">
        <input type="text" placeholder="Name" name="name" value="<?php echo $row['name'] ?>">
        <input type="text" placeholder="Type" name="type" value="<?php echo $row['type'] ?>">
        <input type="text" placeholder="Breed" name="breed" value="<?php echo $row['breed'] ?>">
        <input type="number" placeholder="Age" name="age" value="<?php echo $row['age'] ?>">
        <select class="form-control" input type="text" name="age_category" value="<?php echo $row['age_category'] ?>">
            <option>Young</option>
            <option>Adult</option>
            <option>Senior</option>
        <select class="form-control" input type="text" name="size" value="<?php echo $row['size'] ?>">
            <option>small</option>
            <option>medium</option>
            <option>large</option>
        <input type="text" placeholder="Description" name="description" value="<?php echo $row['description'] ?>">
        <input type="text" placeholder="Hobbies" name="hobbies" value="<?php echo $row['hobbies'] ?>">
        <input type="text" placeholder="Location"name="location" value="<?php echo $row['location'] ?>">
        <input type="submit" name='submit'>
    </div>
    </form>
    </div>
    
</body>
</html>