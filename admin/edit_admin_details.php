<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['RollNo']) {
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Admin Details</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
        <!-- navbar-start -->
            <?php include('./includes/navbar.php'); ?>
        <!-- navbar-end -->
        <!-- main -->
        <main>
        <div class="py-2 mt-3" style="height: 75vh; width:100vw;">
            <div class="container" style="padding:1rem">  
                <!-- body-container -->
                <div class="row justify-content-start" style="margin-top: 0.5rem; margin-bottom: 5rem;">

                        <!--sidebar-->
                        <?php include('./includes/sidebar.php'); ?>
                        <!--sidebar-->

                    
                        <!-- update-admin-details-->
                        <div class="col-md-5" style="width: 50rem;">
                                
                        <div class="card">
                            <div class="card-header">
                                <h5 class="fw-bold">Update Details</h5>
                            </div>

                            <div class="card-body">


                                    <?php
                                    $rollno = $_SESSION['RollNo'];
                                    $sql="select * from LMS.user where RollNo='$rollno'";
                                    $result=$conn->query($sql);
                                    $row=$result->fetch_assoc();

                                    $name=$row['Name'];
                                    $email=$row['EmailId'];
                                    $mobno=$row['MobNo'];
                                    $pswd=$row['Password'];
                                    ?>    
                                
                                <form class="form-horizontal row-fluid" action="edit_admin_details.php?id=<?php echo $rollno ?>" method="post">

                                    <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="Name" name="Name" value= "<?php echo $name?>" required>
                                                    <label for="Name"><b>Name</b></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="EmailId" name="EmailId" value= "<?php echo $email?>" required>
                                                    <label for="EmailId"><b>Email ID</b></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="MobNo" name="MobNo" value= "<?php echo $mobno?>" required>
                                                    <label for="MobNo"><b>Mobile Number</b></label>
                                    </div>

                                    <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="Password" name="Password"  value= "<?php echo $pswd?>" required>
                                                    <label for="Password"><b>New Password</b></label>
                                    </div>

                                    <div class="col-12">
                                            <button type="submit" name="submit" class="btn btn-danger">Update Details</button>
                                    </div>

                                </form>
                                        
                            </div>
                            </div>  
                        </div>                    
                        <!-- update-admin-details -->

                        </div>
                    <!-- body-container -->
            </div>
            </div>
    </main>
    <!-- main -->
                        
    <!-- footer -->
    <?php include('./includes/footer.php'); ?>
    <!-- footer -->

    <!-- Bootstrap-js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> 


    <!-- Extra-js -->
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>

        <?php
        if(isset($_POST['submit']))
        {
        $rollno = $_GET['id'];
        $name=$_POST['Name'];
        $email=$_POST['EmailId'];
        $mobno=$_POST['MobNo'];
        $pswd=$_POST['Password'];

        $sql1="update LMS.user set Name='$name', EmailId='$email', MobNo='$mobno', Password='$pswd' where RollNo='$rollno'";



        if($conn->query($sql1) === TRUE){
        echo "<script type='text/javascript'>alert('Success')</script>";
        header( "Refresh:0.01; url=index.php", true, 303);
        }
        else
        {//echo $conn->error;
        echo "<script type='text/javascript'>alert('Error')</script>";
        }
        }
        ?>

        

    </body>
    </html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>