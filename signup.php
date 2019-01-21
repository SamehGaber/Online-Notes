

<?php
// use SSL ( security socket layer ) for protecting sensetive user info "establish encrypted link between browser and web service"

// start a session
  session_start();
//connecting to the database
  include('DBconnection.php');
//define error messages 
$errors ='';
$missingUsername ="<p><strong>please enter name</strong></p>";
$missingEmail ="<p><strong>please enter your Email</strong></p>";
$invaildEmail ="<p><strong>please enter a valid Email</strong></p>";
$missingPassword ="<p><strong>please enter a password </strong></p>";
$invalidPassword ="<p><strong>your password should contain at least 6 characters including one capital letter and a number </strong></p>";
$differentPassword ="<p><strong>passwords are not matching </strong></p>";
$missingPassword2 ="<p><strong>please confirm your password </strong></p>";
// get user inputs 

    // userName
    if(empty($_POST["username"])){
        $errors .=$missingUsername;
    }else{
        $_POST["username"] =filter_var($_POST["username"],FILTER_SANITIZE_STRING);
    }
    //email
    if(empty($_POST["email"])){
        $errors .=$missingEmail;
    }else{
        $_POST["email"] =filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
        if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
            $errors .=$invaildEmail;
        }
    }
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
$username = mysqli_real_escape_string($conn, $_POST["username"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = mysqli_real_escape_string($conn, $password1);
#$password=md5($password);
$password =hash('sha256',$password);
//hexadecimal ..(md5)produces 128 bits = 32 chracters
// hash function produces 256 bits = 64 characters

//If username exists in the users table print error
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);
 if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>';
    echo '<div class="alert alert-danger">' . mysqli_error($conn) . '</div>';
    exit;
  }
$results = mysqli_num_rows($result);
  if($results){
    echo '<div class="alert alert-danger">That username is already registered. Do you want to log in?</div>';  exit;
  }


//If email exists in the users table print error

 $sql = "SELECT * FROM users WHERE email = '$email'";
 $result = mysqli_query($conn, $sql);
   if(!$result){
    echo '<div class="alert alert-danger">Error running the query!</div>'; exit;
  }
 $results = mysqli_num_rows($result);
  if($results){
    echo '<div class="alert alert-danger">That email is already registered. Do you want to log in?</div>';  exit;
 }

//creating activate code 
$activationKey= bin2hex(openssl_random_pseudo_bytes(16));

//insert user details and activation code 
$sql = "INSERT INTO users(username ,email, password ,activation) VALUES ('$username','$email','$password','$activationKey')";
if(!mysqli_query($conn,$sql)){
    echo '<div class="alert alert-danger">Error inserting user details to Databse !</div>'; exit;
}

//sending mail with activation link
    $to = $email;
    $subject ="Confirm the registeration";
    $message ="please click on the linke below to activate your account :\n\n ";
    $message .="https://samehcode.offyoucode.co.uk/websites/4.onlineNotes/activate.php?email=".urlencode($email)."&key=$activationKey";
    $headers ="Content-type: text/html";

 if(mail($to,$subject,$message,$headers)){
    echo '<div class="alert alert-success">thank you for registering , an activation link has been sent to your email</div>';           
 }else{
    echo ' can`t send mails';
 }
    























?>