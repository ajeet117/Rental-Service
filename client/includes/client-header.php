<?php ob_start(); ?>
<?php session_start(); ?>
<?php include('../db.php'); ?>
<?php
if(!isset($_SESSION['user_id']))
{
  header("location:../login.php");
}
else
{
  $firstname=$_SESSION['firstname'];
  $lastname=$_SESSION['lastname'];
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sawari</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css?<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&family=Nunito:wght@300;400;700&family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css?<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js" ></script>
</head>
<body>
  <!--header opening-->
<header>
  <div class="navigation d-flex justify-content-between align-items-center bg-color px-lg-3">
      <div class="logo ml-3">
      <h1><a href="../index.php">Sawari</a></h1>
      </div>
        <nav class="mr-5">
        <ul class="navbar mr-auto mt-4">
            <li class="nav-item">
                <a class="nav-link active font-weight-bold" href="">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Model
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Honda</a>
                <a class="dropdown-item" href="#">Hero</a>
                <a class="dropdown-item" href="#">Ktm</a>
            </li>
            <li class="nav-item dropdown mr-lg-5">
              <a class="nav-link dropdown-toggle font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Type
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Scooter</a>
                <a class="dropdown-item" href="#">Off Road</a>
                <a class="dropdown-item" href="#">Sports</a>
            </li>
            <li class="nav-item">
               <img src="image/profile.png" alt="" class="profile-pic">
               <span class="ml-3 profile-name"><?php echo $firstname."  ".$lastname ?><i class="fa fa-angle-down ml-3" aria-hidden="true"></i>
              </span>
            </li>
            <div class="profile-menu p-3">
                <li class="nav-item m-2"><a href="profile.php">Profile Setting</a></li>
                <li class="nav-item m-2"><a href="client-update-password.php">Update Password</a></li>
                <li class="nav-item m-2"><a href="my-booking.php">My Bookings</a></li>
                <li class="nav-item m-2"><a href="client-logout.php">Logout</a></li>
            </div>
        </ul>
    </nav>
</div>
</header>
<!--header closing-->