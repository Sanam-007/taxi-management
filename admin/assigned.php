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
    include '../include/connection.php';
    
?>


<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Admin (driver table)</title>
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
              <h3 class="page-header"><i class="fa fa-laptop"></i>All driver</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                <li><i class="fa fa-laptop"></i>driver Table</li>
              </ol>
            </div>
          </div>
          <div class='row'>
            <div class="col-lg-10">
              <table class="table table-dark table-striped">
                  <thead>
                      <th>Taxi</th>
                      <th>Driver</th>
                      <th>Date</th>
                  </thead>
                  <tbody>
                      <?php 
                          $qry="SELECT * FROM `assigndriver` WHERE `status`=1";
                          $r=mysqli_query($con,$qry);
                          while($row=mysqli_fetch_array($r)){ 
                                  $tid = $row['tid'];
                                  $did = $row['did'];
                                  $date = $row['date'];

                                  $qry1 = "SELECT * FROM `taxi` WHERE `id`=$tid";
                                  $r1 = mysqli_query($con,$qry1);
                                  $row1 = mysqli_fetch_array($r1);
                                  $taxi = $row1['number'];

                                  $qry1 = "SELECT * FROM `driver` WHERE `id`=$did";
                                  $r1 = mysqli_query($con,$qry1);
                                  $row1 = mysqli_fetch_array($r1);
                                  $driver = $row1['name'];
                            ?>
                              <tr>
                                  <td> <?php echo $taxi;?> </td>
                                  <td> <?php echo $driver;?> </td>
                                  <td> <?php echo $date;?> </td>
                                  
                              </tr>
                        <?php } ?>
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