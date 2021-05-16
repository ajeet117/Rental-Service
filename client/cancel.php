<?php ob_start(); ?>
<?php session_start(); ?>
<?php include('../db.php'); ?>
<?php 
 $booking_id=$_GET['bookingid'];
 $update_query="UPDATE tb_bookings SET payment='Canceled' WHERE booking_id='$booking_id'";
 $update_result=mysqli_query($connection,$update_query);
 if(!$update_result)
 {
     die("query failed" . mysqli_error($connection));
 }
 else
 {
     header("location:my-booking.php");
 }

?>