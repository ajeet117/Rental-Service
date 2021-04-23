<?php include('include/header.php'); ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Post A Vehicle
                        </h1>
                        <div class="row">
                            <div class="col-md-12">
                            <?php 
                            if(isset($_POST['update']))
                            {
                                $vehicle_id=$_GET['edit'];
                                $vehicle_title=$_POST['vehicletitle'];
                                $vehicle_brand=$_POST['brandname'];
                                $vehicle_overview=$_POST['vehicaloverview'];
                                $hourly_price=$_POST['priceperhour'];
                                $vehicle_type=$_POST['vehicletype'];
                                $vehicle_milage=$_POST['milage'];
                                $vehicle_engine=$_POST['engine'];
                                $update_query="UPDATE tb_vehicle SET vehicle_title='$vehicle_title' , brand_id='$vehicle_brand' , vehicle_overview='$vehicle_overview' , hourly_price='$hourly_price' , vehicle_type_id='$vehicle_type' , vehicle_milage='$vehicle_milage' , vehicle_engine='$vehicle_engine' WHERE vehicle_id='$vehicle_id'";
                                $update_result=mysqli_query($connection,$update_query);
                                if(!$update_result)
                                {
                                    die("Query Failed" . mysqli_error($connection));
                                }
                                else
                                {
                                    header("location:manage-vehicle.php");
                                }
                            }
                            
                            ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">Basic Info</div>

                                    <div class="panel-body">
                                    <?php 
                                    $edit_vehicle_brand="";
                                    $edit_vehicle_type="";
                                        if(isset($_GET['edit']))
                                        {
                                            $vehicle_id=$_GET['edit'];
                                            $edit_query="SELECT tb_vehicle.*,tb_brand.brand_name,tb_vehicle_type.vehicle_type FROM tb_vehicle ";
                                            $edit_query.="INNER JOIN tb_brand ON tb_brand.brand_id=tb_vehicle.brand_id ";
                                            $edit_query.="INNER JOIN tb_vehicle_type ON tb_vehicle_type.vehicle_type_id=tb_vehicle.vehicle_type_id WHERE vehicle_id='$vehicle_id'";
        
                                            $edit_result=mysqli_query($connection,$edit_query);
                                            if(!$edit_result)
                                            {
                                                die("Query failed" . mysqli_error($connection));
                                            }
                                            while($row=mysqli_fetch_assoc($edit_result))
                                            {
                                                
                                                $edit_vehicle_title=$row['vehicle_title'];
                                                $edit_vehicle_brand=$row['brand_name'];
                                                $edit_vehicle_overview=$row['vehicle_overview'];
                                                $edit_hourly_price=$row['hourly_price'];
                                                $edit_vehicle_type=$row['vehicle_type'];
                                                $edit_vehicle_milage=$row['vehicle_milage'];
                                                $edit_vehicle_engine=$row['vehicle_engine'];
                                                $edit_vehicle_image1=$row['vehicle_image1'];
                                                $edit_vehicle_image2=$row['vehicle_image2'];
                                                $edit_vehicle_image3=$row['vehicle_image3'];
                                            }
                                        }
  
  
                                    ?>   
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Vehicle Title<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="vehicletitle" class="form-control" value="<?php echo $edit_vehicle_title ?>" required>
</div>
<label class="col-sm-2 control-label">Select Brand<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker form-control" name="brandname" required>
<?php 
$brand_query="Select * from tb_brand";
$brand_result=mysqli_query($connection,$brand_query);
if(!$brand_query)
{
    die("Query Failed" . mysqli_error($connection));
}
while($row=mysqli_fetch_assoc($brand_result) )
{
    $brand_id=$row['brand_id'];
    $brand_name=$row['brand_name'];
    if($edit_vehicle_brand == $brand_name)
    {
        echo "<option value='$brand_id' selected>$brand_name</option>";
    }
    else
    {
    echo "<option value='$brand_id'>$brand_name</option>";
    }
}
?>
</select>
</div>
</div>

<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Vehical Overview<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="vehicaloverview" rows="3" required><?php echo $edit_vehicle_overview ?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Price Per Hour(in NRS)<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="priceperhour" class="form-control" value="<?php echo $edit_hourly_price ?>" required>
</div>
<label class="col-sm-2 control-label">Select Vehicle Type<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker form-control" name="vehicletype" required>
<?php 
$type_query="Select * from tb_vehicle_type";
$type_result=mysqli_query($connection,$type_query);
if(!$type_result)
{
    die("Query Failed" . mysqli_error($connection));
}
while($row=mysqli_fetch_assoc($type_result) )
{
    $vehicle_type_id=$row['vehicle_type_id'];
    $vehicle_type=$row['vehicle_type'];
    if($edit_vehicle_type == $vehicle_type)
    {
        echo "<option value='$vehicle_type_id' selected>$vehicle_type</option>";
    }
    else
    {
        echo "<option value='$vehicle_type_id'>$vehicle_type</option>";
    }
    }
?>
</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Milage<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="milage" class="form-control" value="<?php echo $edit_vehicle_milage?>" required>
</div>
<label class="col-sm-2 control-label">Engine<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="engine" class="form-control" value="<?php echo $edit_vehicle_engine ?>" required>
</div>
</div>
<div class="hr-dashed"></div>


<div class="form-group">
<div class="col-sm-12">
<h4><b>Upload Images</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image 1 <br>
<img src="img/vehicleimages/<?php echo $edit_vehicle_image1 ?>" alt="" class="img-fluid mt-2" width="200px" height="200px">
<br>
<a href="change-image1.php?imgid=<?php echo $vehicle_id?>">Change Image 1</a>
</div>
<div class="col-sm-4">
Image 2 <br>
<img src="img/vehicleimages/<?php echo $edit_vehicle_image2 ?>" alt="" class="img-fluid mt-2" width="200px" height="200px">
<br>
<a href="change-image2.php?imgid=<?php echo $vehicle_id?>">Change Image 2</a>
</div>
<div class="col-sm-4">
Image 3 <br>
<img src="img/vehicleimages/<?php echo $edit_vehicle_image3 ?>" alt="" class="img-fluid mt-2" width="200px" height="200px">
<br>
<a href="change-image3.php?imgid=<?php echo $vehicle_id?>">Change Image 3</a>
</div>
</div>
<div class="form-group">
    <div class="col-sm-offset-10 col-sm-2">
        <button class="btn btn-primary" name="update" type="submit">Update Changes</button>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
                </div>
              
                <!-- /.row-->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include('include/footer.php'); ?>