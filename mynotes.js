$(function(){
//define variable
//load notes by sending ajax call to loadnotes.php
//add a new note : ajax call to createnotes.php
//typing notes : ajax call to updatenotes.php
//clicking on all notes buttons 
//click on done after editing : loading notes again
//click on edit : go to edit mode 

//function for 
 //click on a note 
 // click on delete buttons
 //hide and show 

 
    //prevent default php processing 
    //event.preventDefault();
      //collect user inputs 
      //var datatopost = $(this).serializeArray();
     // console.log(datatopost);
        //send them to signup.php using Ajax
       $.ajax({
          url: "loadnotes.php",
          success:function(data){
              
            $("#notes").html(data);
              
          } ,
          error: function(){
      // ajax calll fails:show ajax call error
              $("#notes").html("<div class='alert alert-danger'>there was an error with ajax call</div>");
          }
  
  
  
       }); 
  
  
  




























});