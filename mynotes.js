$(function(){
//define variable
var activenote =0;
var editmode =false;
//load notes by sending ajax call to loadnotes.php
//add a new note : ajax call to createnotes.php

//typing notes : ajax call to updatenotes.php
$("textarea").keyup(function(){
    $.ajax({
        url: "updatenotes.php",
        type:"POST",
        // we need to send current note content along with the note id 
        data:{note:$(this).val() , id:activenote},
        success:function(data){
         if(data=='err'){
            $("#notes").html("<div class='alert alert-danger'>there was an error with reurned values</div>");

         }

        } ,
        error: function(){
    // ajax calll fails:show ajax call error
            $("#notes").html("<div class='alert alert-danger'>there was an error with ajax call</div>");
        }



     }); 


});




//clicking on all notes buttons 
$("#allNotes").click(function(event){
    $.ajax({
        url: "loadnotes.php",
        success:function(data){
          $("#notes").html(data);
          showHide(["#edit","#addNote","#noteheader","#notes"],["#notepad","#allNotes","textarea"]);
        clickOnNote();
        } ,
        error: function(){
    // ajax calll fails:show ajax call error
            $("#notes").html("<div class='alert alert-danger'>there was an error with ajax call</div>");
        }



     }); 





});
//click on done after editing : loading notes again
//click on edit : go to edit mode 

//function for 
 //click on a note 
function clickOnNote(){
 $('.noteheader').click(function(){
  if(!editmode){
      // to get the note id of the selected note
   activenote = $(this).attr("id");
      //fill text area 
      $('textarea').val($(this).find(".notebody").text());
      showHide(["#notepad","#allNotes","textarea"],["#edit","#done","#addNote","#noteheader","#notes"]);
      $("textarea").focus();
  }

 });
};
 // click on delete buttons
 //hide and show 
 function showHide(array1, array2){
  for(i=0; i<array1.length; i++){
      $(array1[i]).show();   
  }
  for(i=0; i<array2.length; i++){
      $(array2[i]).hide();   
  }
};






 
       // ajax call to loadnotes.php
       $.ajax({
          url: "loadnotes.php",
          success:function(data){
            $("#notes").html(data);
            clickOnNote();
              
          } ,
          error: function(){
      // ajax calll fails:show ajax call error
              $("#notes").html("<div class='alert alert-danger'>there was an error with ajax call</div>");
          }
  
  
  
       }); 

       $("#addNote").click(function(event){
        $.ajax({
          url: "creatnotes.php",
          success:function(data){
            $("#alert").html(data);
            $("textarea").val("");
            activenote=data;
            showHide(["#notepad","#allNotes","textarea"],["#edit","#done","#addNote","#noteheader","#notes"]);
            $("textarea").focus();


            
          } ,
          error: function(){
      // ajax calll fails:show ajax call error
              $("#notes").html("<div class='alert alert-danger'>there was an error with ajax call</div>");
          }
  
  
  
       }); 
      });


  });

  
  




























