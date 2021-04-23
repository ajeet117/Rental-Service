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
                                <div class="panel panel-default">
                                    <div class="panel-heading">Basic Info</div>

                                    <div class="panel-body">
                                    <?php 
  if(isset($_POST['submit']))
  {
      $vehicle_title=$_POST['vehicletitle'];
      $vehicle_brand=$_POST['brandname'];
      $vehicle_overview=$_POST['vehicaloverview'];
      $hourly_price=$_POST['priceperhour'];
      $vehicle_type=$_POST['vehicletype'];
      $vehicle_milage=$_POST['milage'];
      $vehicle_engine=$_POST['engine'];
      $vehicle_image1=$_FILES["img1"]["name"];
      $vehicle_image2=$_FILES["img2"]["name"];
      $vehicle_image3=$_FILES["img3"]["name"];
      move_uploaded_file($_FILES["img1"]["tmp_name"],"img/vehicleimages/".$_FILES["img1"]["name"]);
      move_uploaded_file($_FILES["img2"]["tmp_name"],"img/vehicleimages/".$_FILES["img2"]["name"]);
      move_uploaded_file($_FILES["img3"]["tmp_name"],"img/vehicleimages/".$_FILES["img3"]["name"]);

      $query="INSERT INTO tb_vehicle(vehicle_title,brand_id,vehicle_overview,hourly_price,vehicle_type_id,vehicle_milage,vehicle_engine,vehicle_image1,vehicle_image2,vehicle_image3) ";
      $query.= "VALUE('$vehicle_title','$vehicle_brand','$vehicle_overview','$hourly_price','$vehicle_type','$vehicle_milage','$vehicle_engine','$vehicle_image1','$vehicle_image2','$vehicle_image3')";
      $result=mysqli_query($connection,$query);
      if(!$result)
      {
          die("query failed". mysqli_error($connection));
      }  
      else{
          echo "<h4>Data Inserted</h4>";
      }
    }
  
  
  ?>   
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Vehicle Title<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="vehicletitle" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Select Brand<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker form-control" name="brandname" required>
<option value=""> Select </option>
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
    echo "<option value='$brand_id'>$brand_name</option>";
}
?>
</select>
</div>
</div>

<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Vehical Overview<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="vehicaloverview" rows="3" required></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Price Per Hour(in NRS)<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="priceperhour" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Select Vehicle Type<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker form-control" name="vehicletype" required>
<option value=""> Select </option>
<?php 
$type_query="Select * from tb_vehicle_type";
$type_result=mysqli_query($connection,$type_query);
if(!$brand_query)
{
    die("Query Failed" . mysqli_error($connection));
}
while($row=mysqli_fetch_assoc($type_result) )
{
    $vehicle_type_id=$row['vehicle_type_id'];
    $vehicle_type=$row['vehicle_type'];
    echo "<option value='$vehicle_type_id'>$vehicle_type</option>";
}
?>
</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Milage<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="milage" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Engine<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="engine" class="form-control" required>
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
Image 1 <span style="color:red">*</span><input type="file" name="img1" required>
</div>
<div class="col-sm-4">
Image 2<span style="color:red">*</span><input type="file" name="img2" required>
</div>
<div class="col-sm-4">
Image 3<span style="color:red">*</span><input type="file" name="img3" required>
</div>
</div>
<div class="form-group">
    <div class="col-sm-offset-10 col-sm-2">
        <button class="btn btn-primary" name="submit" type="submit">Post</button>
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