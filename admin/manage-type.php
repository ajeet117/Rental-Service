<?php include('include/header.php'); ?>

        <div id="page-wrapper">


            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Manage Type
                        </h1>
                        <!-- for inserting in brand table -->
                        <?php 
                        
                        $query="SELECT * FROM tb_vehicle_type";
                        $result=mysqli_query($connection,$query);
                        if(!$result)
                        {
                            die("Query Failed" . mysqli_error($connection));
                        }
                        
                        
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">Listed  Brands</div>
                            <div class="panel-body">
                                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Vehicle Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Vehicle Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                            $vehicle_type_id=$row['vehicle_type_id'];
                                            $vehicle_type=$row['vehicle_type'];
                                            echo  "<tr>";
                                            echo  "<td>$vehicle_type_id</td>";
                                            echo  "<td>$vehicle_type</td>";
                                            echo  "<td><a href='edit-type.php?edit=$vehicle_type_id'>edit</a>/<a href='manage-type.php?delete=$vehicle_type_id'>delete</a></td>";
                                            echo  "</tr>";
                                        }?>
                                                    <!-- for deleting a brand-->
                                            <?php 
                                                if(isset($_GET['delete']))
                                                 {
                                                    $vehicle_type_id=$_GET['delete'];
                                                    $query="DELETE FROM tb_vehicle_type WHERE vehicle_type_id='$vehicle_type_id'";
                                                    $result=mysqli_query($connection,$query);
                                                    header("location:manage-brand.php");
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

    </div>
    <!-- /#wrapper -->

  <?php include('include/footer.php') ?>