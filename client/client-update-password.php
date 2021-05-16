<?php include("includes/client-header.php"); ?>

<div class="page-wrapper p-md-5">
<!--profile-submenu opening-->
<div class="profile-submenu">
    <div class="z-index text-center pt-4">
    <h2>Update Password</h2>
    <p>Home > Update Password</p>
</div>
<!--profile-submenu closing-->
<!--profile opening-->
<div class="profile mt-5">
    <h4>Update Password</h4>
    <?php 
    $error_message="";
  if(isset($_SESSION['user_id']))
  {
    $user_id=$_SESSION['user_id'];
  }

  if(isset($_POST['update_password']))
  {
    $new_password=$_POST['new-password'];
    $confirm_password=$_POST['confirm-password'];
    $new_password=mysqli_real_escape_string($connection,$new_password);
    $confirm_password=mysqli_real_escape_string($connection,$confirm_password);
    $hashformat="$2y$10$";
		$salt="iusesomecrazystrings22";
		$protect=$hashformat.$salt;
    if($new_password !== $confirm_password)
    {
      $error_message="Password donot match";
    }
    else
    {
      $new_password=crypt($new_password,$protect);
      $query="UPDATE tb_users SET user_password='$new_password' WHERE user_id='$user_id'";
      $result=mysqli_query($connection,$query);
      if(!$result)
      {
        die("query failed".mysqli_error($connection));
      }
      echo "<h5>Password Updated</h5>";
    }
  }

?>
    <form action="" class="mt-3" method="post">
         <div class="form-row">
            <div class="form-group col-md-6">
                <label for="new-password">New Password</label>
                <input type="password" class="form-control" id="new-password" name="new-password" placeholder="">
            </div>
         </div>

         <div class="form-row">
            <div class="form-group col-md-6">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="">
                <?php echo "<span style='color:red'>$error_message</span>" ?>
            </div>
         </div>
         
        <button type="submit" class="btn btn-primary" name='update_password'>Save Changes</button>
      </form>
      

</div>

<!--profile closing-->
</div>
</div>
</div>

<?php include('includes/client-footer.php'); ?>