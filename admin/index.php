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
        <title>Home | Admin</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-light">
    
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
                    
                        <!-- card-profile -->
                        <div class="col-md-3 offset-md-3">
                                    <div class="card" style="width: 20rem;"> 

                                            <?php
                                            $rollno = $_SESSION['RollNo'];
                                            $sql="select * from LMS.user where RollNo='$rollno'";
                                            $result=$conn->query($sql);
                                            $row=$result->fetch_assoc();

                                            $name=$row['Name'];
                                            ?>    
                                                    
                                            <div class="card-header"><center><span class="h5 fw-bold text-uppercase"><?php echo $name ?></span></center></div>
                                            <!-- card-body -->
                                            <div class="card-body">

                                            <?php
                                            $rollno = $_SESSION['RollNo'];
                                            $sql="select * from LMS.user where RollNo='$rollno'";
                                            $result=$conn->query($sql);
                                            $row=$result->fetch_assoc();

                                            $name=$row['Name'];
                                            $category=$row['Category'];
                                            $email=$row['EmailId'];
                                            $mobno=$row['MobNo'];
                                            ?>    
                                    
                                            <!-- <h1 class="card-title h5"><?php echo $name ?></h1> -->
                                            <p><b>Email ID:&nbsp;&nbsp; </b><?php echo $email ?></p>
                                            <p><b>Mobile number: &nbsp;&nbsp; </b><?php echo $mobno ?></p>
                                            </b>
                                            <a href="edit_admin_details.php" class="btn btn-primary btn-sm">Edit Details</a> 
                                            
                                            </div>
                                            <!-- card-body -->
                                    </div>
                        </div>
                        <!-- card-profile -->
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
      
</body>
</html>


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>