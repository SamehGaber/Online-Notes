<?php 
// user is re-directed here after clicking the activation link 
// we should get email and activation key 
session_start();
include('DBconnection.php');
if(!isset($_GET['email']) ||!isset($_GET['key'])){
    echo '<div class="alert alert-danger">there was an  error please click on the link again!</div>';
exit;
}

$email=$_GET['email'];
$key=$_GET['key'];
$email = mysqli_real_escape_string($conn,$email);
$key = mysqli_real_escape_string($conn,$key);

$sql="UPDATE users SET activation='activated' WHERE (email='$email' AND activation='$key') LIMIT 1"; 
$query = mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn)==1){
    $resultMessage = '<div class="alert alert-success">your account has been activated</div>';
    $resultMessage .= '<a href="index.php" type="button" class ="btn btn-lg btn-success">log in</a>';
}else{
    $resultMessage = '<div class="alert alert-danger">your account can`t be activated , please try again later</div>';

}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
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
            <h1>activation </h1>
            <?php echo $resultMessage ?>


        </div>
        </div>
        </div>
    
  </body>
</html>
















