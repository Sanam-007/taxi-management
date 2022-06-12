<?php 
    session_start();
    //authorization
    if(!$_SESSION['id']){
      session_destroy();
      header('Location: ../index.php');
    }
    else if($_SESSION['id'] && $_SESSION['user'] != 'passenger'){
      session_destroy();
      header('Location: unauthorized.php');
    }
   
     include '../connection.php';
    $id= $_SESSION['id'];
    
    
   



     
     
        //db query
?>



<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Passenger control panel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../include/link.php' ?>
  </head>
  <body>
    <section id="container" class="">
      <?php include '../include/passenger_navbar.php' ?>
      <?php include '../include/passenger_sidebar.php' ?>
      <section id="main-content">
        <section class="wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="fa fa-laptop"></i>Request A Taxi</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                <li><i class="fa fa-laptop"></i>Request A Taxi</li>

              </ol>
            </div>
          </div>
             <div class="col-md-6 portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left">Request A Taxi</div>
                  <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                  <div class="padd">
                    <div class="form quick-post">
                         <?php 
                         $query="SELECT * FROM request WHERE passenger_id=$id AND status=0";
                         $r2=mysqli_query($con,$query);
                         $row2=mysqli_fetch_array($r2);
                         if($row2){
                            echo "<p style='color:red;'> You are already in a ride"; }
                          else{


                           ?>

                      <form class="form-horizontal" method="post" action="">


                        
                        <div class="form-group">
                          <label class="control-label col-lg-2" for="credit">Source</label>
                          <div class="col-lg-10">
                              <input type="source" name = "source" class="form-control" >
                          </div>
                        </div>
                          
                          <div class="form-group">
                          <label class="control-label col-lg-2" for="credit">Destination</label>
                          <div class="col-lg-10">
                              <input type="destination" name = "destination" class="form-control" >
                          </div>
                        </div>
                         <div class="form-group">
                          <label class="control-label col-lg-2" for="credit">Booking Time</label>
                          <div class="col-lg-10">
                              <input type="time" name = "bookingtime" class="form-control" >
                          </div>
                        </div>
                                     
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-9">
                              <button type="submit" name = "submit" class="btn btn-primary">Request</button>
                            </div>
                        </div>

                      </form>
                      <?php 
                            include '../connection.php';
                            if(isset($_POST['submit']))
                            {
                                //recvd data from input/control
                                $source = $_POST['source'];
                                
                                $destiny = $_POST['destination'];
                                $booking_time = $_POST['bookingtime'];
                                
                                //db query
                                $query = "INSERT INTO `request`(`source`, `destiny`, `booking_time`,`passenger_id`,`status`) VALUES ('$source','$destiny', '$booking_time',$id,0)";
                                mysqli_query($con, $query);
                                echo "<script type='text/javascript'>
                                    window.location.href='pending_request.php';
                                    </script>";
                               

                            } }
                        ?>
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

