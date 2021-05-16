<?php session_start(); ?>
<?php include('db.php'); ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sawari</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&family=Nunito:wght@300;400;700&family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css?<?php echo time(); ?>">
	<script src="bootstrap/js/bootstrap.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
  <!--header opening-->
<header>
  <div class="navigation d-flex justify-content-between align-items-center bg-color px-lg-3">
      <div class="logo m-3">
        <h1>Sawari</h1>
      </div>
</div>
</header>
<!--header closing-->
<!--login-form opening-->
<div class="login-form p-3 my-4">
    <h2 class="text-center m-2">Login</h2>
    <?php 
	$message="";
	$error="";
	if(isset($_POST['submit']))
	{
		$db_email="";
		$db_password="";
		$email=$_POST['email'];
		$password=$_POST['password'];
		$email=mysqli_real_escape_string($connection,$email);
		$password=mysqli_real_escape_string($connection,$password);
		$query="SELECT * FROM tb_users WHERE email='$email' ";
		$result=mysqli_query($connection,$query);
		if(!$result)
		{
			die("query failed". mysqli_error($connection));
		}
		while($row=mysqli_fetch_assoc($result))
		{
			$db_user_id=$row['user_id'];
			$db_firstname=$row['firstname'];
      		$db_lastname=$row['lastname'];
			$db_password=$row['user_password'];
			$db_email=$row['email'];
      		$db_phone=$row['phone'];
			$db_liscence_no=$row['liscence_no'];
		}
		if(empty($username) && empty($password))
		{
			$message="<p style='color:red;'>Please fill this field</p>";
		}
		else
		{
		$password=crypt($password,$db_password);
		 if($db_email == $email && $db_password == $password)
		{
			$_SESSION['user_id']=$db_user_id;
			$_SESSION['firstname']=$db_firstname;
			$_SESSION['lastname']=$db_lastname;
			$_SESSION['email']=$db_email;
			$_SESSION['phone']=$db_phone;
			$_SESSION['liscence_no']=$db_liscence_no;
			header("location:index.php");
		}
		else
		{
			$error="<p style='color:red;'>Username or Password donot match</p>";
		}

		}
	}

	?>
    <form action="" method="post">
        <h2><?php echo $error ; ?> </h2>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
          <?php  echo $message ;?>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          <?php  echo $message ;?>
        </div>
        <button type="submit" class="btn btn-primary mt-3" name="submit">Login</button>
        <p class="text-center">Don't have an account? <span><a href="signup.php">Signup Here</a></span></p>
        <p class="text-center mt-3"><a href=""> Forgot password</a></p>
      </form>
</div>
<!--login closing-->
<!--footer opening-->
<footer class="p-5 text-center">
    <p>Copyright © 2018 Sawari</p>
</footer>
  <!--footer closing-->
  </body>
  </html>