<?php $page='employer'; ?>
@extends('user.master')
@section('content')

 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-header">
          <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/user/dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                       <li class="breadcrumb-item " aria-current="page">Support Ticket</li>
                      </ol>
                    </nav>
         
          </div>

          <div class="section-body">
        
                <div class="ca">
                 
                  <div class="" >

                    <div id="accordion"  >                      
   
                     <div class="accordion">
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-4" aria-expanded="" >
                          <h4>Support</h4>
                        </div>
                        <div class="accordion-body collapse show" id="panel-body-4" data-parent="#accordion">
                        <div class="col-md-12"  >
                  <form  name="support"   >
                      @csrf
                 
                    <div class="ca">
                      <div class="row">
                          <div class="col-md-8">
                          <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Support Title</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" placeholder="Title of Support" name="title" id="title">
                          
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Support Message</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea  rows="8" cols="70" class="support-box " name="message" id="message"></textarea>
                      </div>
                    </div>
                     
                     
                 </div>
                    </div>                   
                  </form>
                  <div class="card-footer text-right">
                <button class="btn support btn-primary mr-2" >
                    Update</button>                    
                    </div>
                </div>
                        </div>
                      </div>
                      </div>
                     
                      <!---------------------password------------------------------->
                   
                     
                    </div>
                  </div>
                </div>


</div>
          </div>
        </section>
      </div>
     
@endsection
@section('js')
<script>
"use strict";
  $(document).ready(function(){
    $('.spin').hide();


  $('.support').on('click',function(){
    event.preventDefault();
    
    var form = document.forms.namedItem("support");
    var formData = new FormData(form);

    $.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$.ajax({
  type:'post',
    url:'{{URL::to('/')}}/user/post-support',
    data:formData, 
    processData: false,
    contentType: false,
    success: function(data){
      if(data == 1){
  
        Fnon.Hint.Success('Your request has been sent successfully. Please do not resend', {
          position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'left-bottom', 'center-top', 'center-center', 'center-bottom'
          animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
         callback:function(){
          // callback
          }
        });

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

        
  $("#resetUserPassword").on("click", function(event){
      event.preventDefault();
      var id = $('#id').val();
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
          if ( confirm('This will reset user password!')){
            $.ajax({
              type:"post",
              url:"{{URL::to('/')}}/admin/reset-user-password/"+id,
          
              cache: false,
              contentType: false,
              processData: false,
              success: function(data){
                if(data == 1){
            
                  Fnon.Hint.Success('Password reset Success', {
                    position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'right-top', 'center-top', 'center-center', 'center-bottom'
                    animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
                   callback:function(){
                    // callback
                    }
                  });
          

          }else {
            Fnon.Hint.Danger('Error detected. ', {
              position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'right-top', 'center-top', 'center-center', 'center-bottom'
                    animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
                  
              callback:function(){
              // callback
              }
            });
          }
          
              }

          }) ; 
          }     
                   
      
  });
        
      });
        
  </script>

@endsection