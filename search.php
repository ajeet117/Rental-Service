<?php include('includes/header.php'); ?>

<!--search-page opening-->
<div class="search-page">
    <div class="text-center pt-5 z-index">
        <h2 >Search Rentals</h2>
        
        <div class="d-flex justify-content-center ml-md-5 ml-3">
        <div class="d-flex flex-column justify-content-center">
        <div class="order-box d-flex align-items-center justify-content-center ml-4 border-yellow">
            <i class="fa fa-search yellow-color" aria-hidden="true"></i>
        </div>
        <p class="mt-3 yellow-color">Choose your bike</p>
        </div>
        <div class="line"></div>
        <div class="d-flex flex-column justify-content-center " style="margin-right:35px">
        <div class="order-box d-flex align-items-center justify-content-center ml-4">
            <i class="fa fa-pencil" aria-hidden="true"></i>
        </div>
        <p class="mt-3">Enter your Details</p>
        </div>
        
    </div>
</div>
<!--search-page closing-->


<!--search-result opening-->
<div class="search-result  p-3">
        <div class="d-flex justify-content-end my-3">
            <p class="m-3">Sort by:</p>
            <div class="form-group m-2">
                <select class="form-control" id="type">
                  <option value="low">By low Price</option>
                  <option value="high">By high price</option>
                </select>
              </div>
        </div>
    <div class="row">
    <?php 
    
$search=$_POST['search'];
$query="SELECT tb_vehicle.*,tb_brand.brand_name,tb_vehicle_type.vehicle_type FROM tb_vehicle ";
$query.="INNER JOIN tb_brand ON tb_brand.brand_id=tb_vehicle.brand_id ";
$query.="INNER JOIN tb_vehicle_type ON tb_vehicle_type.vehicle_type_id=tb_vehicle.vehicle_type_id WHERE tb_vehicle.vehicle_title LIKE '$search%' OR tb_brand.brand_name LIKE '$search%' OR tb_vehicle_type.vehicle_type LIKE '$search%'";
$result=mysqli_query($connection,$query);
$row_count=mysqli_num_rows($result);
if(!$result)
{
  die("query failed" . mysqli_error($connection));
}
if($row_count >0)
{
while($row=mysqli_fetch_assoc($result))
{
  $vehicle_id=$row['vehicle_id'];
  $vehicle_id=$row['vehicle_id'];
  $vehicle_title=$row['vehicle_title'];
  $vehicle_brand=$row['brand_name'];
  $hourly_price=$row['hourly_price'];
  $vehicle_type=$row['vehicle_type'];
  $vehicle_milage=$row['vehicle_milage'];
  $vehicle_engine=$row['vehicle_engine'];
  $vehicle_image=$row['vehicle_image1'];
 
  ?>
  
<div class="col-md-4 col-12 mt-3">
      <!--bike-card opening-->
      <div class="bike-card pb-3">
        <img src="admin/img/vehicleimages/<?php echo $vehicle_image ?>" alt="" class="img-fluid">
        <hr>
        <div class="bike-details px-3">
          <div class="d-flex justify-content-between font-weight-bold">
          <h4><?php echo $vehicle_title ?></h4>
          <h4>NRS <?php echo $hourly_price ?>/hr</h4>
        </div>
        <p>Details</p>
        <ul>
          <li class="my-3">Brand:<?php echo $vehicle_brand ?></li>
          <li class="my-3">Vehicle Type:<?php echo $vehicle_type ?></li>
          <li class="my-3">Engine:<?php echo $vehicle_engine ?></li>
          <li class="my-3">Milage:<?php echo $vehicle_milage ?></li>
        </ul>
        <div class="d-flex justify-content-end">
        <a href="userdetail.php?vehicleid=<?php echo $vehicle_id ?>" style='text-decoration:none;'><button class="btn btn-primary">More</button></a>
        </div>
        </div>
      </div>
      <!--bike card closing-->
    </div>
<?php
}
}
else
{?>
  <div class='col-md-12 text-center p-3'>
  <p> no result found </p>
  <div class="col-md-4 offset-md-4">
  <form action="search.php" method="post">
      <div class="form-group m-2">
        <label for="search" class="font-weight-bold">Search</label>
        <input type="text" name="search" id="search" class="form-control" placeholder="Enter name of a vehicle" required>
      </div>
      <hr>
      <div class="text-right">
        <button class="btn btn-primary">Search</button>
      </div>
    </form>
    </div>
  </div>

<?php 
}
?>
      
      

      
    </div>
  </div>


<!--search-result closing-->

<?php include('includes/footer.php'); ?>