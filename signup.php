

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

    }else { $resultMessage = '<div class="alert alert-success"> your request is submitted successfully </div>';
    echo $resultMessage;
}


    























?>