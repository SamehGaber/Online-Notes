<?php 
session_start();
if(!isset($_SESSION['user_id'])){
  header("location:index.php");
}
?>


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
               <li><a>Logedin as <strong><?php echo $_SESSION['username'];?></strong></a></li>
               <li><a href="index.php?logout=1" style="cursor:pointer" >Log Out</a></li>
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
    
















    <!-- footer -->
        <div class="footer">
         <div class="container">
           <p> samehcode.cm Copyright &copy; 2017- <?php $today = date('Y,D');  echo $today?></p> 
         </div>

        </div>
        
        
        
        
      

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="mynotes.js"></script>

   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  </body>
</html>