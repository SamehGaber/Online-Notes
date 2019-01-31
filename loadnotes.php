<?php 
session_start();
include('DBconnection.php');
// get user_id
$user_id =$_SESSION['user_id'];
$sql= "DELETE FROM notes WHERE note=''";
$result = mysqli_query($conn, $sql);
if(!$result){
    echo '<div class="alert alert-warning">Error running the query!</div>'; exit;
  }
$sql = "SELECT * FROM notes WHERE user_id ='$user_id' ORDER BY time DESC";
 $result = mysqli_query($conn, $sql);
   if(!$result){
    echo '<div class="alert alert-warning">Error running the query!</div>'; exit;
  }
  if(mysqli_num_rows($result)>0){
      while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $noteBody=$row['note'];
        $noteTime=$row['time'];
        echo "<div class='noteheader'>
        <div class='notebody'>$noteBody</div>
        <div class='notetime'>$noteTime </div>
          </div>";

      }
 
  }else{
    echo '<div class="alert alert-danger">you don`t have any notes yet</div>';
  }
 
    
 

 
//run a query to delete empty notes 
//run another query to look for notes corresponding to user_id
//show notes or alert message 

?>