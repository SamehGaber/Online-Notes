// Ajax call to update username  updateusername.php
$("#updateUserName_form").submit(function(event){
    //prevent default php processing 
    event.preventDefault();
      //collect user inputs 
      var datatopost = $(this).serializeArray();
      console.log(datatopost);
        //send them to signup.php using Ajax
       $.ajax({
          url: "updateUserName.php",
          type: "POST",
          data: datatopost,
          success:function(data){
              if(data){
            $("#updateUserMessage").html(data);
              }else{
                  location.reload();
              }
          } ,
          error: function(){
      // ajax calll fails:show ajax call error
              $("#updateUserMessage").html("<div class='alert alert-danger'>there was an error with ajax call</div>");
          }
  
  
  
       }); 
  
  
  });



// Ajax call to update password  updatePassword.php



// Ajax call to update Email  updateEmail.php

