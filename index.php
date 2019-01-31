<?php 
session_start();
include('DBconnection.php');
//remember me 
include('remember.php');
//logout 
include('logout.php');
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <title>Online Notes</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="styling.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  </head>
  <body>
    <!-- navigation bar -->
    <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
        <div class="container-fluid">
           <!-- navigation Bar Header -->
          <div class="navbar-header">
            <a class="navbar-brand" style="cursor:pointer" href="<?php echo $_SERVER['PHP_SELF'];?>"> online notes</a>
            <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <!-- collabsable elements in navigation bar -->
            <div class="navbar-collapse collapse" id="navbarCollapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">home</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="#">Contact Us</a></li>
                <!-- <li><a href="#"> Login </a></li> -->
              </ul>
               <ul class="nav navbar-nav navbar-right" ><li><a href="#login_modal" data-toggle="modal">Login</a></li></ul> 
             
            </div>
          
       </div>
    </nav>

    <!-- jumbtron with sign up button  -->
     <div class ="jumbotron" id="myContainer">
        <h1>Online Notes App</h1>
        <p>your Notes with you wherever you go</p>
        <p>Easy to use , protects all your notes</p>
        <button type="button" class="btn btn-lg btn-success signup green" data-target="#signup_modal" data-toggle="modal">Sign Up</button>

    </div>




    <!-- login form -->
    <form class="form" id= "login_form" method="post">
    <div class="modal" id="login_modal" role="dialog" aria-labelledby="Hlabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header">
          <button class="close" data-dismiss="modal">&times;</button>
            <h4 id=Hlabel> Login : </h4>
         </div>
  
        <div class="modal-body">
            <!-- login messages from php code -->
            <div id="loginMessage"></div>

             <div class="form-group">
               <input type="email" name="loginemail" id="loginemail" placeholder="email" class="form-control">
             </div>
             <div class="form-group">
               <input type="password" name="loginpassword" id="loginpassword" placeholder="choose a password" class="form-control"> 
             </div>
             <div class="checkbox">
             <label>
             <input type="checkbox" name="rememberme" id="rememberme">
             remember me
             </label>
             <a style="cursor:pointer"  data-target="#forgetpassword_modal" data-dismiss="modal" data-toggle="modal"  class="pull-right">forget my password?</a>

             </div>
             
              
         
        </div>

        <div class="modal-footer">
           <button type="button" class="btn btn-default"  data-dismiss="modal">Cancel</button>
           <input class="btn btn-success green" name="login" type="submit" value="Login">
           <button type="submit" class="btn btn-default navbar-left " name="register" data-dismiss="modal" data-target="#signup_modal" data-toggle="modal">Register</button>

        </div>
    </div>   
   </div>  
  </div>
  </form>

    <!-- sign up form -->
    <form class="form" id="signup_form" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
    <div class="modal" id="signup_modal" role="dialog" aria-labelledby="Hlabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header">
          <button class="close" data-dismiss="modal">&times;</button>
            <h4 id=Hlabel>sign up today and start using online notes app </h4>
         </div>
  
        <div class="modal-body">
          
            <!-- sign up messages from php code -->
            <div id="signupMessage"></div>

             <div class="form-group">
               <input type="text" name="username" id="name" placeholder="user name" class="form-control">
             </div>
             <div class="form-group">
               <input type="email" name="email" id="email" placeholder="email" class="form-control">
             </div>
             <div class="form-group">
               <input type="password" name="password"id="password" placeholder="choose a password" class="form-control"> 
             </div>
             <div class="form-group">
               <input type="password" name="password2" id="password2" placeholder="confirm the password" class="form-control"> 
             </div>  
          
        </div>

        <div class="modal-footer">
           <button type="button" class="btn btn-default"  data-dismiss="modal">Cancel</button>
           <button type="submit" class="btn btn-success green" name="signup"  data-target="#" data-toggle="modal">sign Up</button>
        </div>
    </div>   
   </div>  
  </div>
  </form>






    <!-- forget password form  -->
    <form class="form" id= "forgetpassword_form" method="post">
    <div class="modal" id="forgetpassword_modal" role="dialog" aria-labelledby="Hlabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header">
          <button class="close" data-dismiss="modal">&times;</button>
            <h4 id=Hlabel> forget your password? please enter your email address : </h4>
         </div>
  
        <div class="modal-body">
            <!-- forgetpassword messages from php code -->
            <div id="forgetpasswordMessage"></div>

             <div class="form-group">
               <input type="email" name="forgotemail" id="forgotemail" placeholder="email" class="form-control">
             </div>
             
             
        </div>

        <div class="modal-footer">
           <button type="button" class="btn btn-default"  data-dismiss="modal">Cancel</button>
           <button type="submit" class="btn btn-success green" name="forgotpassword" data-target="#" data-toggle="modal">Submit</button>
           <button type="submit" class="btn btn-default navbar-left " name="register" data-dismiss="modal" data-target="#signup_modal" data-toggle="modal">Register</button>

        </div>
    </div>   
   </div>  
  </div>
  </form>


















    <!-- footer -->
        <div class="footer">
         <div class="container">
           <p> samehcode.cm Copyright &copy; 2017- <?php $today = date('Y,D');  echo $today?></p> 
         </div>

        </div>
        
        
        
        
      

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="index.js"></script>  

   <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->

  </body>
</html>