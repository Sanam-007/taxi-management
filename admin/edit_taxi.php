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
    $id=$_REQUEST['id'];
    
    $qry="SELECT * FROM taxi WHERE id=$id";
    $r=mysqli_query($con,$qry);
    $taxis=mysqli_fetch_array($r);
    $query ="SELECT * FROM model";
   $model=mysqli_query($con,$query);

   $query ="SELECT * FROM brand";
   $brand=mysqli_query($con,$query);
    //echo $courses['id'];
    //echo $courses['name'];
?>


<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Admin (taxi Edition)</title>
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
              <h3 class="page-header"><i class="fa fa-laptop"></i>Edit taxi</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                <li><i class="fa fa-laptop"></i>taxi</li>
              </ol>
            </div>
          </div>
            <div class="col-md-6 portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left">Edit taxi information</div>
                  <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                  <div class="padd">
                    <div class="form quick-post">
                      <form class="form-horizontal" method="post">

                        <div class="form-group">
                          <label class="control-label col-lg-2" for="credit">Number</label>
                          <div class="col-lg-10">
                              <input type="text" name = "number" class="form-control" value = "<?php echo $taxis['number'];?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-lg-2"> <b><h5>Brands :</h5></b></label>
                          <div class="col-lg-10">
                          <select name="brand" class="form-control">
                            
                              <?php

                                while ($row = mysqli_fetch_array($brand)) {
                                  if($row['id'] == $taxis['brand']){
                              
                              echo "<option value=".$row['id']." selected>".$row['brand']."</option>";
                                    
                                } 
                                else{
                            echo "<option value=".$row['id'].">".$row['brand']."</option>";
                                    }
                                 }?>
                       
                          </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-lg-2"> <b><h5>Models :</h5></b></label>
                          <div class="col-lg-10">
                          <select name="model" class="form-control">
                            <option value="">- Chooose models -</option>
                              <?php

                                while ($row = mysqli_fetch_array($model)) {
                              if($row['id'] == $taxis['model']){
                              ?>
                            <option value="<?php echo $row['id'];?>" selected><?php echo $row['model'];?></option>
                                    
                                <?php } else{?>
                            <option value="<?php echo $row['id'];?>"><?php echo $row['model'];?></option>
                                   <?php }}?>
                       
                          </select>
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
    if((isset($_POST['submit']))){
        //recvd data from input/control
        
        $brand = $_POST['brand'];
        $number = $_POST['number'];
        $model = $_POST['model'];

        //db query
        $qry="UPDATE `taxi` SET id='$id', brand='$brand', number='$number', model = '$model'  WHERE id = $id";
        if(mysqli_query($con,$qry)){
            //header('Location:course-table.php');
            echo "<script type='text/javascript'>
            window.location.href='update_taxi.php';
            </script>";
            //echo 'Succesfully Inserted';
        }
    }
?>