<?php include("includes/client-header.php"); ?>
<div class="page-wrapper p-5">
<!--profile-submenu opening-->
<div class="profile-submenu">
    <div class="z-index text-center pt-4">
    <h2>Your Profile</h2>
    <p>Home > Profile</p>
</div>
<!--profile-submenu closing-->
<!--profile opening-->
<div class="profile mt-5">
    <?php 
    
    if(isset($_SESSION['user_id']))
    {
       $user_id=$_SESSION['user_id'];
       $query="SELECT * FROM tb_users WHERE user_id='$user_id'";
       $result=mysqli_query($connection,$query);
       if(!$result)
       {
           die('Query Failed' . mysqli_error($connection));
       }
       while($row=mysqli_fetch_assoc($result))
       {
           $firstname=$row['firstname'];
           $lastname=$row['lastname'];
           $email=$row['email'];
           $phone=$row['phone'];
           $liscence_no=$row['liscence_no'];  
           $liscence_image=$row['liscence_image'];
           $user_image=$row['user_image'];     
        }
    }
    ?>
   <h4>Update Profile</h4>
   <?php 
    if(isset($_POST['update_profile']))
    {
    
            $update_firstname=$_POST['firstname'];
            $update_lastname=$_POST['lastname'];
            $update_email=$_POST['email'];
            $update_phone=$_POST['phone'];
            $update_liscence_no=$_POST['liscence'];
            $update_query="UPDATE tb_users SET firstname='$update_firstname', lastname='$update_lastname', email='$update_email', phone='$update_phone', liscence_no='$update_liscence_no' WHERE user_id='$user_id'";
            $update_result=mysqli_query($connection,$update_query);
            if(!$update_result)
            {
                die("query failed" . mysqli_error($connection));
            }
            else
            {
                echo "<h6>Profile Updated</h6>";
                header("location:profile.php");
            }
    }
   ?>
    <form action="" class="mt-3" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $firstname ?>">
            </div>
            <div class="form-group offset-md-2 col-md-4 ">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $email ?>">
            </div>
        </div>
         <div class="form-row">
            <div class="form-group col-md-6">
                <label for="Phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone ?>">
            </div>
         </div>
         
         <div class="form-row">
            <div class="form-group col-md-6">
                <label for="liscence">Liscence No</label>
                <input type="text" class="form-control" id="liscence" name="liscence" value="<?php echo $liscence_no ?>">
            </div>
         </div>

         <div class="form-row">
          <div class="form-group col-md-6">
              <label for="liscence-image">Liscence Image</label><br>
             <?php if(!empty($liscence_image))
             { ?>
              <img src="image/<?php echo $liscence_image?>" alt="image" width="300px" height="300px">
              <?php } ?>
                <br>
                <a href="change-image1.php?user_id=<?php echo $user_id ?>" class="ml-5" style="text-decoration:underline">Change Liscence Image<a>
        
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
              <label for="user-image">User Image</label><br>
             <?php if(!empty($user_image))
             { ?>
              <img src="image/<?php echo $user_image?>" alt="image" width="300px" height="300px">
              <?php } ?>
                <br>
                <a href="change-image2.php?user_id=<?php echo $user_id ?>" class="ml-5" style="text-decoration:underline">Change Liscence Image<a>
        
          </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3" name="update_profile">Save Changes</button>
      </form>
      

</div>

<!--profile closing-->
</div>
</div>


<?php include('includes/client-footer.php'); ?>