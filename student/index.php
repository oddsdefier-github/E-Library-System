<?php
require('dbconn.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Student Profile</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-light">

        <!-- navbar-start -->
        <?php include('./includes/navbar.php');
        ?>
        <!-- navbar-end -->
        <!-- main -->
        <main>
            <div class="py-2 mt-3" style="height: 75vh; width:100vw;">
            <div class="container">  
                <!-- body-container -->
                <div class="row justify-content-start" style="margin-top: 0.5rem; margin-bottom: 5rem;">

                            <!-- sidebar -->
                            <?php include('./includes/sidebar.php');
                            ?>
                            <!-- sidebar -->

                            <!-- index -->
                            <div class="col-md-5 offset-md-2 mt-5">
                                    <div class="card" style="width: 20rem;"> 
                            
                                        <div class="card-header h5 fw-bold"><center><?php echo $name ?></center></div>
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
                                                
                                            <p><b>Email ID:&nbsp;&nbsp;</b><?php echo $email ?></p>
                                        
                                            <p><b>ID Number:&nbsp;&nbsp;</b><?php echo $rollno ?></p>
                                    
                                            <p><b>Category:&nbsp;&nbsp;</b><?php echo $category ?></p>
                                        
                                            <p><b>Mobile number:&nbsp;&nbsp;</b><?php echo $mobno ?></p>
                                            </b>

                                            <br>
                                            <a href="edit_student_details.php" class="btn btn-primary">Edit Details</a>    
                        
                                        </div>

                                    </div>
                            </div>
                            <!-- index -->
                </div>
                <!-- body-container -->
            </div>
            </div>
    </main>
    <!-- main -->
    <center>
    <footer class="footer mt-auto py-1 col-12">
            <div class="container text-center p-3 "> <span style="color: blue; font-weight: 700; font-size: 1.35rem;">e</span><span style="font-weight: 500">Library </span>  &copy; 2023   
                     
            </div> 
    </footer>
    </center>

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