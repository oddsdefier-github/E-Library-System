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
<body style=" width: 100wv; height: 100vh;">

<div class="px-4 py-5 px-md-5 vh-100" style="background-color: hsl(0, 0%, 96%); display: flex; justify-content: center;">
<div class="container">
<div class="row gx-lg-5 align-items-center mt-4">
	
	<!-- left -->
	<div class="col-lg-6 mb-2 mb-lg-0 mt-5 me-5">
		<h3 class="my-5 display-5 fw-bold ls-tight">
		Effortless access to <br> <span class="text-primary">knowledge</span> anytime, anywhere.
		</h3>
		<p style="color: hsl(217, 10%, 50.8%)">
		Introducing the ultimate solution for students and librarians 
		alike: our e-library management system! With this cutting-edge
		technology, you'll have access to your library's entire collection
		at your fingertips.
		</p>
	</div>
	<!-- left -->
	
	<!-- login -->
	<div class="col-lg-5 mb-2 mb-lg-0 mt-4">
		<div class="card">
			<div class="class-body py-4 px-md-5">
				<center>
					<img class="mb-3 text-primary" src="node_modules/bootstrap-icons/icons/book.svg" alt="" width="60" height="47">
					<h2 class="h3 mb-3 fw-bold text-primary">Sign In</h2>
				</center>

				<form action="index.php" method="post">
				<div class="form-floating mb-2">
					<input type="text" class="form-control" Name="RollNo" placeholder="ID Number" required>
					<label for="floatingInput">ID Number</label>
				</div>
				<div class="form-floating mb-3">
					<input type="password"  class="form-control" Name="Password" placeholder="Password" required>
					<label for="floatingPassword">Password</label>
				</div>
			    <button type="submit" name="signin" class="btn btn-primary w-100 btn-block mb-3">
                  Sign in
                </button>
				<center><p class="mt-2 mb-2 text-muted">Create an account?<a href="signup.php" style="text-decoration: none"> Signup</a></p></center>
				</form>
				
			</div>
		</div>
	</div>
	<!-- login -->
	

</div>

</div>
	<div class="fixed-bottom py-4 px-4 mb-3">
		<a href="about_us.php" class="position-absolute end-0 px-5 mb-3" style="text-decoration:none"data-bs-toggle="tooltip" data-bs-placement="top" title="Learn more">About Us</a>
	</div>

</div>


<!-- container -->


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


    <!-- Bootstrap-js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> 
	<script>
		var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
		var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl)
		})
	</script>
</body>


</html>
