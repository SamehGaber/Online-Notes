<?php 
// start a session
session_start();
//connecting to the database
include('DBconnection.php');
//define error messages 
$errors ='';
$missingEmail ="<p><strong>please enter your Email</strong></p>";
$invaildEmail ="<p><strong>please enter a valid Email</strong></p>";
$missingPassword ="<p><strong>please enter a password </strong></p>";


//email
if(empty($_POST["loginemail"])){
    $errors .=$missingEmail;
}else{
    $_POST["loginemail"] =filter_var($_POST["loginemail"],FILTER_SANITIZE_EMAIL);
    if(!filter_var($_POST["loginemail"],FILTER_VALIDATE_EMAIL)){
        $errors .=$invaildEmail;
    }
}
//password
if(empty($_POST["loginpassword"])){
    $errors .=$missingPassword;
}else{
    $_POST["loginpassword"]= filter_var($_POST["loginpassword"],FILTER_SANITIZE_STRING);

}
// if there are errors 
if($errors){
    //print error message
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    

}else{
// prepare variables for query
$Log_email = mysqli_real_escape_string($conn, $_POST["loginemail"]);
$Log_password = mysqli_real_escape_string($conn, $_POST["loginpassword"]);
$Log_password =hash('sha256',$Log_password);

$sql=" SELECT * FROM users WHERE (email = '$Log_email' AND password = '$Log_password' AND activation = 'activated')";
$result =mysqli_query($conn,$sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    echo '<div class="alert alert-danger">' . mysqli_error($conn) . '</div>';
  }
 # else{ echo '<div class="alert alert-success">query executed!</div>';}
 if(mysqli_num_rows($result)==1){
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $_SESSION['user_id']=$row['user_id'];
    $_SESSION['username']=$row['username'];
    $_SESSION['password']=$row['password'];

 }else{
    echo '<div class="alert alert-danger">wrong username or password!</div>';

}
if(empty($_POST['rememberme'])){
    //If remember me is not checked
    echo "success";
}

}














?>