<?php include("includes/client-header.php"); ?>
<div class="page-wrapper p-5">
<!--profile-submenu opening-->
<div class="profile-submenu">
    <div class="z-index text-center pt-4">
    <h2>Your Profile</h2>
    <p>Home > My Booking</p>
</div>
<!--profile-submenu closing-->
<!--profile opening-->
<div class="profile mt-5">
<h4>My bookings</h4>
<div class="row">
<?php 

$user_id=$_SESSION['user_id'];
$query="SELECT tb_bookings.*,tb_vehicle.* FROM tb_bookings ";
 $query.="INNER JOIN tb_vehicle ON tb_vehicle.vehicle_id=tb_vehicle.vehicle_id WHERE tb_bookings.user_id='$user_id'";                                        
 $result=mysqli_query($connection,$query);
 if(!$result)
 {
     die("query Failed" . mysqli_error($connection));
 }                         
while($row=mysqli_fetch_assoc($result))
{
    $booking_id=$row['booking_id'];
    $vehicle_id=$row['vehicle_id'];
    $vehicle=$row['vehicle_title'];
    $from_date=$row['from_date'];
    $from_time=$row['from_time'];
    $to_date=$row['to_date'];
    $to_time=$row['to_time'];
    $hourly_price=$row['hourly_price']; 
    $payment=$row['payment'];
?>
    <div class="col-md-4 col-12 mt-3">
      <!--bike-card opening-->
      <div class="bike-card pb-3">
        <img src="../admin/img/vehicleimages/knowledges_base_bg.jpg" alt="" class="img-fluid">
        <hr>
        <div class="bike-details px-3">
          <div class="d-flex justify-content-between font-weight-bold">
          <h4><?php echo $vehicle ?></h4>
          <h4>NRs.<?php echo $hourly_price ?>/hr</h4>
        </div>
        <p>Booking Details</p>
        <ul>
          <li class="my-3">Pick up Date & Time:<?php echo $from_date .", " . $from_time ?></li>
          <li class="my-3">Return Date & Time:<?php echo $to_date .", " . $to_time ?></li>
        </ul>
        <div class="d-flex justify-content-end">
        <button class="btn btn-secondary">Cancel</button>
        <a href="change-booking.php?vehicleid=<?php echo $vehicle_id ?>&bookingid=<?php echo $booking_id ?>" style='text-decoration:none;'><button class="btn btn-primary ml-3">Change</button></a>
        </div>
        </div>
      </div>
      <!--bike card closing-->
    </div>
    <?php } ?>                                  

</div>

<!--profile closing-->
</div>
</div>


<?php include('includes/client-footer.php'); ?>