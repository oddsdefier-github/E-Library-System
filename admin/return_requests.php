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
        <title>Return Request</title>
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

                             
                        <!-- request -->
                        <div class="col-md-5" style="width: 50rem;">
                        

                        <h5 class="fw-bold">Return Request</h5>
                        <table class="table" id = "tables">
                                <thead>
                                    <tr>
                                    <th>ID Number</th>
                                    <th>Book ID</th>
                                    <th>Book Name</th>
                                    <th>Dues</th>
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                            $sql="select return.BookId,return.RollNo,Title,datediff(curdate(),Due_Date) as x from LMS.return,LMS.book,LMS.record where return.BookId=book.BookId and return.BookId=record.BookId and return.RollNo=record.RollNo";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $bookid=$row['BookId'];
                                $rollno=$row['RollNo'];
                                $name=$row['Title'];
                                $dues=$row['x'];
                                
                            
                        
                            ?>
                                    <tr>
                                    <td><?php echo strtoupper($rollno) ?></td>
                                    <td><?php echo $bookid ?></td>
                                    <td><b><?php echo $name ?></b></td>
                                    <td><?php 
                                    if($dues > 0)
                                        echo $dues;
                                        else
                                        echo 0; ?></td>
                                    <td><center>
                                                                                
                                        <a href="acceptreturn.php?id1=<?php echo $bookid; ?>&id2=<?php echo $rollno; ?>&id3=<?php echo $dues ?>" class="btn btn-success">Accept</a>
                                        
                                        <!--a href="rejectreturn.php?id1=<?php echo $bookid; ?>&id2=<?php echo $rollno; ?>" class="btn btn-danger">Reject</a-->
                                    </center></td>
                                    </tr>
                            <?php } ?>
                            </tbody>
                                </table>
                                <br>
                                <br>
                                <br>
                                <br>
                                <hr>
                            <center>
                                <div class="mb-4 mt-2 ">
                                    <a href="issue_requests.php" class="btn btn-primary text-light">Issue Requests</a>
                                    <a href="renew_requests.php" class="btn btn-primary text-light">Renew Request</a>
                                    <a href="return_requests.php" class="btn btn-primary text-light">Return Requests</a>
                                </div>
                            
                            </center>
                        <!-- requests -->
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