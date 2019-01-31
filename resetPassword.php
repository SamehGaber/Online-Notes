<?php 
// user is re-directed here after clicking the activation link 
// we should get email and activation key 
session_start();
include('DBconnection.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reseting account password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        .contactForm{
            border:1px solid #7c73f6;
            margin-top: 25px;
            border-radius:15px;
            
        }
    
    </style>
    
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10 contactForm">
            <h1>Reseting password </h1>
            <div id="forgotPassMessage"></div>
<?php
    if(!isset($_GET['user_id']) ||!isset($_GET['key'])){
        echo '<div class="alert alert-danger">there was an  error please click on the link again!</div>';
    exit;
    }

$user_id=$_GET['user_id'];
$key=$_GET['key'];
$email = mysqli_real_escape_string($conn,$user_id);
$key = mysqli_real_escape_string($conn,$key);
$time = time()-86400;

$sql="SELECT user_id FROM forgotpassword  WHERE (user_id='$user_id' AND key_auth='$key' AND time > $time AND status='pending') LIMIT 1"; 
$result = mysqli_query($conn, $sql);

if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    echo '<div class="alert alert-danger">' . mysqli_error($conn) . '</div>';
exit;
}
echo "<form class='form' id='resetpasswordform' method='POST'> 
            <input type= hidden name= key value=$key>
            <input type= hidden  name= user_id value= $user_id>
             <div class='form-group'>
               <input type='password' name='password' id='password' placeholder='enter new password' class='form-control'>
             </div>
             <div class='form-group'>
               <input type='password' name='password2' id='password2' placeholder='re-enter the password' class='form-control'>
             </div>
             <button type='submit' class='btn btn-success green' name='resetpassword' value='Reset Password'>Reset Password</button>



</form>";
?>



        </div>
    </div>
  </div>
    
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
  <script>
  
   // ajax call for the reseting password  form
$("#resetpasswordform").submit(function(event){
    //prevent default php processing 
    event.preventDefault();
      //collect user inputs 
      var datatopost = $(this).serializeArray();
        //send them to signup.php using Ajax
       $.ajax({
          url: "storeResetPassword.php",
          type: "POST",
          data: datatopost,
          success:function(data){
              
                $('#forgotPassMessage').html(data);   
            }
          ,
          error: function(){
      // ajax calll fails:show ajax call error
              $("#forgotPassMessage").html("<div class='alert alert-danger'>there was an error with ajax call</div>");
          }
  
  
  
       }); 
  
  
  });
  
  
  
  
  </script>

</html>














