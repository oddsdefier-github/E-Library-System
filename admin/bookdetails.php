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
        <title>Book Details</title>
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

                        <!-- book details-->
                        <div class="col-md-5" style="width: 50rem;">


                        <div class="card">
                            <div class="card-header">
                                <h5 class="fw-bold">Book Details</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                $x=$_GET['id'];
                                $sql="select * from LMS.book where BookId='$x'";
                                $result=$conn->query($sql);
                                $row=$result->fetch_assoc();    

                                $bookid=$row['BookId'];
                                $name=$row['Title'];
                                $publisher=$row['Publisher'];
                                $year=$row['Year'];
                                $avail=$row['Availability'];

                                echo "<b>Book ID:</b> ".$bookid."<br><br>";
                                echo "<b>Title:</b> ".$name."<br><br>";
                                $sql1="select * from LMS.author where BookId='$bookid'";
                                $result=$conn->query($sql1);

                                echo "<b>Author:</b> ";
                                while($row1=$result->fetch_assoc())
                                {
                                    echo $row1['Author']."&nbsp;";
                                }
                                echo "<br><br>";
                                echo "<b>Publisher:</b> ".$publisher."<br><br>";
                                echo "<b>Year:</b> ".$year."<br><br>";
                                echo "<b>Availability:</b> ".$avail."<br><br>";




                                ?>

                                <a href="book.php" class="btn btn-primary">Go Back</a>                              
                            </div>
                        </div>
                        
                        </div>
                        <!-- book details -->
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