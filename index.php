<?php include('includes/header.php')?>
<!--sub header starting-->
<div class="sub-header p-lg-5 p-4">
  <div class="row">
    <div class="col-lg-4 col-md-6 col-12 search-form p-3">
      <h2>Search for Rental</h2>
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
    <div class="col-lg-4 col-md-6 offset-lg-2 col-12 mt-3 mt-lg-0 special-offer">
      <h1>Check out our special offer</h1>
      <div class="text-right">
        <button class="btn btn-primary">Check Out</button>
      </div>
    </div>
  </div>

</div>
<!--sub header starting-->
<!--Recent bike starting-->
<div class="recent-bike p-lg-5 p-3 mt-5">
  <h2 class="font-weight-bold my-4">Recent Bike</h2>
  <div class="row">
  <?php 
                                    $query="SELECT tb_vehicle.*,tb_brand.brand_name,tb_vehicle_type.vehicle_type FROM tb_vehicle ";
                                    $query.="INNER JOIN tb_brand ON tb_brand.brand_id=tb_vehicle.brand_id ";
                                    $query.="INNER JOIN tb_vehicle_type ON tb_vehicle_type.vehicle_type_id=tb_vehicle.vehicle_type_id  ORDER BY tb_vehicle.vehicle_id DESC Limit 3";
                                    $result=mysqli_query($connection,$query);
                                    if(!$result)
                                    {
                                        die("Query failed" . mysqli_error($connection));
                                    }
                                    while($row=mysqli_fetch_assoc($result))
                                    {
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
                                   <?php  } ?>


    
    
    
  </div>
  <div class="text-center my-5">
    <button class="btn btn-primary">See More</button>
  </div>
</div>
<!--Recent bike starting-->

<?php include('includes/footer.php'); ?>