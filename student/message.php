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
        <title>Messages</title>
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

                            <!-- table -->
                            <div class="col-md-5" style="width: 45rem;">
                                <table class="table" id = "tables">
                                        <thead>
                                            <tr>
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $rollno=$_SESSION['RollNo'];
                                    $sql="select * from LMS.message where RollNo='$rollno' order by Date DESC,Time DESC";
                                    $result=$conn->query($sql);
                                    while($row=$result->fetch_assoc())
                                    {
                                        $msg=$row['Msg'];
                                        $date=$row['Date'];
                                        $time=$row['Time'];
                                    
                                
                                    ?>
                                            <tr>
                                            <td><?php echo $msg ?></td>
                                            <td><?php echo $date ?></td>
                                            <td><?php echo $time ?></td>
                                            </tr>
                                    <?php } ?>
                                    </tbody>
                                    </table>
                            </div>
                            <!-- table -->
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
    
</body>
</html>

<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>