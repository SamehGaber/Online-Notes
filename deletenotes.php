<?php 
session_start();
include('DBconnection.php');
// get note id through ajax call
$note_id =$_POST['id'];
//run a query to update the note
$sql= "DELETE FROM notes WHERE id='$note_id'";
$result =mysqli_query($conn,$sql);
if(!$result){
    echo '<div class="alert alert-danger">Error updating the note!</div>';
    echo '<div class="alert alert-danger">' . mysqli_error($conn) . '</div>';
  }
?>