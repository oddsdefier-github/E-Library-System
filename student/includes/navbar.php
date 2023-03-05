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