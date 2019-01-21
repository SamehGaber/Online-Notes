// ajax call for the sign up form
//once the form is submitted 
$("#signup_form").submit(function(event){
  //prevent default php processing 
  event.preventDefault();
    //collect user inputs 
    var datatopost = $(this).serializeArray();
    console.log(datatopost);
      //send them to signup.php using Ajax
     $.ajax({
        url: "signup.php",
        type: "POST",
        data: datatopost,
        success:function(data){
            if(data){
          $("#signupMessage").html(data);
            }
        } ,
        error: function(){
    // ajax calll fails:show ajax call error
            $("#signupMessage").html("<div class='alert alert-danger'>there was an error with ajax call</div>");
        }



     }); 


});
// ajax call for the Logging in form
$("#login_form").submit(function(event){
    //prevent default php processing 
    event.preventDefault();
      //collect user inputs 
      var datatopost = $(this).serializeArray();
      console.log(datatopost);
        //send them to signup.php using Ajax
       $.ajax({
          url: "login.php",
          type: "POST",
          data: datatopost,
          success:function(data){
              if(data == "success"){
                  window.location ="mainpageloggedin.php";
              }else{
                $('#loginMessage').html(data);   
            }
          } ,
          error: function(){
      // ajax calll fails:show ajax call error
              $("#loginMessage").html("<div class='alert alert-danger'>there was an error with ajax call</div>");
          }
  
  
  
       }); 
  
  
  });