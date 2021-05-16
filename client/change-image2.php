<?php include("includes/client-header.php"); ?>
<div class="page-wrapper p-5">
<!--profile-submenu opening-->
<div class="profile-submenu">
    <div class="z-index text-center pt-4">
    <h2>Your Profile</h2>
    <p>Home > Change User Image</p>
</div>
<!--profile-submenu closing-->
<!--profile opening-->
<div class="profile mt-5">
   <h4>Update User Image</h4>
 <?php  
 $error="";
 if(isset($_GET['user_id']))
   {
       $user_id=$_GET['user_id'];
       $query="SELECT user_image FROM tb_users WHERE user_id='$user_id'";
       $result=mysqli_query($connection,$query);
       if(!$result)
       {
           die("query failed" . mysqli_error($connection));
       }
       while($row=mysqli_fetch_assoc($result))
       {
           $user_image=$row['user_image'];
       }
   }
   if(isset($_POST['update']))
    {
    	$user_image=$_FILES["img2"]["name"];
        if(empty($user_image))
        {
            $error="File cannot be empty";
        }
        else
        {
    	    move_uploaded_file($_FILES["img2"]["tmp_name"],"image/".$_FILES["img1"]["name"]);
    	    $query="UPDATE tb_users SET user_image='$user_image' WHERE user_id='$user_id'";
    	    $result=mysqli_query($connection,$query);
    	    if(!$result)
    	    {
    	    	die("query failed". mysqli_error($connection));
    	    }
    	    else
    	    {
    	    	header("location:profile.php");
    	    }
        }
    }
   ?>
 
    <form action="" class="mt-3" method="post" enctype="multipart/form-data">
         <div class="form-row">
         <?php 
         if(!empty($user_image))
         { ?>
         <img src="image/<?php echo $user_image?>" alt="image" width="300px" height="300px">
         <?php } ?>
          <div class="form-group col-md-6">
          <p style="color:red"><?php echo $error ?></p>
              <label for="liscence-image"> Upload User Image</label><br>
              <input type="file"  id="liscence-image" name="img2">
          </div>
       </div>
        <button type="submit" class="btn btn-primary mt-3" name="update">Save Changes</button>
      </form>
</div>

<!--profile closing-->
</div>
</div>


<?php include('includes/client-footer.php'); ?>