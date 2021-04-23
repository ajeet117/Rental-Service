<?php include('include/header.php') ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Change Password
                        </h1>
                        <?php 
    $error_message="";
  if(isset($_SESSION['username']))
  {
    $username=$_SESSION['username'];
  }

  if(isset($_POST['update-password']))
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
      $query="UPDATE tb_admin SET admin_password='$new_password' WHERE username='$username'";
      $result=mysqli_query($connection,$query);
      if(!$result)
      {
        die("query failed".mysqli_error($connection));
      }
      else{
          
      echo "<h5>Password Updated</h5>";
      }
    }
  }

?>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Form fields</div>
                                    <div class="panel-body">
                                        <form method="post" class="form-horizontal" >
                                            
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">New Password</label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control" name="new-password" id="newpassword" required>
                                                </div>
                                            </div>
                                            <div class="hr-dashed"></div>

                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Confirm Password</label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control" name="confirm-password" id="confirmpassword" required>
                                                </div>
                                            </div>
                                            <div class="hr-dashed"></div>
                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-4">

                                                    <button class="btn btn-primary" name="update-password" type="submit">Save changes</button>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>
                        </div>
                    </div>
                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include('include/footer.php'); ?>