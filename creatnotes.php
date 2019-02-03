<?php 
session_start();
include('DBconnection.php');
// get user_id
$user_id=$_SESSION['user_id'];
$time=time();
//get current time
//run a query to create a new  note
$sql = "INSERT INTO notes (user_id,note,time) VALUES ('$user_id','','$time')";
$result = mysqli_query($conn,$sql);
if(!$result){
    echo '<div class="alert alert-warning">Error running the query!</div>';
  }else{
   //returned auto generated id by the last runned query
    echo mysqli_insert_id($conn);
  }
?>