
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
<!--signup-form opening-->
<div class="signup-form p-3 mb-3">
    <h2 class="text-center m-2">Sign Up</h2>
    <?php 
		$message="";
		$error="";
    $phone_error="";
    $dup_user="";
		if(isset($_POST['submit']))
		{
			$firstname=$_POST['firstname'];
			$lastname=$_POST['lastname'];
      $email=$_POST['email'];
			$phone=$_POST['phone'];
			$password=$_POST['password'];
			$repassword=$_POST['repassword'];
			$firstname=mysqli_real_escape_string($connection,$firstname);
			$lastname=mysqli_real_escape_string($connection,$lastname);
      $email=mysqli_real_escape_string($connection,$email);
			$phone=mysqli_real_escape_string($connection,$phone);
			$password=mysqli_real_escape_string($connection,$password);
			$repassword=mysqli_real_escape_string($connection,$repassword);
			$hashformat="$2y$10$";
			$salt="iusesomecrazystrings22";
			$protect=$hashformat.$salt;
			

			
			 if($firstname !="" && $lastname !="" && $password !="" && $email !="" && $phone !="")
			 {
         $user_query="SELECT * FROM tb_users WHERE email='$email'";
         $user_result=mysqli_query($connection,$user_query);
         $row_count=mysqli_num_rows($user_result);
         if($row_count>0)
         {
           $dup_user="<p style='color:red;'>Email already Exist </p>";
         }
			  else if($password !== $repassword)
				{
					$message="<p style='color:red;'>Password donot Match</p>";
				}
        else if(!(strlen($phone)==10))
        {
          $phone_error="<p style='color:red;'>Phone must be of length 10</p>";
        }
				else
				{
					$password=crypt($password,$protect);
					$query="INSERT INTO tb_users(firstname,lastname,email,phone,user_password) ";
					$query.="VALUE('$firstname','$lastname','$email','$phone','$password')";
					$result=mysqli_query($connection,$query);
					if(!$result)
					{
						die("Query Failed" .mysqli_error($connection));
					}
					else 
					{	
						header("location:login.php");
					}
			 	}
			}
			else
			{
				$error="<p style='color:red;'>Please fill this field</p>";
			}
		}




		?>
    <form action="" class="mt-3" method="post">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="">
                <?php echo $error ?>
            </div>
            <div class="form-group offset-md-2 col-md-4 ">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="">
                <?php echo $error ?>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="">
                <?php echo $error ?>
                <?php echo $dup_user ?>
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-6">
                <label for="Phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="">
                <?php echo $error; echo $phone_error; ?>
                
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="">
                <?php echo $error ?>
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-6">
                <label for="repassword">Re-password</label>
                <input type="password" class="form-control" id="repassword" name="repassword" placeholder="">
                <?php echo $message ?>
            </div>
         </div>
        
        <button type="submit" class="btn btn-primary" name="submit">Sign up</button>
      </form>
      <p class="text-center">Already have an account?<span><a href="login.php"> Login here</a></span></p>
</div>
<!--signup closing-->
<!--footer opening-->
<footer class="p-5 text-center">
    <p>Copyright © 2018 Sawari</p>
  </footer>
  <!--footer closing-->
  </body>
  </html>