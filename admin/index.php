<?php include('include/header.php') ?>
            

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                        </h1>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-primary text-light">
                                                <div class="stat-panel text-center">
                                                    <?php
                                                    $user_count=0;
                                                    $user_query="SELECT * FROM tb_users";
                                                    $result=mysqli_query($connection,$user_query);
                                                    if(!$result)
                                                    {
                                                        die("query failed" . mysqli_error($connection));
                                                    }
                                                    while($row=mysqli_fetch_assoc($result))
                                                    {
                                                        $user_count++;
                                                    }
                                                    
                                                    
                                                    ?>
                                                    <div class="stat-panel-number h1 "><?php echo $user_count ?></div>
                                                    <div class="stat-panel-title text-uppercase">Reg Users</div>
                                                </div>
                                            </div>
                                            <a href="users.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-success text-light">
                                                <div class="stat-panel text-center">
                                                <?php
                                                    $vehicle_count=0;
                                                    $vehicle_query="SELECT * FROM tb_vehicle";
                                                    $result=mysqli_query($connection,$vehicle_query);
                                                    if(!$result)
                                                    {
                                                        die("query failed" . mysqli_error($connection));
                                                    }
                                                    while($row=mysqli_fetch_assoc($result))
                                                    {
                                                        $vehicle_count++;
                                                    }
                                                    
                                                    
                                                    ?>
                                                    <div class="stat-panel-number h1 ">
                                                        <?php echo $vehicle_count ?>
                                                    </div>
                                                    <div class="stat-panel-title text-uppercase">Listed Vehicle</div>
                                                </div>
                                            </div>
                                            <a href="manage-vehicle.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-info text-light">
                                                <div class="stat-panel text-center">
                                                <?php
                                                    $booking_count=0;
                                                    $booking_query="SELECT * FROM tb_bookings";
                                                    $result=mysqli_query($connection,$booking_query);
                                                    if(!$result)
                                                    {
                                                        die("query failed" . mysqli_error($connection));
                                                    }
                                                    while($row=mysqli_fetch_assoc($result))
                                                    {
                                                        $booking_count++;
                                                    }
                                                    
                                                    
                                                    ?>
                                                    <div class="stat-panel-number h1 ">
                                                    <?php echo $booking_count ?></div>
                                                    <div class="stat-panel-title text-uppercase">Total Booking</div>
                                                </div>
                                            </div>
                                            <a href="manage-booking.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="panel panel-default">
                                            <div class="panel-body bk-warning text-light">
                                                <div class="stat-panel text-center">
                                                <?php
                                                    $brand_count=0;
                                                    $brand_query="SELECT * FROM tb_brand";
                                                    $result=mysqli_query($connection,$brand_query);
                                                    if(!$result)
                                                    {
                                                        die("query failed" . mysqli_error($connection));
                                                    }
                                                    while($row=mysqli_fetch_assoc($result))
                                                    {
                                                        $brand_count++;
                                                    }
                                                    
                                                    
                                                    ?>
                                                    <div class="stat-panel-number h1 "><?php echo $brand_count ?></div>
                                                    <div class="stat-panel-title text-uppercase">Listed Brands</div>
                                                </div>
                                            </div>
                                            <a href="manage-brand.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
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