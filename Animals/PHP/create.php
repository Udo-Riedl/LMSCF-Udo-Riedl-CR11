<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['admin' ]) ) {
 header("Location: login.php");
 exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Create</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="Style/style.css">
    <link rel="shortcut icon" type="image/png" href="favicon/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="admin.php">Back to Admin Page <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

    <div class="create">
    <form action="actions/a_create.php" method="post"><br>
    <div class="form-group">
        <input type="hidden" class="form-control" name="id"><br>
        <input type="text" class="form-control" placeholder="IMG" name="img"><p>Please put in the img name (e.g. "pic1.jpg").</p><br>
        <input type="text" class="form-control" placeholder="Name" name="name"><p>Please put in the name of the animal.</p><br>
        <input type="text" class="form-control" placeholder="Type" name="type"><p>Please put in the type/species (e.g. "Horse, Dog, Dinosaur...").</p><br>
        <input type="text" class="form-control" placeholder="Breed" name="breed"><p>Please put in the breed (e.g. "Bulldog, Maine-Coon, T-REX...").</p><br>
        <input type="number" class="form-control" placeholder="Age" name="age"><p>Please put in the age of the animal.</p><br>
        <div class="col-md-6 mb-3">
        <select class="form-control" input type="text" class="form-control" name="age_category"><br>
        <option value="">--Age category--</option>
            <option>Young</option>
            <option>Adult</option>
            <option>Senior</option>
        </select><p>Please put in the age category of the animal (is the age 8+ please choose Senior).</p><br>
        <select class="form-control" input type="text" class="form-control" name="size"><br>
            <option value="">--Size category--</option>
            <option value="small">small</option>
            <option value="medium">medium</option>
            <option value="large">large</option>
        </select><p>Please put in the size of the animal.</p><br>
        </div>
        <input type="text" class="form-control" placeholder="Description" name="description"><p>Please put in a short description of the animal.</p><br>
        <input type="text" class="form-control" placeholder="Hobbies" name="hobbies"> <p>Please put in the hobbies of the animal.</p><br>
        <div class="col-md-6 mb-3">
        <select class="form-control" input type="text" class="form-control" name="location"><br>
            <option value="">--Vienna 1050 Kettenbrückengasse 23/2/12--</option>
        </select><p>All animals live in "cr_11_udo_riedl_petadoption - Center".</p><br>
        </div>
        <input class="btn btn-primary" type="submit" value="create">
    </div>
    </form>
    </div>
    
    
</body>
</html>