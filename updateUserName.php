<?php 
session_start();
include('DBconnection.php');

// get user ID
$id=$_SESSION['user_id'];
//get username from ajax call
$newusername =$_POST['updateUserName'];
//run query and update the username
$sql= "UPDATE users SET username='$newusername' WHERE user_id='$id'";
$result =mysqli_query($conn,$sql);
if(!$result){
    echo '<div class="alert alert-danger">Error updating the username ! </div>';
    echo '<div class="alert alert-danger">' . mysqli_error($conn) . '</div>';
  }



?>