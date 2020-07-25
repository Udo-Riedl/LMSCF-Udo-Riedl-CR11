<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['customer' ]) ) {
 header("Location: login.php");
 exit;
}
// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM customer WHERE customer_id=".$_SESSION['customer']);
$customerRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="Style/style.css">
    <link rel="shortcut icon" type="image/png" href="favicon/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
    <title>Welcome</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="small.php">Small Animals<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="large.php">Large Animals<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="senior.php">Our Seniors<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="logout.php?logout">Sign Out<span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

<h3>Hi <?php echo $customerRow['name']; ?></h3> 

<div class="home">

    <?php
        
        $sql = "SELECT * FROM animals ";

        $result = mysqli_query($conn, $sql);
        

        if($result->num_rows == 0 ){
            echo "No result";
        }elseif($result->num_rows == 1){
            $row = $result->fetch_assoc();
            echo $row["img"]. " " .$row["name"]. " " .$row["type"]. " " . $row["breed"]. " " .$row["age"]. " " .$row["age_category"]. " " .$row["size"]. " " .$row["description"]. " " .$row["hobbies"]. " " .$row["location"]." ";
        }else {
            $rows = $result->fetch_all(MYSQLI_ASSOC);
            foreach ($rows as $value) {
               echo $value["img"]. " " .$value["name"]. " " .$value["type"]. " " . $value["breed"]. " " .$value["age"]. " " .$value["age_category"]. " " .$value["size"]. " " .$value["description"]. " " .$value["hobbies"]. " " .$value["location"] ."<br>";
            }
        }
        $conn->close();
    ?>

</div>
</body>
</html>

<?php ob_end_flush(); ?>