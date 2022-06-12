<?php 
    session_start();
    //authorization
    if(!$_SESSION['id']){
      session_destroy();
      header('Location: ../index.php');
    }
    else if($_SESSION['id'] && $_SESSION['user'] != 'driver'){
      session_destroy();
      header('Location: unauthorized.php');
    }
   $id= $_SESSION['id'];

        //db query
?>



<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Driver control panel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../include/link.php' ?>
  </head>
  <body>
    <section id="container" class="">
      <?php include '../include/driver_navbar.php' ?>
      <?php include '../include/driver_sidebar.php' ?>
      <section id="main-content">
        <section class="wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="fa fa-laptop"></i>Ride requests</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                <li><i class="fa fa-laptop"></i>Ride requests</li>

              </ol>
            </div>
          </div>
             <div class='row'>
            <div class="col-lg-10">
              <table class="table table-dark table-striped">
                  <thead>
                      <th>Serial</th>
                      <th>Source</th>
                      <th>Destination</th>
                      <th>User</th>
                      <th>contact</th>
                      <th>Time</th>
                      <th>Action</th>
                      
                  </thead>
                  <tbody>
                      <?php 
                          include '../connection.php';
                          $i=1;
                          $qry="SELECT * FROM `request` WHERE status=0";
                          $r=mysqli_query($con,$qry);
                          $query2="SELECT * FROM rides WHERE driver_id=$id  AND status=0 OR status=1";
                          $r2=mysqli_query($con,$query2);
                           $r3=mysqli_fetch_array($r2);
                          if($r3){
                            echo "<p style='color:red;'> You are already in a ride"; 
                          }
                          else{

                          
                          while($row=mysqli_fetch_array($r))
                          { 
                                $pid = $row['passenger_id'];
                                $qry="SELECT * FROM `passenger` WHERE id = $pid";
                                $r1=mysqli_query($con,$qry);
                                $row1=mysqli_fetch_array($r1);
                            ?>
                              <tr>
                                  <td> <?php echo $i++;?> </td>
                                  <td> <?php echo $row['source']?> </td>
                                  <td> <?php echo $row['destiny']?> </td>
                                  <td> <?php echo $row1['name']?> </td>
                                   <td> <?php echo $row1['contact number']?> </td>
                                    <td> <?php echo $row['booking_time']?> </td>
                                  <td>
                                      
                                      <a class="btn btn-success" data-toggle="modal" data-target="#mm<?php echo $row['request_id'];?>">Accept</a>
                                      <!-- The Modal -->
                                      <div class="modal" id="mm<?php echo $row['request_id']?>">
                                          <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Accept this passenger!!!</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    Are you sure to accept <b><?php echo $row1['name'] ?></b> ?
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                <a href="accept_request.php?request_id=<?php echo $row['request_id']?>" class="btn btn-success">Yes</a>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                          </div>
                                      </div>
                                  </td>
                              </tr>
                        <?php }} ?>
                  </tbody>
              </table>
            </div>
          </div>
                
        </section>
      </section>
    </section>
    <?php include '../include/script.php' ?>
  </body>
</html>

