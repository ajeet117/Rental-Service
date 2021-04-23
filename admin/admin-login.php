<?php ob_start(); ?>
<?php session_start(); ?> 
<?php include("../db.php");?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Sawari | Admin Login</title>
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/admin.css">
</head>

<body>

	<div class="login-page">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light mt-4x">ADMIN LOGIN</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<?php 
								$message="";
								$error="";
								if(isset($_POST['login']))
								{
									$db_username='';
									$db_password="";
									$username=$_POST['username'];
									$password=$_POST['password'];
									$username=mysqli_real_escape_string($connection,$username);
									$password=mysqli_real_escape_string($connection,$password);
									$query="SELECT * FROM tb_admin WHERE username='$username'";
									$result=mysqli_query($connection,$query);
									if(!$result)
									{
										die("query failed" . mysqli_error($connection));
									}
									while($row=mysqli_fetch_assoc($result))
									{
										$db_username=$row['username'];
										$db_password=$row['admin_password'];
									}
									if(empty($username) && empty($password))
									{
										$message="<p style='color:red;'>Please fill this field</p>";
									}
									else
									{
										$password=crypt($password,$db_password);
		 								if($db_username == $username && $db_password == $password)
										 {
											 $_SESSION['username']=$username;
											 header("location:index.php");
										 }
										 else
										{
											$error="<p style='color:red;'>Username or Password donot match</p>";
										}
									}
								}
								?>
								<form method="post">
									<?php echo $error ?>
									<label for="" class="text-uppercase text-sm">Your Username </label>
									<input type="text" placeholder="Username" name="username" class="form-control mb">
									<?php echo $message ?>
									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb">
									<?php echo $message ?>
									<button class="btn btn-primary btn-block" name="login" type="submit">LOGIN</button>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	

</body>

</html>
