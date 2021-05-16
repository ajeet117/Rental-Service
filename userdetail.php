<?php include('includes/header.php')?>
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
        <div class="line bg-yellow"></div>
        <div class="d-flex flex-column justify-content-center " style="margin-right:35px">
        <div class="order-box d-flex align-items-center justify-content-center ml-4 border-yellow">
            <i class="fa fa-pencil yellow-color" aria-hidden="true"></i>
        </div>
        <p class="mt-3 yellow-color">Enter your Details</p>
        </div>
    </div>
</div>
<!--search-page closing-->
 <?php 
if(isset($_GET['vehicleid']))
{
  $user_id=$_SESSION['user_id'];
  $firstname=$_SESSION['firstname'];
  $lastname=$_SESSION['lastname'];
  $email=$_SESSION['email'];
  $phone=$_SESSION['phone'];
  $vehicle_id=$_GET['vehicleid'];
  $query="SELECT tb_vehicle.*,tb_brand.brand_name,tb_vehicle_type.vehicle_type FROM tb_vehicle ";
  $query.="INNER JOIN tb_brand ON tb_brand.brand_id=tb_vehicle.brand_id ";
  $query.="INNER JOIN tb_vehicle_type ON tb_vehicle_type.vehicle_type_id=tb_vehicle.vehicle_type_id WHERE tb_vehicle.vehicle_id='$vehicle_id'";
  $result=mysqli_query($connection,$query);
  if(!$result)
  {
    die("query failed". mysqli_error($connection));
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
    $vehicle_image1=$row['vehicle_image1'];
    $vehicle_image2=$row['vehicle_image2'];
    $vehicle_image3=$row['vehicle_image3'];
  }
}

?> 
<!--Bike details opening-->
<div class="bike-detail container p-4 my-4">
  <div class="row">
    <div class="col-md-4 col-12 ">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="admin/img/vehicleimages/<?php echo $vehicle_image1 ?>" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="admin/img/vehicleimages/<?php echo $vehicle_image2 ?>" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="admin/img/vehicleimages/<?php echo $vehicle_image3 ?>" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </div>
    <div class="col-md-8 col-12">
      <h4><?php echo $vehicle_title ?></h4>
      <div class="row">
        <div class="col-md-6 col-6">
          <p class="mt-3"><span class="font-weight-bold">Description:</span>Built for maximum enjoyment both on and off the road, with an injection of extra power. With an electric starter, headlight, taillight, turn signals, mirrors. Colors: Black, Blue. Unlimited mileage and security lock included.</p>
          <p class="mt-3"><span class="font-weight-bold">Driver's licence category:</span>A (moto)</p>
          <p class="mt-3"><span class="font-weight-bold">Security deposit for vehicle (refundable):</span>500 NRS</p>
        </div>

        <div class="col-md-6 col-6" >
          <p class="mt-3"><span class="font-weight-bold">Terms and Conditions of the rental company:</span>We encourage people to ride motorbikes safely  as there are lots of pot-holes. These are decent motorbikes to ride  and have a wonderful safe trip. It is necessary to present an ID, leave deposit of 500 NRS, show us motorcycle license and proof of personal insurance. Please contact us for additional information. </p>
      </div>
    </div>
  </div>
</div>
    <div class="rent-price text-right">
      <div class="p-4">
      <h5 class="text-center">Rent Price</h5>
      <p class="text-center"><?php echo $hourly_price ?></p>
      All taxes and fees included. 
    </div>

    </div>
</div>
<!--Bike details closing-->

<!--User details opening-->
<div class="user-details container p-4 my-4">
  <h4>Information about your reservation:</h4>
  <div class="row">
    <div class="col-md-6 ">
    <?php 
    $error="";
if(isset($_POST['book']))
{
  $todaysdate=date("Y-m-d");
  $from_date=$_POST["pick-up"];
  $pick_up_hr=$_POST['pick-up-hr'];
  $pick_up_min=$_POST['pick-up-min'];
  $from_time=$pick_up_hr.":".$pick_up_min;
  $to_date=$_POST['return'];
  $return_hr=$_POST['return-hr'];
  $return_min=$_POST['return-min'];
  $to_time=$return_hr.":".$return_min;
  if($from_date > $todaysdate && $to_date > $todaysdate)
  {
  $insert_query="INSERT INTO tb_bookings(user_id,vehicle_id,from_date,from_time,to_date,to_time,payment) ";
  $insert_query.="VALUE('$user_id','$vehicle_id','$from_date','$from_time','$to_date','$to_time','Unconfirmed')";
  $insert_result=mysqli_query($connection,$insert_query);
  if(!$insert_result)
  {
    die("query failed" . mysqli_error($connection));
  }
  else{
    echo "<p> succesfully booked </p>";
  }
}
else
{
  $error="Please Select future date";
}
}
?>
      <form action="" class="mt-3" method="post">
        <div class="form-group m-2">
        <?php echo "<p style='color:red'>$error</p>"; ?>
        <label for="pickup" >Pick-up Date & time</label>
        <div class="d-flex">
        <input type="date" class="form-control" id="pick-up" name="pick-up" >
        <select class="time mx-1 form-control" name="pick-up-hr">
        <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
        </select>
        <select class="time mx-1 form-control" name="pick-up-min">
        <option value="00">00</option>
          <option value="15">15</option>
          <option value="30">30</option>
          <option value="45">45</option>
          <option value="60">60</option>
        </select>
        </div>
        </div>
        <div class="form-group m-2">
        <label for="return" >Return Date & Time</label>
        <div class="d-flex">
        <input type="date" class="form-control" id="return" name="return" >
        <select class="time mx-1 form-control" name="return-hr">
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
        </select>
        <select class="time mx-1 form-control " name="return-min">
          <option value="00">00</option>
          <option value="15">15</option>
          <option value="30">30</option>
          <option value="45">45</option>
          <option value="60">60</option>
        </select>
        </div>
        </div>
        <div class="form-group m-2">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" id="firstname" value="<?php echo $firstname ?>" readonly>
        </div>
        <div class="form-group m-2">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" id="lastname" value="<?php echo $lastname ?>" readonly>
        </div>
        <div class="form-group m-2">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" value="<?php echo $email ?>" readonly>
        </div>
        <div class="form-group m-2">
        <label for="Phone">Phone</label>
        <input type="text" class="form-control" id="phone" value="<?php echo $phone ?>" readonly> 
        </div>
        <div class="text-right mt-3">
        <button class="btn btn-primary " name="book" type="submit">Book Now</button>
        </div>
      </form>
    </div>
    <div class="col-md-4 offset-md-2">
      <h5>Cancellation terms:</h5>
      <p>Cancellation is possible at NO EXTRA COST up to 48 hours before the start of the rental period. The full price will be charged for late cancellation.
      </p>
     
    </div>
  </div>
</div>
<!--User details closing-->

<?php include("includes/footer.php") ?>
