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
            <a class="navbar-brand"> online notes</a>
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
               <ul class="nav navbar-nav navbar-right"><li><a href="#">Login</a></li></ul> 
             
            </div>
          
       </div>
    </nav>

    <!-- jumbtron with sign up button  -->
     <div class ="jumbotron" id="myContainer">
        <h1>Online Notes App</h1>
        <p>your Notes with you wherever you go</p>
        <p>Easy to use , protects all your notes</p>
        <button type="button" class="btn btn-lg btn-success signup green">Sign Up</button>

    </div>




    <!-- login form -->

    
    <!-- sign up form -->


    <!-- forget password form  -->





    <!-- footer -->
        <div class="footer">
         <div class="container">
           <p> samehcode.cm Copyright &copy; 2017- <?php $today = date('Y,D');  echo $today?></p> 
         </div>

        </div>
        
        
        
        
      

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>