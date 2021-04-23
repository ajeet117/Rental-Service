<?php include('include/header.php') ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Create Brand
                        </h1>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Form fields</div>
                                    <div class="panel-body">
                                    <?php 
                                    
                                    if(isset($_POST['submit']))
                                    {
                                        $brand_name=$_POST['brand'];
                                        $query="INSERT INTO tb_brand(brand_name) VALUE('$brand_name')";
                                        $result=mysqli_query($connection,$query);
                                        if(!$result)
                                        {
                                            die("query failed" . mysqli_error($connection));
                                        }
                                        else
                                        {
                                            echo "<p> Brand Created </p>";
                                        }

                                    }
                                    
                                    
                                    
                                    ?>
                                        <form method="post" class="form-horizontal">


                                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Brand Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="brand" id="brand" required>
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