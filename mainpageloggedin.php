<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <title> MyNotes</title>

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
                <li><a href="#">Profile</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="#">Contact Us</a></li>
                <li class="active"><a href="#">MyNotes</a></li>


              </ul>
               <ul class="nav navbar-nav navbar-right" >
               <li><a>Logedin as <strong>username</strong></a></li>
               <li><a>Log Out</a></li>
               </ul> 
             
            </div>
          
       </div>
    </nav>

    <!-- Notes Container  -->
     <div class="container">
       <div class="row">
        <div class="col-md-offset-3 col-md-6">
           <div class="buttons">
              <button id="addNote" type="button" class="btn btn-info btn-lg">Add Notes</button>
              <button id="edit" type="button" class="btn btn-info btn-lg pull-right">Edit</button>
              <button id="done" type="button" class="btn btn-info btn-lg green pull-right">Done</button>
              <button id="allNotes" type="button" class="btn btn-info btn-lg">All Notes</button>

           </div>

           <div id="notepad">
            <textarea rows="10"> 

            </textarea>
           </div>

           <div id="notes" class="notes">
             <!-- ajax call to a php file -->
            </div>

        </div>
       </div>
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
           <button type="submit" class="btn btn-success green" name="login" data-dismiss="modal" data-target="#" data-toggle="modal">Login</button>
           <button type="submit" class="btn btn-default navbar-left " name="register" data-dismiss="modal" data-target="#signup_modal" data-toggle="modal">Register</button>

        </div>
    </div>   
   </div>  
  </div>
  </form>

    <!-- sign up form -->
    <form class="form" id="signup_form" method="post">
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
               <input type="text" name="name" id="name" placeholder="user name" class="form-control">
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
           <button type="submit" class="btn btn-success green" name="signup" data-dismiss="modal" data-target="#" data-toggle="modal">sign Up</button>
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
            <div id="forgetpassword"></div>

             <div class="form-group">
               <input type="email" name="forgotemail" id="forgotemail" placeholder="email" class="form-control">
             </div>
             
             
        </div>

        <div class="modal-footer">
           <button type="button" class="btn btn-default"  data-dismiss="modal">Cancel</button>
           <button type="submit" class="btn btn-success green" name="forgotpassword" data-dismiss="modal" data-target="#" data-toggle="modal">Submit</button>
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
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  </body>
</html>