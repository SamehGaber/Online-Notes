<?php 
session_start();
include('DBconnection.php');
// get note id through ajax call
$note_id =$_POST['id'];
//get the content of the note
$note_conent =$_POST['note'];

//get the time 
$time=time();
//run a query to update the note
$sql= "UPDATE notes SET note='$note_conent', time='$time' WHERE id='$note_id'";
$result =mysqli_query($conn,$sql);
if(!$result){
    echo '<div class="alert alert-danger">Error updating the note!</div>';
    echo '<div class="alert alert-danger">' . mysqli_error($conn) . '</div>';
  }