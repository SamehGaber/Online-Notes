<?php 
// start a session
session_start();
//connecting to the database
include('DBconnection.php');
//define error messages 
$errors ='';
$missingEmail ="<p><strong>please enter your Email</strong></p>";
$invaildEmail ="<p><strong>please enter a valid Email</strong></p>";


//email
if(empty($_POST["forgotemail"])){
    $errors .=$missingEmail;
}else{
    $_POST["forgotemail"] =filter_var($_POST["forgotemail"],FILTER_SANITIZE_EMAIL);
    if(!filter_var($_POST["forgotemail"],FILTER_VALIDATE_EMAIL)){
        $errors .=$invaildEmail;
    }
}
if($errors){
    //print error message
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
}
    $email = mysqli_real_escape_string($conn, $_POST["forgotemail"]);
    //If Email exists in the users table print error
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
 if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    echo '<div class="alert alert-danger">' . mysqli_error($conn) . '</div>';
    exit;
  }
    $counts = mysqli_num_rows($result);
        if(!$counts){
    echo '<div class="alert alert-danger">That Email is not registered. Do you want to sign up? if yes please click on register button</div>';  exit;
  }

  //creating activate code 
    $activationKey= bin2hex(openssl_random_pseudo_bytes(16));

    //insert user details and new activation code 
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $user_id =$row['user_id'];
    $time =time();
    $status = 'pending';
    $sql = "INSERT INTO forgotpassword (user_id ,key_auth, time ,status) VALUES ('$user_id','$activationKey','$time','$status')";
    if(!mysqli_query($conn,$sql)){
    echo '<div class="alert alert-danger">Error inserting user details to Databse !</div>'; exit;
    }
    //sending mail with activation link
    $to = $email;
    $subject ="Reseting your Account password";
    $message ="please click on the linke below to reset your password :\n\n ";
    $message .="https://samehcode.offyoucode.co.uk/websites/4.onlineNotes/resetPassword.php?user_id=$user_id&key=$activationKey";
    $headers ="Content-type: text/html";

 if(mail($to,$subject,$message,$headers)){
    echo '<div class="alert alert-success">thank you ,an email has been sent to reset your password !</div>';           
 }else{
    echo ' can`t send mails';
 }


?>