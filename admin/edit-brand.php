<?php include('include/header.php') ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Brand
                        </h1>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Form fields</div>
                                    <div class="panel-body">
                                    <?php 
                                    if(isset($_GET['edit']))
                                    {
                                        $brand_id=$_GET['edit'];
                                        $edit_query="SELECT * From tb_brand WHERE brand_id='$brand_id'";
                                        $edit_result=mysqli_query($connection,$edit_query);
                                        if(!$edit_result)
                                        {
                                            die('Query failed' . mysqli_error($connection));
                                        }
                                        while($row=mysqli_fetch_assoc($edit_result))
                                        {
                                            $edit_brand_name=$row['brand_name'];
                                        }
                                    }
                                    if(isset($_POST['save-changes']))
                                    {
                                        $brand_name=$_POST['brand'];
                                        $query="UPDATE tb_brand set brand_name='$brand_name' WHERE brand_id=$brand_id";
                                        $result=mysqli_query($connection,$query);
                                        if(!$result)
                                        {
                                            die("query failed" . mysqli_error($connection));
                                        }
                                        else
                                        {
                                            header("location:manage-brand.php");
                                        }

                                    }
                                    
                                    
                                    
                                    ?>
                                        <form method="post" class="form-horizontal">


                                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Brand Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="brand" id="brand" value="<?php echo $edit_brand_name ?>" required>
                                                </div>
                                            </div>
                                            <div class="hr-dashed"></div>




                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-4">

                                                    <button class="btn btn-primary" name="save-changes" type="submit">Save Changes</button>
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