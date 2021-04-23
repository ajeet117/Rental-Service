<?php include('include/header.php'); ?>

        <div id="page-wrapper">


            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Manage Brand
                        </h1>
                        <!-- for inserting in brand table -->
                        <?php 
                        
                        $query="SELECT * FROM tb_brand";
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
                                            <th>Brand Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Brand Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                            $brand_id=$row['brand_id'];
                                            $brand_name=$row['brand_name'];
                                            echo  "<tr>";
                                            echo  "<td>$brand_id</td>";
                                            echo  "<td>$brand_name</td>";
                                            echo  "<td><a href='edit-brand.php?edit=$brand_id'>edit</a>/<a href='manage-brand.php?delete=$brand_id'>delete</a></td>";
                                            echo  "</tr>";
                                        }?>
                                                    <!-- for deleting a brand-->
                                            <?php 
                                                if(isset($_GET['delete']))
                                                 {
                                                    $brand_id=$_GET['delete'];
                                                    $query="DELETE FROM tb_brand WHERE brand_id='$brand_id'";
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