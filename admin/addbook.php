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
        <title>Add Books</title>
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

                        <!-- add-books -->
                        <div class="col-md-5" style="width: 50rem;">

                                <div class="card">
                                        <div class="card-header">
                                            <h5>Add Book</h5>
                                        </div>
                                        
                                        <div class="card-body">

                                                
                                                <br >

                                                <form class="form-horizontal row-fluid" action="addbook.php" method="post">

                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1" for="Title"><b>Book Title</b></span>
                                                        <input type="text" class="form-control"  id="title" name="title" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1" for="Author"><b>Author</b></span>
                                                        <input type="text" id="author1" name="author1" class="form-control" aria-label="Author" aria-describedby="basic-addon1" placeholder="Author"required>
                                                        <input type="text" id="author2" name="author2" class="form-control" aria-label="Author" aria-describedby="basic-addon1" placeholder="Author">
                                                        <input type="text" id="author3" name="author3" class="form-control" aria-label="Author" aria-describedby="basic-addon1"placeholder="Author">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1" for="Publisher"><b>Publisher</b></span>
                                                        <input type="text" id="publisher" name="publisher" placeholder="Publisher" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1" for="Year"><b>Year</b></span>
                                                        <input type="text" id="year" name="year" placeholder="Year" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1" for="Availability"><b>Number of Copies</b></span>
                                                        <input type="text" id="availability" name="availability" placeholder="Number of Copies" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
                                                    </div>
                                                    
                                                    <br>
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <button type="submit" name="submit"class="btn btn-success btn-sm">Add Book</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                    </div>
                            </div>
                            <!-- add-books -->


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
            $title=$_POST['title'];
            $author1=$_POST['author1'];
            $author2=$_POST['author2'];
            $author3=$_POST['author3'];
            $publisher=$_POST['publisher'];
            $year=$_POST['year'];
            $availability=$_POST['availability'];

        $sql1="insert into LMS.book (Title,Publisher,Year,Availability) values ('$title','$publisher','$year','$availability')";

        if($conn->query($sql1) === TRUE){
        $sql2="select max(BookId) as x from LMS.book";
        $result=$conn->query($sql2);
        $row=$result->fetch_assoc();
        $x=$row['x'];
        $sql3="insert into LMS.author values ('$x','$author1')";
        $result=$conn->query($sql3);
        if(!empty($author2))
        { $sql4="insert into LMS.author values('$x','$author2')";
        $result=$conn->query($sql4);}
        if(!empty($author3))
        { $sql5="insert into LMS.author values('$x','$author3')";
        $result=$conn->query($sql5);}

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