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
        $note_id=$row['id'];
        $noteBody=$row['note'];
        $noteTime=$row['time'];
        $noteTime= date("F d,Y h:i A",$noteTime);
        echo "
        <div class='wholeNote'>
         <div class='col-xs-5 col-sm-3 delete'>
          <button class='btn-lg btn-danger' style='width:100%'>Delete</button>
         </div>
          <div class='noteheader' id='$note_id'>
           <div class='notebody'>$noteBody</div>
           <div class='notetime'>$noteTime </div>
          </div>
        </div>";

      }
 
  }else{
    echo '<div class="alert alert-danger">you don`t have any notes yet</div>';
  }
 
    
 

 
//run a query to delete empty notes 
//run another query to look for notes corresponding to user_id
//show notes or alert message 

?>