<?php include("includes/client-header.php"); ?>
<div class="page-wrapper p-5">
<!--profile-submenu opening-->
<div class="profile-submenu">
    <div class="z-index text-center pt-4">
    <h2>Your Profile</h2>
    <p>Home > Change Liscene Image</p>
</div>
<!--profile-submenu closing-->
<!--profile opening-->
<div class="profile mt-5">
   <h4>Update Liscence Image</h4>
 <?php  
 if(isset($_GET['user_id']))
   {
       $user_id=$_GET['user_id'];
       $query="SELECT liscence_image FROM tb_users WHERE user_id='$user_id'";
       $result=mysqli_query($connection,$query);
       if(!$result)
       {
           die("query failed" . mysqli_error($connection));
       }
       while($row=mysqli_fetch_assoc($result))
       {
           $liscence_image=$row['liscence_image'];
       }
   }
   if(isset($_POST['update']))
    {
    	$liscence_image=$_FILES["img1"]["name"];
    	move_uploaded_file($_FILES["img1"]["tmp_name"],"image/".$_FILES["img1"]["name"]);
    	$query="UPDATE tb_users SET liscence_image='$liscence_image' WHERE user_id='$user_id'";
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
   ?>
 
    <form action="" class="mt-3" method="post" enctype="multipart/form-data">
         <div class="form-row">
         <div>
         <?php 
         if(!empty($liscence_image))
         {?>

         <img src="image/<?php echo $liscence_image?>" alt="image" width="300px" height="300px">
         <?php } ?>
          <div class="form-group col-md-6">
              <label for="liscence-image">Upload Liscence Image</label><br>
              <input type="file"  id="liscence-image" name="img1">
          </div>
          </div>
       </div>
        <button type="submit" class="btn btn-primary mt-3" name="update">Save Changes</button>
      </form>
</div>

<!--profile closing-->
</div>
</div>


<?php include('includes/client-footer.php'); ?>