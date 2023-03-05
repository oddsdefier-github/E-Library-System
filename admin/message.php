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
        <title>Send Message</title>
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
                        
                        <!-- send-message -->
                        <div class="col-md-3 offset-md-0 " style="width: 40rem;">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="fw-bold">Send a message</h5>
                                    </div>
                                    <div class="card-body">

                                            <form class="column mt-3" action="message.php" method="post">

                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="RollNo" name="RollNo" for="Rollno" required>
                                                        <label for="Rollno"><b>ID Number</b></label>
                                                    </div>

                                                    <div class="form-floating">
                                                        <textarea class="form-control" id="Message" name="Message" placeholder="Leave a comment here" type="text" style="height: 100px" required></textarea>
                                                        <label for="Message">Leave a message.</label>
                                                    </div>

                                                    <hr>

                                                <div class="control-group">
                                                    <div class="controls">
                                                        <button type="submit" name="submit"class="btn btn-success">Send Message</button>
                                                    </div>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                        </div>
                        <!-- send-message -->
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
            $rollno=$_POST['RollNo'];
            $message=$_POST['Message'];

        $sql1="insert into LMS.message (RollNo,Msg,Date,Time) values ('$rollno','$message',curdate(),curtime())";

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