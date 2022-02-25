<?php $page = "notifications";?>
@extends('admin.master')
@section('content')


     @section('css')
<stylesheet>

</stylesheet>
     @endsection
 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-header">
          <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/admin/dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="breadcrumb-item " aria-current="page" >Notifications</a></li>                        
                      </ol>
                    </nav>
           
          </div>

          <div style="margin: auto;" class="section-body ">
        @if (null != $messages)
 <div class="card card-danger">
        @foreach ($messages as $data)
         
                  <div class="card-header">
                    <h4 style="color: #000;">{{getUserName($data->from_bid)}}</h4>| 
                    <span class="ml-2">{{$data->created_at}}</span>
                    <div class="card-header-action">
                    
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="dropdown-list-content ">{!!$data->message!!}</div>
                  </div><hr>
                  
               
           
              
          @endforeach
             </div>
        @endif

</div>
          </div>
        </section>
      </div>
     
@endsection

@section('js')
<script>
  $(document).ready(function(){

  

    //Deleting outlet
    $(document).on('click', '#delete',function(e){
    e.preventDefault();  
    var el = this;
    var id = $(this).data('id');
    var confirmalert = confirm("Are you sure?");
    if (confirmalert == true) {
        
        
        
            $.ajax({  
                  url:"delete-exception/"+id,  
                  type:"get",  
                  success:function(data)  
                  {  
                    if(data == 1){
                      Fnon.Hint.Success('Exception deleted successfully.', {
            position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'left-bottom', 'center-top', 'center-center', 'center-bottom'
            animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
           callback:function(){
            // callback
            }
          });
                      var url = "/all-exceptions";        
                     window.location.href=url;
        

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
  

   //accepting outlet
   $(document).on('click', '#accept',function(e){
    e.preventDefault();  
    var el = this;
    var id = $(this).data('id');
    var confirmalert = confirm("This action cannot be changed by other staff?");
    if (confirmalert == true) {
        
        
        
            $.ajax({  
                  url:"/accept-exception/"+id,  
                  type:"get",  
                  success:function(data)  
                  {  
                    if(data == 1){
                      Fnon.Hint.Success('Exception accepted successfully.', {
            position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'left-bottom', 'center-top', 'center-center', 'center-bottom'
            animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
           callback:function(){
            // callback
            }
          });
                      var url = "/all-exceptions";        
                     window.location.href=url;
        

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


   //reject 
   $(document).on('click', '#reject',function(e){
    e.preventDefault();  
    var el = this;
    var id = $(this).data('id');
    var confirmalert = confirm("This action cannot be changed by other staff?");
    if (confirmalert == true) {
        
        
        
            $.ajax({  
                  url:"/reject-exception/"+id,  
                  type:"get",  
                  success:function(data)  
                  {  
                    if(data == 1){
                      Fnon.Hint.Success('Exception rejected successfully.', {
            position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'left-bottom', 'center-top', 'center-center', 'center-bottom'
            animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
           callback:function(){
            // callback
            }
          });
                      var url = "/all-exceptions";        
                     window.location.href=url;
        

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
    
    //reject 
    $(document).on('click', '#return',function(e){
    e.preventDefault();  
    var el = this;
    var id = $(this).data('id');
    var confirmalert = confirm("This will return exception to pending?");
    if (confirmalert == true) {
        
        
        
            $.ajax({  
                  url:"/return-exception/"+id,  
                  type:"get",  
                  success:function(data)  
                  {  
                    if(data == 1){
                      Fnon.Hint.Success('Exception returned successfully.', {
            position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'left-bottom', 'center-top', 'center-center', 'center-bottom'
            animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
           callback:function(){
            // callback
            }
          });
                      var url = "/all-exceptions";        
                     window.location.href=url;
        

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

  });
</script>
@endsection