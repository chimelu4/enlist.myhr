/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

$(document).ready(function(){


  $(".alert").delay(1000).fadeOut("slow");  
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


if ($('#photo').length > 0) {
  photo.onchange = evt => {
    const [file] = photo.files
    if (file) {
      pholder.src = URL.createObjectURL(file)
    }
  }
}

if ($('#photoid').length > 0) {
  photoid.onchange = evt => {
    const [file] = photoid.files
    if (file) {
      idholder.src = URL.createObjectURL(file)
    }
  }
}

if ($('#photog').length > 0) {
  photog.onchange = evt => {
    const [file] = photog.files
    if (file) {
      pholderg.src = URL.createObjectURL(file)
    }
  }}

  if ($('#photoidg').length > 0) {
  photoidg.onchange = evt => {
    const [file] = photoidg.files
    if (file) {
      idholderg.src = URL.createObjectURL(file)
    }
  }}
  
  if ($('#photog2').length > 0) {
  photog2.onchange = evt => {
    const [file] = photog2.files
    if (file) {
      pholderg2.src = URL.createObjectURL(file)
    }
  }}

  if ($('#photoidg2').length > 0) {
  photoidg2.onchange = evt => {
    const [file] = photoidg2.files
    if (file) {
      idholderg2.src = URL.createObjectURL(file)
    }
  }}
  
  if ($('#photog1').length > 0) {
  photog1.onchange = evt => {
    const [file] = photog1.files
    if (file) {
      pholderg1.src = URL.createObjectURL(file)
    }
  }}

  if ($('#photoidg1').length > 0) {
  photoidg1.onchange = evt => {
    const [file] = photoidg1.files
    if (file) {
      idholderg1.src = URL.createObjectURL(file)
    }
  }}
  

  

   //checking email
  /*  $('#email').focusout(function() {   
    var em = $(this).val();
   
             $.ajax({  
                  url:"check-email/"+em,  
                  type:"get",  
                  success:function(data)  
                  {  
                    if(data == 1){
                      $('#emailerror').text('Email is already in use');
                }else {
                $('#emailerror').text('');
                }

                  }  
             });  
         
    
   }); 
      */


  

   $("#submitl").click(function(e){
    e.preventDefault();
    
    var un = $("#uname").val();
    var em = $("#email").val();
    var ph = $("#phone").val();
  
   
    $.ajax({  
         url:"check-username-email-phone/"+un+"/"+em+"/"+ph,  
         type:"get",  
         success:function(data)  
         {  
           if(data != ''){          
             alert(data);
             $("#uname").trigger("focusout");
             $("#email").trigger("focusout");
             $("#phone").trigger("focusout");
       }else {
            $("#submit").unbind('click').click();
       }

         }  
    });  
 });
   
 //searc script
  //checking username
  $('#search-input').keyup(function() {   
    var text = $(this).val();
   
             $.ajax({  
                  url:"search/"+text,  
                  type:"get",  
                  success:function(data)  
                  {  
                   
                      $('.search-result').html(data);
              
                  }  
             });  
         
    
   }); 
             
  });