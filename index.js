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

            $("#signupMessage").html("<div class='alert alert-danger'>there was an error with ajax call</div>");
        }




     }); 


});
    //Ajax call sucessful: show error or success message 
    // ajax calll fails:show ajax call error