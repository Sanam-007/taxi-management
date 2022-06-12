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
 include '../connection.php';


   $id= $_REQUEST['id'];
   $query="DELETE FROM driver WHERE  id=$id";
    mysqli_query($con,$query);
   header ('Location: update_driver.php');
?>
