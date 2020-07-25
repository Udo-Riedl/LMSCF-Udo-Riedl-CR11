<?php

if( isset($_SESSION['customer' ])) {
   header("Location: home.php");
   exit;
  }

ob_start();
session_start(); // start a new session or continues the previous
if( isset($_SESSION['customer'])!="" ){
 header("Location: home.php" ); // redirects to home.php
}
include_once 'dbconnect.php';
$error = false;
if ( isset($_POST['btn-signup']) ) {
 
 // sanitize user input to prevent sql injection
 $name = trim($_POST['name']);

  //trim - strips whitespace (or other characters) from the beginning and end of a string
  $name = strip_tags($name);

  // strip_tags — strips HTML and PHP tags from a string

  $name = htmlspecialchars($name);
 // htmlspecialchars converts special characters to HTML entities
 $email = trim($_POST[ 'customer_email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['customerPass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);

  // basic name validation
 if (empty($name)) {
  $error = true ;
  $nameError = "Please enter your full name.";
 } else if (strlen($name) < 3) {
  $error = true;
  $nameError = "Name must have at least 3 characters.";
 } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
  $error = true ;
  $nameError = "Name must contain alphabets and space.";
 }

 //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address." ;
 } else {
  // checks whether the email exists or not
  $query = "SELECT customer_email FROM customer WHERE customer_email='$email'";
  $result = mysqli_query($conn, $query);
   /*var_dump($query);*/
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
  }
 }
 // password validation
  if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
 } else if(strlen($pass) < 6) {
  $error = true;
  $passError = "Password must have atleast 6 characters." ;
 }

 // password hashing for security
$password = hash('sha256' , $pass);


 // if there's no error, continue to signup
 if( !$error ) {
  
  $query = "INSERT INTO customer(`name`,customer_email,customerPass) VALUES('$name',
  '$email','$password')";
  $res = mysqli_query($conn, $query);
//   var_dump($query);
 
  if ($res) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($name);
    unset($email);
   unset($pass);
  } else  {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later..." ;
  }
 
 }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration System</title>
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="Style/style.css">
    <link rel="shortcut icon" type="image/png" href="favicon/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
</head>
<body>

<form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  autocomplete="off" >
 
     
 <h2>Sign Up.</h2>
 <hr />

 <?php
if ( isset($errMSG) ) {

?>
<div  class="alert alert-<?php echo $errTyp ?>" >
              <?php echo  $errMSG; ?>
</div>

<?php
}
?>



<div class="register">
 <input type="text" name="name" class ="form-control" placeholder="Enter Name" maxlength ="50" value = "<?php echo $name ?>"/>

    <span   class = "text-danger" > <?php   echo  $nameError; ?> </span >



 <input type= "email" name= "customer_email" class= "form-control" placeholder= "Enter Your Email" maxlength= "40" value = "<?php echo $email ?>"/>

    <span class="text-danger"> <?php echo $emailError; ?></span>





 <input type="password" name="customerPass" class="form-control" placeholder="Enter Password" maxlength="15"/>

    <span class="text-danger" ><?php echo $passError; ?></span >

 <hr />


 <button type= "submit" class="btn btn-block btn-primary"  name="btn-signup" >Sign Up</button>
 <hr/>

 <h2><a href="login.php">back to login...</a></h2>


</form >
</div>
    
</body>
</html>

<?php  ob_end_flush(); ?>