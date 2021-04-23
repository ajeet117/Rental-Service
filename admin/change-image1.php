<?php include('include/header.php') ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Change Vehicle Image 1
                        </h1>
                        <div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Vehicle Image 1 Details</div>
									<div class="panel-body">
										<form method="post" class="form-horizontal" enctype="multipart/form-data">
											<div class="form-group">
												<label class="col-sm-4 control-label">Current Image1</label>
												<?php 
													if(isset($_GET['imgid']))
													{
														$vehicle_id=$_GET['imgid'];
														$query="SELECT vehicle_image1 FROM tb_vehicle WHERE vehicle_id='$vehicle_id'";
														$result=mysqli_query($connection,$query);
														if(!$result)
														{
															die("Query Failed " . mysqli_error($connection));
														}
														while($row=mysqli_fetch_assoc($result))
														{
															$vehicle_image1=$row['vehicle_image1'];
														}
													}

												?>
												<div class="col-sm-8">
													<img src="img/vehicleimages/<?php echo $vehicle_image1 ?>" width="300" height="200" style="border:solid 1px #000">
												</div>
											</div>
						
											<div class="form-group">
												<label class="col-sm-4 control-label">Upload New Image 1<span style="color:red">*</span></label>
												<div class="col-sm-8">
											<input type="file" name="img1" required>
												</div>
											</div>
											<div class="hr-dashed"></div>
						
											<?php 
												if(isset($_POST['update']))
												{
													$vehicle_image1=$_FILES["img1"]["name"];
													move_uploaded_file($_FILES["img1"]["tmp_name"],"img/vehicleimages/".$_FILES["img1"]["name"]);
													$query="UPDATE tb_vehicle SET vehicle_image1='$vehicle_image1' WHERE vehicle_id='$vehicle_id'";
													$result=mysqli_query($connection,$query);
													if(!$result)
													{
														die("query failed". mysqli_error($connection));
													}
													else
													{
														header("location:edit-vehicle.php?edit=$vehicle_id");
													}
												}
												

											?>
						
						
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
						
													<button class="btn btn-primary" name="update" type="submit">Update</button>
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




