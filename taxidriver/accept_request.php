
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
	$v=$_REQUEST['request_id']; //db query
   
	$query="UPDATE  request set status=1 WHERE  request_id=$v";
	include '../connection.php';
	mysqli_query($con,$query);
    $query="INSERT INTO rides(request_id,driver_id,status) VALUES ($v,$id,0)";
    mysqli_query($con,$query);
    header('Location: requests.php');
?>
