<?php include('include/header.php') ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Register User
                        </h1>
                        <div class="panel panel-default">
                            <div class="panel-heading">User Info</div>
                            <div class="panel-body">
                            <?php 

                            $query="SELECT * FROM tb_users";

                            $result=mysqli_query($connection,$query);
                            if(!$result)
                            {
                                die('query Failed'. mysqli_error($connection));
                            }
                           

                            ?>
                                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                        <th>User Id</th>
                                            <th>FirstName</th>
                                            <th>LastName</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Liscence No</th>
                                            <th>Liscence Image</th>
                                            <th>User Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   <tfoot>
                                        <tr>
                                            <th>User Id</th>
                                            <th>FirstName</th>
                                            <th>LastName</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Liscence No</th>
                                            <th>Liscence Image</th>
                                            <th>User Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    
                                    <tbody>
                                    <?php 
                                     while($row=mysqli_fetch_assoc($result))
                                     {
                                         $user_id=$row['user_id'];
                                         $firstname=$row['firstname'];
                                         $lastname=$row['lastname'];
                                         $email=$row['email'];
                                         $phone=$row['phone'];
                                         $liscence_no=$row['liscence_no'];
                                         $liscence_image=$row['liscence_image'];
                                         $user_image=$row['user_image'];
                                            echo "<tr>";
                                            echo "<td>$user_id</td>";
                                             echo "<td>$firstname</td>";
                                            echo "<td>$lastname</td>";
                                            echo "<td>$email</td>";
                                            echo "<td>$phone</td>";
                                            echo "<td>$liscence_no</td>";
                                            echo "<td>$liscence_image</td>";
                                            echo "<td>$user_image</td>";
                                            echo "<td><a href='users.php?delete=$user_id'>Delete</a>";
                                            echo "</tr>";
                                    }

                                    if(isset($_GET['delete']))
                                    {
                                        $user_id=$_GET['delete'];
                                        $query="DELETE FROM tb_users WHERE user_id='$user_id'";
                                        $result=mysqli_query($connection,$query);
                                        if(!$result)
                                        {
                                            die("query failed" . mysqli_error($connection));
                                        }
                                        header("location:users.php");
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