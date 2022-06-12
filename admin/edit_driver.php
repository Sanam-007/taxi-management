<?php 
    session_start();
    //authorization
    if(!$_SESSION['id']){
      session_destroy();
      header('Location: ../index.php');
    }
    else if($_SESSION['id'] && $_SESSION['user'] != 'admin'){
      session_destroy();
      header('Location: unauthorized.php');
    }
    $id= $_REQUEST['id'];
     include '../connection.php';
     $query ="SELECT * FROM driver WHERE id=$id ";
     //echo $query;
     $table= mysqli_query($con,$query);
     $row=mysqli_fetch_array($table);
     $name=$row['name'];
     $email=$row['email'];
     $password=$row['password'];
     $contact=$row['contact'];
     $dob=$row['dob'];
     $location=$row['location'];
?>



<!DOCTYPE html>
  <head>
    <title>Admin (Driver edition)</title>
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
              <h3 class="page-header"><i class="fa fa-laptop"></i>Edit Driver</h3>
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
                            <input type="text" name = "name" class="form-control" value="<?php echo $name;?>" >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-lg-2" for="code">Email</label>
                          <div class="col-lg-10">
                              <input type="email" name = "email" class="form-control" value="<?php echo $email;?>" >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-lg-2" for="credit">Contact</label>
                          <div class="col-lg-10">
                              <input type="text" name = "contact" class="form-control" value="<?php echo $contact;?>" >
                          </div>
                        </div>
                         <div class="form-group">
                          <label class="control-label col-lg-2" for="credit">Password</label>
                          <div class="col-lg-10">
                              <input type="password" name = "password" class="form-control" value="<?php echo $password;?>" >
                          </div>
                        </div>
                       
                        <div class="form-group">
                          <label class="control-label col-lg-2" for="credit">Location</label>
                          <div class="col-lg-10">
                              <input type="text" name = "location" class="form-control" value="<?php echo $location;?>" >
                          </div>
                        </div>
                       
                         <div class="form-group">
                          <label class="control-label col-lg-2" for="credit">Date of birth</label>
                          <div class="col-lg-10">
                              <input type="date" name = "dob" class="form-control"value="<?php echo $dob;?>" >>
                          </div>
                        </div>
                                             
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-9">
                                <input type="submit" class="btn btn-primary" name="submit" value="Update">
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
        $query = "UPDATE `driver` SET id='$id', name='$name', email='$email', contact = '$contact' ,dob='$dob' , location='$location' WHERE id = $id";
        if(mysqli_query($con,$query)){
           
            echo "<script type='text/javascript'>
            window.location.href='update_driver.php';
            </script>";
            //echo 'Succesfully Inserted';
        }

    }
?>