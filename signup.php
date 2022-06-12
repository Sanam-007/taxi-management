<?php
    session_start();
     $_SESSION['isloggedin']='no';
       
               
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>taxi page</title>
    <link rel="stylesheet" href="sign.css">

</head>
<body>
    
    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Instant cabs</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="service.php">Service</a></li>
                     <li><a href="index.php">Log In</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            
        </div>
        <div class="content">

            
            <div class="form">

                <form method="post">
                    <h2>Sign Up  form</h2>
                
                    <input type="text" name="name" placeholder="Enter name">
                   <input type="email" name="email" placeholder="Enter email" autocomplete="off">
                    <input type="password" name="password" placeholder="Enter password">
                     <input type="text" name="contact" placeholder="Enter contact number">
                     <input type="date" name="dob" placeholder="Enter dob">
                    <input type="text" name="location" placeholder="Enter location">
                  <button type="submit" name = "submit" class="btn btn-primary">SignUp</button>
                   
                    
                </form>
                

            </div>
        </div>
    </div>
       
            <?php 
                        include 'connection.php';
                        if(isset($_POST['submit']))
                        {
                            //recvd data from input/control
                            $name = $_POST['name'];
                            
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $contact = $_POST['contact'];
                            $dob = $_POST['dob'];
                            $location = $_POST['location'];
                            //db query
                            $query = "INSERT INTO `passenger`(`name`, `email`, `password`, `contact number`,`dob`,`location`) VALUES ('$name','$email', '$password', '$contact','$dob','$location')";
                            if(mysqli_query($con, $query))
                            {
                                echo "successfully Signed Up!!";
                            }

                        }
                    ?>
            </form>
       </div>
    </div>
    <script>
      
    </script>
    <?php include 'include/script.php' ?>
</body>
</html>