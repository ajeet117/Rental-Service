<?php include('include/header.php'); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Manage Vehicle
                        </h1>
                        <div class="panel panel-default">
                            <div class="panel-heading">Vehicle Details</div>
                            <div class="panel-body">
                             <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Vehicle Id</th>
                                            <th>Vehicle Title</th>
                                            <th>Brand </th>
                                            <th> Vehicle Overview</th>
                                            <th>Price Per Hour</th>
                                            <th>Vehicle Type</th>
                                            <th>Milage</th>
                                            <th>Engine</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Vehicle Id</th>
                                            <th>Vehicle Title</th>
                                            <th>Brand </th>
                                            <th> Vehicle Overview</th>
                                            <th>Price Per Hour</th>
                                            <th>Vehicle Type</th>
                                            <th>Milage</th>
                                            <th>Engine</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                    $query="SELECT tb_vehicle.*,tb_brand.brand_name,tb_vehicle_type.vehicle_type FROM tb_vehicle ";
                                    $query.="INNER JOIN tb_brand ON tb_brand.brand_id=tb_vehicle.brand_id ";
                                    $query.="INNER JOIN tb_vehicle_type ON tb_vehicle_type.vehicle_type_id=tb_vehicle.vehicle_type_id";
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
                                        $vehicle_overview=$row['vehicle_overview'];
                                        $hourly_price=$row['hourly_price'];
                                        $vehicle_type=$row['vehicle_type'];
                                        $vehicle_milage=$row['vehicle_milage'];
                                        $vehicle_engine=$row['vehicle_engine'];
                                        echo "<tr>";
                                        echo "<td>$vehicle_id</td>";
                                        echo "<td>$vehicle_title</td>";
                                        echo "<td>$vehicle_brand</td>";
                                        echo "<td>$vehicle_overview</td>";
                                        echo "<td>$hourly_price</td>";
                                        echo "<td>$vehicle_type</td>";
                                        echo "<td>$vehicle_milage</td>";
                                        echo "<td>$vehicle_engine</td>";
                                        echo "<td><a href='edit-vehicle.php?edit=$vehicle_id'>Edit</a>/<a href='manage-vehicle.php?delete=$vehicle_id'>Delete</a></td>";
                                        echo "<tr>";
                                    }
                                    
                                    if(isset($_GET['delete']))
                                    {
                                        $vehicle_id=$_GET['delete'];
                                        $delete_query="DELETE FROM tb_vehicle WHERE vehicle_id='$vehicle_id'";
                                        $delete_result=mysqli_query($connection,$delete_query);
                                        if(!$delete_result)
                                        {
                                            die("Query Failed" . mysqli_error($connection));
                                        }
                                        else
                                        {
                                            header("location:manage-vehicle.php");
                                        }
                                    }
                                    
                                    ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!------- -->
                    </div>
                </div>
                 
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include('include/footer.php'); ?>