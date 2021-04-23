<?php include('include/header.php') ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Create Vehicle Type
                        </h1>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Form fields</div>
                                    <div class="panel-body">
                                    <?php 
                                    
                                    if(isset($_POST['submit']))
                                    {
                                        $vehicle_type=$_POST['vehicle-type'];
                                        $query="INSERT INTO tb_vehicle_type(vehicle_type) VALUE('$vehicle_type')";
                                        $result=mysqli_query($connection,$query);
                                        if(!$result)
                                        {
                                            die("query failed" . mysqli_error($connection));
                                        }
                                        else
                                        {
                                            echo "<p> Vehicle Type Created </p>";
                                        }

                                    }
                                    
                                    
                                    
                                    ?>
                                        <form method="post" class="form-horizontal">


                                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Vehicle Type</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="vehicle-type" id="type" required>
                                                </div>
                                            </div>
                                            <div class="hr-dashed"></div>




                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-4">

                                                    <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                                                </div>
                                            </div>

                                        </form>

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

    <?php include("include/footer.php"); ?>