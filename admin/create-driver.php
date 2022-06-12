<?php
    session_start();
     if($_SESSION['isloggedin']=='no'){
       session_destroy();
       header('Location: ../index.php');
     }
     else if($_SESSION['user']!='admin'){

        header('Location: unauthorized.php');
     }
     
         
?>



<!DOCTYPE html>
  <head>
    <title>Admin (driver creation)</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../include/link.php' ?>
  </head>
  <body>
    <section id="container" class="">
      <?php include '../include/navbar.php' ?>
      <?php include '../include/sidebar.php' ?>
      <section id="main-content">
        <section class="wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="fa fa-laptop"></i>Create Driver</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                <li><i class="fa fa-laptop"></i>Driver</li>
              </ol>
            </div>
          </div>
            <div class="col-md-6 portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left">Enter Driver information</div>
                  <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                  <div class="padd">
                    <div class="form quick-post">
                      <form class="form-horizontal" method="post" action="">
                        <div class="form-group">
                          <label class="control-label col-lg-2" for="name">Name</label>
                          <div class="col-lg-10">
                            <input type="text" name = "name" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-lg-2" for="code">Email</label>
                          <div class="col-lg-10">
                              <input type="email" name = "email" class="form-control">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-lg-2" for="credit">Contact</label>
                          <div class="col-lg-10">
                              <input type="text" name = "contact" class="form-control">
                          </div>
                        </div>
                         <div class="form-group">
                          <label class="control-label col-lg-2" for="credit">Password</label>
                          <div class="col-lg-10">
                              <input type="password" name = "password" class="form-control">
                          </div>
                        </div>
                       
                        <div class="form-group">
                          <label class="control-label col-lg-2" for="credit">Location</label>
                          <div class="col-lg-10">
                              <input type="text" name = "location" class="form-control">
                          </div>
                        </div>
                       
                         <div class="form-group">
                          <label class="control-label col-lg-2" for="credit">Date of birth</label>
                          <div class="col-lg-10">
                              <input type="date" name = "dob" class="form-control">
                          </div>
                        </div>
                                             
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-9">
                              <button type="submit" name = "submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </section>
    </section>
    <script>
      
      $(document).ready(function(){
        $('form').submit(function(){
          alert("driver has been created");
        });
      });
    
    </script>
    <?php include '../include/script.php' ?>
  </body>
</html>

<?php 
    include '../connection.php';
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
        $query = "INSERT INTO `driver`(`name`, `email`, `password`, `contact`,`dob`,`location`) VALUES ('$name','$email', '$password', '$contact','$dob','$location')";
        if(mysqli_query($con, $query))
        {
            echo "successfully created!!";
        }

    }
?>