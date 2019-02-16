<?php 
session_start();
if(!isset($_SESSION['user_id'])){
  header("location: index.php");
}
include('DBconnection.php');
$user_id =$_SESSION['user_id'];
// get user name 
// to be able to display the changes happens we retrieve data from the database and not using session variables 
$sql = "SELECT * FROM users WHERE user_id='$user_id'";
$result =mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);
if($count==1){
  $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
  $username = $row['username'];
  $email = $row['email'];

}else {
  echo "there was an error retrieving username and email from database ";
}





?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <title> Profile</title>

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
                <li class="active"><a href="#">Profile</a></li>
                <li><a href="#">Help</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="mainpageloggedin.php">MyNotes</a></li>


              </ul>
               <ul class="nav navbar-nav navbar-right" >
               <li><a>Logedin as <strong><?php echo $username;?></strong></a></li>
               <li><a href="index.php?logout=1" style="cursor:pointer">Log Out</a></li>
               </ul> 
             
            </div>
          
       </div>
    </nav>

    <!-- Notes Container  -->
     <div class="container">
       <div class="row">
        <div class="col-md-offset-3 col-md-6">
        <h2 style='color:white;'>General Accounting setting </h2>
          <div class="table-responsive">
            <table class=" table table-stripped table-hover table-condensed table-bordered">
               <tr data-target="#updateUserName" data-toggle="modal" >
                 <td>UserName</td>
                 <td><?php echo $username;?></td>
               </tr>
               <tr data-target="#updateEmail" data-toggle="modal">
                 <td>Email</td>
                 <td><?php echo $email;?></td>
               </tr>
               <tr data-target="#updatePassword" data-toggle="modal">
                 <td>Password</td>
                 <td>Valid</td>
               </tr>




            </table>
          </div>

           

           <div id="notes" class="notes">
             <!-- ajax call to a php file -->
            </div>

        </div>
       </div>
     </div>


    <!-- Update UserName form -->
    <form class="form" id= "updateUserName_form" method="post">
    <div class="modal" id="updateUserName" role="dialog" aria-labelledby="Hlabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header">
          <button class="close" data-dismiss="modal">&times;</button>
            <h4 id=Hlabel> Edit UserName : </h4>
         </div>
  
        <div class="modal-body">
            <!-- uodate user messages from php code -->
            <div id="updateUserMessage"></div>

             <div class="form-group">
             <label for="updateUserName"> edit username</label>
               <input type="text"  name="updateUserName" id="updateUserName" value="<?php echo $username; ?>" class="form-control">
             </div>
               
         
        </div>

        <div class="modal-footer">
           <button type="button" class="btn btn-default"  data-dismiss="modal">Cancel</button>
           <button type="submit" class="btn btn-success green" name="updateName" data-target="#" data-toggle="modal" >Submit</button>

        </div>
    </div>   
   </div>  
  </div>
  </form>

<!-- Update Email form -->
<form class="form" id= "updateEmail_form" method="post">
    <div class="modal" id="updateEmail" role="dialog" aria-labelledby="Hlabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header">
          <button class="close" data-dismiss="modal">&times;</button>
            <h4 id=Hlabel> Edit Email Address : </h4>
         </div>
  
        <div class="modal-body">
            <!-- update email messages from php code -->
            <div id="updateEmailMessage"></div>

             <div class="form-group">
             <label for="updateEmail"> Enter new Email</label>
               <input type="email"  name="updateEmail" id="updateEmail" value="userName" class="form-control">
             </div>
               
         
        </div>

        <div class="modal-footer">
           <button type="button" class="btn btn-default"  data-dismiss="modal">Cancel</button>
           <button type="submit" class="btn btn-success green" name="login" data-dismiss="modal" data-target="#" data-toggle="modal">Submit</button>

        </div>
    </div>   
   </div>  
  </div>
  </form>

  <!-- Change Password  form -->
<form class="form" id= "updatePassword_form" method="post">
    <div class="modal" id="updatePassword" role="dialog" aria-labelledby="Hlabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header">
          <button class="close" data-dismiss="modal">&times;</button>
            <h4 id=Hlabel> Enter Current and New Password : </h4>
         </div>
  
        <div class="modal-body">
            <!-- update change password messages from php code -->
            <div id="updatePasswordMessage"></div>

             <div class="form-group">
             <label class ="sr-only" for="currentPassword"> Enter new Email</label>
               <input type="password"  name="currentPassword" id="currentPassword" placeholder="Current Password" class="form-control">
             </div>

             <div class="form-group">
             <label class ="sr-only" for="Password"> Enter new Email</label>
               <input type="password"  name="Password" id="Password" placeholder="New Password" class="form-control">
             </div>

             <div class="form-group">
             <label class ="sr-only" for="Password2"> Enter new Email</label>
               <input type="password"  name="Password2" id="Password2" placeholder="confirm Password" class="form-control">
             </div>
               
         
        </div>

        <div class="modal-footer">
           <button type="button" class="btn btn-default"  data-dismiss="modal">Cancel</button>
           <button type="submit" class="btn btn-success green" name="login" data-dismiss="modal" data-target="#" data-toggle="modal">Submit</button>

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
   <script src="profile.js"></script>

  </body>
</html>