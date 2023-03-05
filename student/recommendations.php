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
        <title>Recommendation</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-light">
        <!-- navbar-start -->
        <?php include('./includes/navbar.php')
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
                            
                            <!-- recommend-card-->
                            <div class="col-md-5" style="width: 45rem;">
                                    <div class="card">
                                            <div class="card-header">
                                                <h5 class="fw-bold">Recommend a Book</h5>
                                            </div>

                                            <div class="card-body">
                                            <!-- form -->
                                                <form class="form-horizontal row-fluid" action="recommendations.php" method="post">
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlInput1" class="form-label"for="Title"><b>Book Title</b></label>
                                                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlTextarea1" class="form-label"><b>Description</b></label>
                                                        <textarea class="form-control" type="text" id="Description" name="Description" placeholder="Description" rows="3" required></textarea>
                                                    </div>

                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <button type="submit" name="submit" class="btn btn-primary">Submit Recommendation</button>
                                                        </div>
                                                    </div>
                                            </form>
                                            <!-- form -->

                                            </div>
                                    </div>
                            </div>
                            <!-- recommend-card -->
                </div>
                <!-- body-container -->
            </div>
            </div>
    </main>
    <!-- main -->
    <center>
    <footer class="footer mt-auto py-1 col-12">
            <div class="container text-center p-3 ">
                <span style="color: blue; font-weight: 700; font-size: 1.35rem;">e</span><span style="font-weight: 500">Library </span>  &copy; 2023         
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
      
        <?php
            if(isset($_POST['submit']))
            {
                $title=$_POST['title'];
                $Description=$_POST['Description'];
                $rollno=$_SESSION['RollNo'];

            $sql1="insert into LMS.recommendations (Book_Name,Description,RollNo) values ('$title','$Description','$rollno')"; 



            if($conn->query($sql1) === TRUE){


            echo "<script type='text/javascript'>alert('Success')</script>";
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