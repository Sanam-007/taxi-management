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
     $id= $_SESSION['id'];

     
               
?>

<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Admin (taxi table)</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../include/link.php' ?>
  
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <section id="container" class="">
      <?php include '../include/navbar.php' ?>
      <?php include '../include/sidebar.php' ?>
      <section id="main-content">
        <section class="wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h3 class="page-header"><i class="fa fa-laptop"></i>All taxi</h3>
              <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="dashboard.php">Home</a></li>
                <li><i class="fa fa-laptop"></i>taxi Table</li>
              </ol>
            </div>
          </div>
          <div class='row'>
            <div class="col-lg-10">
              <table class="table table-dark table-striped">
                  <thead>
                      <th>id</th>
                      <th>brand</th>
                      <th>number</th>
                      <th>model</th>
                      
                  </thead>
                  <tbody>
                      <?php 
                          $qry="SELECT * FROM `taxi`";
                          $r=mysqli_query($con,$qry);

                          while($row=mysqli_fetch_array($r)){ ?>
                              <tr>
                                  <td> <?php echo $row['id']?> </td>
                                  <td> <?php echo $row['brand']?> </td>
                                  <td> <?php echo $row['number']?> </td>
                                  <td> <?php echo $row['model']?> </td>
                                  <td>
                                      <a class="btn btn-primary" href="edit_taxi.php?id=<?php echo $row['id']?>">Edit</a>
                                      <a class="btn btn-danger" data-toggle="modal" data-target="#mm<?php echo $row['id']?>">Delete</a>
                                      <!-- The Modal -->
                                      <div class="modal" id="mm<?php echo $row['id']?>">
                                          <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Delete Confirmation!!!</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    Are you sure to delete <b><?php echo $row['number'] ?></b> ?
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                <a href="delete_taxi.php?id=<?php echo $row['id']?>" class="btn btn-success">Yes</a>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                          </div>
                                      </div>
                                  </td>
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