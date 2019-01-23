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
}else{
 //creat two variables and store them in cookies
  $authentificator1 = bin2hex(openssl_random_pseudo_bytes(10)); //10 bytes = 80 bits /4 = 20 charcters
  $authentificator2 = (openssl_random_pseudo_bytes(20));
  function f1($a,$b){
       $c=$a.",".bin2hex($b);
       return $c;
  }
  $cookieValue =f1($authentificator1,$authentificator2);
  setcookie("rememberme",$cookieValue,time()+15*24*60*60);
  //preparing variable for the sql query 
  function f2 ($a){
      $res =hash('sha256',$a);
      return $res;
  }
  $f2authentificator2=f2($authentificator2);
  $user_id = $_SESSION['user_id'];
  $expiration = date('Y-m-d H:i:s',time()+15*24*60*60);
  // run query to store in remember me table 
  $sql = "INSERT INTO rememberme (authentificator1, f2authentificator2, user_id, expires) VALUES ('$authentificator1','$f2authentificator2','$user_id','$expiration')";
   $result =mysqli_query($conn,$sql);
   if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    echo '<div class="alert alert-danger">' . mysqli_error($conn) . '</div>';
  }
  else{ echo "success";}

 }

}














?>