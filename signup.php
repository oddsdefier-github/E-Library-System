<?php
error_reporting(0);
require('dbconn.php');
?>


<!DOCTYPE html>
<html>
<head>

	<title>Library Management System </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<div class="px-4 py-3 px-md-5 vh-100" style="background-color: hsl(0, 0%, 96%); width: 100wv; height: 100vh; display: flex; justify-content: center;">
<div class="container">

    <div class="row gx-lg-5 align-items-center">
        
        <!-- signup -->
        <div class="col-lg-5 mb-5 mb-lg-0 mt-5 me-3">
        <div class="card" style="margin-right: 2rem;">
			<div class="class-body py-4 px-md-5 ">
				<center><h2 class="h3 mb-3 fw-bold text-primary">Sign Up</h2></center>

                <form action="index.php" method="post">
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" Name="Name" placeholder="Name" required>
                        <label for="floatingInput">Name</label>
                    </div>

                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" Name="Email" placeholder="Email" required>
                        <label for="floatingInput">Email</label>
                    </div>
                    
                    <div class="form-floating mb-2">
                        <input type="password" class="form-control" Name="Password" placeholder="Password" required>
                        <label for="floatingInput">Password</label>
                    </div>

                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" Name="Phone Number" placeholder="Phone Number" required>
                        <label for="floatingInput">Phone Number</label>
                    </div>

                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" Name="RollNo" placeholder="ID Number" required>
                        <label for="floatingInput">ID Number</label>
                    </div>
                    
                    <select name="Category" id="Category" class="form-select" aria-label="Default select example">
                        <option value="Elementary">Elementary</option>
                        <option value="Junior">Junior</option>
                        <option value="Senior">Senior</option>
                        <option value="College">College</option>
                    </select>
                    
                    <br>
                    <div class="send-button">
                    <div class="mb-3" style="margin-left: 0.5rem;"> 
                        <input type="checkbox" id="terms" class="me-1" required>
                        <label for="terms">Agree with our <a class="underline" href="terms.html">Terms and Conditions?</a></label>
                    </div>
                   
                        <input type="submit" name="signup" value="Sign Up" class="btn btn-primary w-100" id="submit" disabled id="submit">
                        
                        
                </form>
                 <center><p class="mt-2 mb-2 text-muted">Already have an account?<a href="index.php" style="text-decoration: none"> Sign in</a></p></center>
                </div>
                </div>
        </div>
        </div>
        <!-- signup -->
        
        <!-- right -->
        <div class="col-lg-6 mb-5 mb-lg-0 mt-1 cascading-right">
            <h1 class="my-5 display-5 fw-bold ">
            Empowering minds, <br>
            expanding<span class="text-primary"> horizons.</span>
            </h1>
            <p style="color: hsl(217, 10%, 50.8%)">
            Introducing the ultimate solution for students and librarians 
            alike: our e-library management system! With this cutting-edge
            technology, you'll have access to your library's entire collection
            at your fingertips.
            </p>
        </div>

        <!-- right -->
                    

    </div>

</div>
</div>

</div>
	<div class="fixed-bottom py-4 px-4 mb-3">
		<a href="about_us.php" class="position-absolute end-0 px-5 mb-3" style="text-decoration:none"data-bs-toggle="tooltip" data-bs-placement="top" title="Learn more">About Us</a>
	</div>

</div>

<?php
if(isset($_POST['signin']))
{$u=$_POST['RollNo'];
 $p=$_POST['Password'];
 $c=$_POST['Category'];

 $sql="select * from LMS.user where RollNo='$u'";

 $result = $conn->query($sql);
$row = $result->fetch_assoc();
$x=$row['Password'];
$y=$row['Type'];
if(strcasecmp($x,$p)==0 && !empty($u) && !empty($p))
  {//echo "Login Successful";
   $_SESSION['RollNo']=$u;
   

  if($y=='Admin')
   header('location:admin/index.php');
  else
  	header('location:student/index.php');
        
  }
else 
 { echo "<script type='text/javascript'>alert('Failed to Login! Incorrect RollNo or Password')</script>";
}
   

}

if(isset($_POST['signup']))
{
	$name=$_POST['Name'];
	$email=$_POST['Email'];
	$password=$_POST['Password'];
	$mobno=$_POST['PhoneNumber'];
	$rollno=$_POST['RollNo'];
	$category=$_POST['Category'];
	$type='Student';

	$sql="insert into LMS.user (Name,Type,Category,RollNo,EmailId,MobNo,Password) values ('$name','$type','$category','$rollno','$email','$mobno','$password')";

	if ($conn->query($sql) === TRUE) {
echo "<script type='text/javascript'>alert('Registration Successful')</script>";
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
echo "<script type='text/javascript'>alert('User Exists')</script>";
}
}

?>
    <script>
	  document.getElementById("terms").onchange = function() {
		document.getElementById("submit").disabled = !this.checked;
	  };
	</script>

    <!-- Bootstrap-js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> 

</body>


</html>
