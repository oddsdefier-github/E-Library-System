<?php
ob_start();
require('dbconn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Details</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-light">
       <!-- navbar-start -->
       <header class="bg-dark">
            <div class="container">
                <nav class="navbar text-light navbar-light">
                        
                            <div class="container-fluid">
                                <h4 class="brand navbar-brand text-light">Clarendon <span class="text-primary"; style="font-weight: 700; font-size: 1.6rem;">e</span>Library</h4>
                                <ul class="nav"> 
                                        <li style="pointer-events: none" class="nav-item">
                                                <span class="">
                                                    <p class="h6" style="margin-top: 0.5rem; margin-right: 1rem;"> 
                                                            <?php
                                                                $rollno = $_SESSION['RollNo'];
                                                                $sql="select * from LMS.user where RollNo='$rollno'";
                                                                $result=$conn->query($sql);
                                                                $row=$result->fetch_assoc();
                                                                $name=$row['Name']; echo $name 
                                                            ?>
                                                    </p> 
                                                </span>

                                        </li>
                                        
                                        <li class="nav-item"> 
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle bg-black" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <span>Profile</span>
                                                    </button>

                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <li><a class="dropdown-item" href="index.php">Your Profile</a></li>
                                                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                                    </ul>
                                                </div>
                                        </li>
                                </ul>
                            </div>
                </nav>
            </div>
        </header>
        <!-- navbar-end -->
        <!-- main -->
        <main>
        <div class="py-2 mt-3" style="height: 75vh; width:100vw;">
            <div class="container" style="padding:1rem">  
                <!-- body-container -->
                <div class="row justify-content-start" style="margin-top: 0.5rem; margin-bottom: 5rem;">
                            <!-- list-group -->
                            <div class="col-3" style="margin-right: 1.5rem;"> 
                                    <ul class="list-group">
                                            <li class="list-group-item">
                                                <a href="index.php" class="nav-link pl-4" style="font-weight: 500;"><img src="node_modules/bootstrap-icons/icons/house.svg"> Home</a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="message.php" class="nav-link pl-4" style="font-weight: 500;"><img src="node_modules/bootstrap-icons/icons/chat.svg"> Messages</a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="book.php" class="nav-link pl-4" style="font-weight: 500;"><img src="node_modules/bootstrap-icons/icons/collection.svg"> All Books </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="history.php" class="nav-link pl-4" style="font-weight: 500;"><img src="node_modules/bootstrap-icons/icons/clock-history.svg"> Borrowed Books </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="recommendations.php" class="nav-link pl-4" style="font-weight: 500;"><img src="node_modules/bootstrap-icons/icons/hand-thumbs-up.svg"> Recommend Books </a></li>
                                            <li class="list-group-item">
                                                <a href="current.php" class="nav-link pl-4" style="font-weight: 500;"><img src="node_modules/bootstrap-icons/icons/check-square.svg"> Issued Books </a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="logout.php" class="nav-link pl-4" style="font-weight: 500;"><img src="node_modules/bootstrap-icons/icons/box-arrow-right.svg"> Logout </a>
                                            </li>
                                    </ul>
                            </div>
                            <!-- list-group -->
                            <!-- student-details -->
                            <div class="col-md-4 offset-md-1">
                                
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="fw-bold">Update Details</h5>
                                        </div>
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
                                            $pswd=$row['Password'];
                                            ?>    

                                        <form class="form-horizontal row-fluid" action="edit_student_details.php?id=<?php echo $rollno ?>" method="post">
                                            
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="Name" name="Name" value= "<?php echo $name?>" required>
                                                <label for="Name"><b>Name</b></label>
                                            </div>
                                            <div class="form-floating">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" name="Category" tabindex="1" value="SC" data-placeholder="Select Category" aria-label=".form-select-sm example">
                                                        <option class="fw-bold" value="<?php echo $category?>"><?php echo $category ?> </option>
                                                        <option value="Elementary">Elementary</option>
                                                        <option value="Junior">Junior</option>
                                                        <option value="Senior">Senior</option>
                                                        <option value="College">College</option>
                                                    </select>
                                                    <label for="Category"><b>Category</b></label>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="EmailId" name="EmailId" value= "<?php echo $email?>" required>
                                                <label for="EmailID"><b>Email ID</b></label>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="MobNo" name="MobNo" value= "<?php echo $mobno?>" required>
                                                <label  for="MobNo"><b>Mobile Number</b></label>
                                            </div>


                                            <div class="form-floating mb-3">
                                                <input  type="password" class="form-control" id="Password" name="Password"  value= "<?php echo $pswd?>" required>
                                                <label for="Password"><b>New Password</b></label>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" name="submit" class="btn btn-danger">Update Details</button>
                                            </div>
                                                                    
                                        </form>

                                        </div>
                                    </div> 	
                            </div>
                            <!-- student-details -->
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
        $rollno = $_GET['id'];
        $name=$_POST['Name'];
        $category=$_POST['Category'];
        $email=$_POST['EmailId'];
        $mobno=$_POST['MobNo'];
        $pswd=$_POST['Password'];
        $sql1="update LMS.user set Name='$name', Category='$category', EmailId='$email', MobNo='$mobno', Password='$pswd' where RollNo='$rollno'";



        if($conn->query($sql1) === TRUE){
        echo "<script type='text/javascript'>alert('Success')</script>";
        header( "Refresh:0.01; url=index.php", true, 303);
        }
        else
        {//echo $conn->error;
        echo "<script type='text/javascript'>alert('Error')</script>";
        }
        }
        ?>

    </body>

</html>