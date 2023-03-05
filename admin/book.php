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
        <title>All Books</title>
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

                             
                        <!-- all-books -->
                        <div class="col-md-5" style="width: 45rem;">
                                <form class="form-horizontal row-fluid" action="book.php" method="post">

                                    <div class="input-group mb-3 w-75">
                                            <span class="input-group-text" id="inputGroup-sizing-default" for="Search">Search</span>
                                            <input type="text" id="title" name="title" placeholder="Enter Name/ID of Book" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                            <button type="submit" name="submit"class="btn btn-primary">Search</button>
                                    </div>

                                </form>
                                <br>
                                <?php
                                if(isset($_POST['submit']))
                                    {$s=$_POST['title'];
                                        $sql="select * from LMS.book where BookId='$s' or Title like '%$s%'";
                                    }
                                else
                                    $sql="select * from LMS.book";

                                $result=$conn->query($sql);
                                $rowcount=mysqli_num_rows($result);

                                if(!($rowcount))
                                    echo "<br><center><h3><b><i>No Results</i></b></h3></center>";
                                else
                                {


                                ?>
                                <table class="table" id = "tables">
                                <thead>
                                <tr>
                                    <th>Book id</th>
                                    <th>Book name</th>
                                    <th>Availability</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                //$result=$conn->query($sql);
                                while($row=$result->fetch_assoc())
                                {
                                $bookid=$row['BookId'];
                                $name=$row['Title'];
                                $avail=$row['Availability'];


                                ?>
                                <tr>
                                    <td><?php echo $bookid ?></td>
                                    <td><?php echo $name ?></td>
                                    <td><b><?php echo $avail ?></b></td>
                                    <td><center>
                                        <a href="bookdetails.php?id=<?php echo $bookid; ?>" class="btn btn-primary btn-sm">Details</a>
                                        <a href="edit_book_details.php?id=<?php echo $bookid; ?>" class="btn btn-success btn-sm">Edit</a>                               
                                    </center></td>


                                </tr>
                                <?php }} ?>
                                </tbody>
                                </table>
                            </div>
                            <!-- all-books -->
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