  /**
   *
   * You can write your JS code here, DO NOT touch the default style file
   * because it will make it harder for you to update.
   *
   */

  "use strict";

  $(document).ready(function(){
    
   
    
    $(".btnAddUserold").on("click", function(event){
      event.preventDefault();
      var form = document.forms.namedItem("userinfo");
      var formData = new FormData(form);
      var phone = $('#phone').val();
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
          $.ajax({
              type:"POST",
              url:"add-user",
              data:formData,
              cache: false,
              contentType: false,
              processData: false,
              success: function(data){
                if(data == 1){
            
                  Fnon.Hint.Success('User Created Successfully', {
                    position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'right-top', 'center-top', 'center-center', 'center-bottom'
                    animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
                   callback:function(){
                    // callback
                    }
                  });
         
        
          //window.location.href=url;
          

          }else  {
            Fnon.Hint.Danger(data, {
              position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'right-top', 'center-top', 'center-center', 'center-bottom'
              animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
             callback:function(){
              // callback
              }
            });
          }
          
              }

          }) ;      
                   
      
  });

  
                 
  



  $(".btnUpdateUser").on("click", function(event){
    event.preventDefault();
 
    var form = document.forms.namedItem("userUpdateInfo");
    var formData = new FormData(form);
    var id = $('#user_id').val();

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
        $.ajax({
            type:"POST",
            url:"../update-user",
            data:formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
              if(data == 1){
          
                Fnon.Hint.Success('User Updated Successfully.', {
                  position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'left-bottom', 'center-top', 'center-center', 'center-bottom'
                  animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
                 callback:function(){
                  // callback
                  }
                });
        location.reload(false);
        

        }else  {
          Fnon.Hint.Danger(data, {
            position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'left-bottom', 'center-top', 'center-center', 'center-bottom'
                  animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
                 callback:function(){
                  // callback
                  }
          });
        }
        
            }

        }) ;      
      
          
    
});





  //Deleting id type
  $(document).on('click', '.delete-user',function(e){
    e.preventDefault();  
    var el = this;
    var id = $(this).data('id');
    var confirmalert = confirm("Are you sure?");
    if (confirmalert == true) {
        
        
        
            $.ajax({  
                  url:"delete-user/"+id,  
                  type:"get",  
                  success:function(data)  
                  {  
                    if(data == 1){
                    
                        // Remove row from HTML Table
  $(el).closest('tr').css('background','tomato');
  $(el).closest('tr').fadeOut(800,function(){
  $(this).remove();});

                }else {
                  Fnon.Hint.Danger('Error detected. Record might be a duplicate', {
                    callback:function(){
                    // callback
                    }
                  });
                }

                  }  
            });  
        
    }
  }); 
    
    
    
   //toggle active for user
  


   

              
    });