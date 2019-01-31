<?php 
session_start();
include('DBconnection.php');
if(!isset($_POST['user_id']) ||!isset($_POST['key'])){
        echo '<div class="alert alert-danger">there was an  error please click on the link again!</div>';
    exit;
    }

$user_id=$_POST['user_id'];
$key=$_POST['key'];
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
$errors ='';
$missingPassword ="<p><strong>please enter a password </strong></p>";
$invalidPassword ="<p><strong>your password should contain at least 6 characters including one capital letter and a number </strong></p>";
$differentPassword ="<p><strong>passwords are not matching </strong></p>";
$missingPassword2 ="<p><strong>please confirm your password </strong></p>";
// get user inputs 

    //password
    if(empty($_POST["password"])){
        $errors .=$missingPassword;
    }elseif(!(strlen($_POST["password"])>6 and 
    preg_match('/[A-Z]/',$_POST["password"])
    and 
    preg_match('/[0-9]/',$_POST["password"]) 
    
    )){ $errors .=$invalidPassword;
    }else{
        $password1= filter_var($_POST["password"],FILTER_SANITIZE_STRING);

        if(empty($_POST["password2"])){
            $errors .=$missingPassword2;
        }else{
            $password2 = filter_var($_POST["password2"],FILTER_SANITIZE_STRING);
            if($password1 !== $password2){
                $errors .=$differentPassword;

            }

        }
    }
    // if there are errors 
    if($errors){
        //print error message
        $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
        echo $resultMessage;
        exit;

    }
    //Prepare variables for the queries
    $password = mysqli_real_escape_string($conn, $password1);
    $password =hash('sha256',$password);
    $user_id = mysqli_real_escape_string($conn, $user_id);
    $sql = "UPDATE users SET password='$password' WHERE user_id='$user_id'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">there is a problem storing the new password!</div>'; exit;
      }
      // set the key not to be pending so as not to be used twice
      $sql = "UPDATE forgotpassword SET status='used' WHERE key_auth='$key' AND user_id='$user_id'";
      $result = mysqli_query($conn, $sql);
      if(!$result){
        echo '<div class="alert alert-danger">error running query!</div>';
      }else{
        echo '<div class="alert alert-success">Password has been changed successfully!
        <a href="index.php">login</a></div>';

      }







?>