
<?php
    session_start();
     if($_SESSION['isloggedin']=='no'){
       session_destroy();
       header('Location: ../index.php');
     }
     else if($_SESSION['user']!='admin'){
       session_destroy();
        header('Location: unauthorized.php');
     }
     include '../connection.php';
     $query ="SELECT * FROM driver";
     $driver=mysqli_query($con,$query);

     $query ="SELECT * FROM taxi";
     $taxi=mysqli_query($con,$query);
         
?>


<!DOCTYPE html>
  <head>
    <title>Admin (taxi creation)</title>
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
              <h3 class="page-header"><i class="fa fa-laptop"></i>Assign Driver</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                <li><i class="fa fa-laptop"></i>Assign Driver</li>
              </ol>
            </div>
          </div>
            <div class="col-md-6 portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left">Choose driver and taxi to assign</div>
                  <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                  <div class="padd">
                    <div class="form quick-post">
                      <form class="form-horizontal" method="post" action="">
                        

                        <div class="form-group">
                          <label class="control-label col-lg-2"> <b><h5>Drivers :</h5></b></label>
                          <div class="col-lg-10">
                          <select name="did" class="form-control">
                            <option value="">- Chooose drivers -</option>
                              <?php

                                while ($row = mysqli_fetch_array($driver)) {

                              		$did = $row['id'];
                              		$query = "SELECT * FROM assigndriver WHERE did = $did AND status=1";
                              		$row1 = mysqli_query($con,$query);
                              		$row1 = mysqli_fetch_array($row1);
                              		if($row1){
                              			continue;
                              		}
                              	?>
                            		<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                    
                                <?php }?>
                       
                          </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-lg-2"> <b><h5>Taxis :</h5></b></label>
                          <div class="col-lg-10">
                          <select name="tid" class="form-control">
                            <option value="">- Chooose taxis -</option>
                              <?php

                                while ($row = mysqli_fetch_array($taxi)) {
                                	$tid = $row['id'];
                                	$query = "SELECT * FROM assigndriver WHERE tid = $tid AND status=1";
                              		$row1 = mysqli_query($con,$query);
                              		$row1 = mysqli_fetch_array($row1);
                              		if($row1){
                              			continue;
                              		}
                              ?>
                            		<option value="<?php echo $row['id'];?>"><?php echo $row['number'];?></option>
                                    
                                <?php }?>
                       
                          </select>
                          </div>
                        </div>
                                                                                                      
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-9">
                              <button type="submit" name = "submit" class="btn btn-primary">Assign</button>
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
          alert("Driver successfully assigned");
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
        
        $tid = $_POST['tid'];
        $did = $_POST['did'];
        $date = date('Y-m-d');
        echo $date;
        
        //db query
        $query = "INSERT INTO `assigndriver`( `tid`, `did`,`date`,`status`) VALUES ($tid, $did,'$date',1)";
        if(mysqli_query($con, $query))
        {
                        
                        echo "<p style='color:red;'>successfully created!! !<p>";
        }

    }
?>
