<?php include('include/header.php') ?>

        <div id="page-wrapper">
<?php 
if(isset($_GET['change']))
{
    $booking_id=$_GET['change'];
    $update_query="UPDATE tb_bookings SET payment='Booked' WHERE booking_id='$booking_id'";
    $update_result=mysqli_query($connection,$update_query);
    if(!$update_result)
    {
        die("query failed" . mysqli_error($connection));
    }
    else
    {
        header("location:manage-booking.php");
    }
}
?>
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Manage Booking
                        </h1>
                        <div class="panel panel-default">
                            <div class="panel-heading">Booking Info</div>
                            <div class="panel-body">
                                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Vehicle</th>
                                            <th>From Date</th>
                                            <th>To Date</th>
                                            <th>Hourly Price</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Vehicle</th>
                                            <th>From Date</th>
                                            <th>To Date</th>
                                            <th>Hourly Price</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    
                                    <tbody>

                                        
                                        <?php
 $query="SELECT tb_bookings.*,tb_users.*,tb_vehicle.* FROM tb_bookings ";
 $query.="INNER JOIN tb_users ON tb_users.user_id=tb_bookings.user_id ";
 $query.="INNER JOIN tb_vehicle ON tb_vehicle.vehicle_id=tb_vehicle.vehicle_id";                                        
 $result=mysqli_query($connection,$query);
 if(!$result)
 {
     die("query Failed" . mysqli_error($connection));
 }                         
while($row=mysqli_fetch_assoc($result))
{
    $booking_id=$row['booking_id'];
    $firstname=$row['firstname'];
    $lastname=$row['lastname'];
    $name=$firstname ." ". $lastname;
    $email=$row['email'];
    $phone=$row['phone'];
    $vehicle=$row['vehicle_title'];
    $from_date=$row['from_date'];
    $from_time=$row['from_time'];
    $to_date=$row['to_date'];
    $to_time=$row['to_time'];
    $hourly_price=$row['hourly_price']; 
    $payment=$row['payment'];
    echo "<tr>";
    echo "<td>$booking_id</td>";
    echo "<td>$name</td>";
    echo "<td>$email</td>";
    echo "<td>$phone</td>";
    echo "<td>$vehicle</td>";
    echo "<td>$from_date,$from_time</td>";
    echo "<td>$to_date,$to_time</td>";
    echo "<td>$hourly_price</td>";
    echo "<td>$payment</td>";  
    echo "<td><a href='manage-booking.php?change=$booking_id'>Change to pay</a></td>";   
}                                    
?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                 
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include('include/footer.php'); ?>