
<?php
    session_start();
     if($_SESSION['isloggedin']=='no'){
       header('Location: ../index.php');
     }
     else if($_SESSION['user']!='admin'){
        header('Location: unauthorized.php');
     }
     include '../connection.php';
     $query ="SELECT * FROM model";
     $model=mysqli_query($con,$query);

     $query ="SELECT * FROM brand";
     $brand=mysqli_query($con,$query);
         
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
              <h3 class="page-header"><i class="fa fa-laptop"></i>Create taxi</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                <li><i class="fa fa-laptop"></i>Taxi</li>
              </ol>
            </div>
          </div>
            <div class="col-md-6 portlets">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <div class="pull-left">Enter taxi information</div>
                  <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                  <div class="padd">
                    <div class="form quick-post">
                      <form class="form-horizontal" method="post" action="">
                        
                        
                        <div class="form-group">
                          <label class="control-label col-lg-2" for="credit">Number</label>
                          <div class="col-lg-10">
                              <input type="text" name = "number" class="form-control">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-lg-2"> <b><h5>Brands :</h5></b></label>
                          <div class="col-lg-10">
                          <select name="brand" class="form-control">
                            <option value="">- Chooose brands -</option>
                              <?php

                                while ($row = mysqli_fetch_array($brand)) {
                              ?>
                            <option value="<?php echo $row['id'];?>"><?php echo $row['brand'];?></option>
                                    
                                <?php }?>
                       
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
                              ?>
                            <option value="<?php echo $row['id'];?>"><?php echo $row['model'];?></option>
                                    
                                <?php }?>
                       
                          </select>
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
          alert("taxi has been created");
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
        
        $brand = $_POST['brand'];
        $number = $_POST['number'];
         $model = $_POST['model'];
        
        //db query
        $query = "INSERT INTO `taxi`( `brand`, `number`,`model`) VALUES ('$brand', '$number','$model')";
        if(mysqli_query($con, $query))
        {
            echo "successfully created!!";
        }

    }
?>
