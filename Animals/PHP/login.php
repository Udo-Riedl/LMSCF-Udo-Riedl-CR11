<?php
ob_start();
session_start();
require_once "dbconnect.php";

// it will never let you open index(login) page if session is set
if ( isset($_SESSION['customer' ])!="" ) {
 header("Location: home.php");
 exit;
}

$error = false;

if( isset($_POST['btn-login']) ) {

  // prevent sql injections/ clear user invalid inputs
 $email = trim($_POST['customer_email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST[ 'customerPass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
 // prevent sql injections / clear user invalid inputs

 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if (empty($pass)){
  $error = true;
  $passError = "Please enter your password." ;
 }
 // if there's no error, continue to login
 if (!$error) {
  $password = hash( 'sha256', $pass); // password hashing

  $res=mysqli_query($conn, "SELECT * FROM customer WHERE customer_email='$email'" );
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  $count = mysqli_num_rows($res); // if uname/pass is correct it returns must be 1 row
 
  if( $count == 1 && $row['customerPass' ]==$password ) {
    if($row["role"] == 'admin'){
         $_SESSION["admin"] = $row["customer_id"];
        header("Location: admin.php");
        
  } else {
    $_SESSION['customer'] = $row['customer_id'];
    header("Location: home.php");
  }

  } else {
   $errMSG = "Incorrect Credentials, Try again..." ;
  }
 
 }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN & REGISTRATION</title>
    <link rel="stylesheet" href ="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"  crossorigin="anonymous">
    <link rel="stylesheet" href="Style/style.css">
    <link rel="shortcut icon" type="image/png" href="favicon/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
    <title></title>
</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete= "off">

<div class="form-group">  
 <h1>Sign In.</h1>

 <?php
if ( isset($errMSG) ) {
?>
           <div  class="alert alert-<?php echo $errTyp ?>" >
                         <?php echo  $errMSG; ?>
       </div>

<?php
}
?>

 <input  type="email" class="form-control" name="customer_email"  class="form-control" placeholder= "Your Email" value="<?php echo $email; ?>"  maxlength="40"/>

 <span class="text-danger"><?php  echo $emailError; ?></span>


 <input  type="password" class="form-control" name="customerPass"  class="form-control" placeholder ="Your Password" maxlength="15"/>

<span  class="text-danger"><?php  echo $passError; ?></span>
 <hr/>
 <button  type="submit" name= "btn-login">Sign In</button>
 <hr/>

 <h2><a href="register.php"><h2>Sign Up Here...</h2></a>

</div>
</form>
</div>
</div>
</body>
</html>
<?php ob_end_flush(); ?>
    