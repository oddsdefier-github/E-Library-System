<?php
error_reporting(0);
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
        <title>Update Book Details</title>
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
                        <!-- edit-book-details-->
                        <div class="col-md-5" style="width: 50rem;">
                            <div class="card">
                            <div class="card-header">
                                <h5 class="fw-bold">Update Book Details</h5>
                            </div>
                            <!-- card-body -->
                            <div class="card-body">

                                <?php
                                    $bookid = $_GET['id'];
                                    $sql = "select * from LMS.book where Bookid='$bookid'";
                                    $result=$conn->query($sql);
                                    $row=$result->fetch_assoc();
                                    $name=$row['Title'];
                                    $publisher=$row['Publisher'];
                                    $year=$row['Year'];
                                    $avail=$row['Availability'];

                                ?>

                                    
                                        <form class="form-horizontal row-fluid" action="edit_book_details.php?id=<?php echo $bookid ?>" method="post">

                                            
                                                <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="Title" name="Title" value= "<?php echo $name?>"required>
                                                        <label for="Title"><b>Book Title</b></label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="Publisher" name="Publisher" value= "<?php echo $publisher?>" required>
                                                        <label for="Publisher"><b>Publisher</b></label>
                                                </div>


                                                <div class="form-floating mb-3">
                                                        <input type="text" class="form-control"  id="Year" name="Year" value= "<?php echo $year?>" required>
                                                        <label  for="Year"><b>Year</b></label>
                                                </div>

                                                <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="Availability" name="Availability" value= "<?php echo $avail?>" required>
                                                        <label  for="Availability"><b>Availability</b></label>
                                                </div>
                
                                                <div class="col-12">
                                                    <button type="submit" name="submit" class="btn btn-danger">Update Details</button>
                                                </div>

                                        </form> 
                                    </div>   
                                    <!-- card-body -->
                                    </div>          
                            </div>
                            <!-- edit-book-details -->

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
        $bookid = $_GET['id'];
        $name=$_POST['Title'];
        $publisher=$_POST['Publisher'];
        $year=$_POST['Year'];
        $avail=$_POST['Availability'];

        $sql1="update LMS.book set Title='$name', Publisher='$publisher', Year='$year', Availability='$avail' where BookId='$bookid'";



        if($conn->query($sql1) === TRUE){
        echo "<script type='text/javascript'>alert('Success')</script>";
        header( "Refresh:0.01; url=book.php", true, 303);
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
            