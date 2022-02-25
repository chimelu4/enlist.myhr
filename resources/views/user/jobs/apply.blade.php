<?php $page='candidate'; ?>
@extends('user.master')
@section('content')

 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-header">
          <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('user/dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                       <li class="breadcrumb-item " aria-current="page">Job Application</li>
                      </ol>
                    </nav>
         
          </div>

          <div class="section-body">
        
               
                      <h6 class="text-center mt-3">Application for {{$post->job_title}} position</h6>

        
                  <form name="applyform"  novalidate=""  >
                  @csrf
                  <input type="hidden" name="job_id" class="m-3" value="{{$post->id}}">
                    <div class="card-body">
                        <div class="result text-danger"></div>
                        <p style="font-size: 14px; color:#000">Type your cover letter below,submit when you are done.Please be informed that<br> your CV will be visible to the company you are applying to.</p>
                        

                          <div class="form-group row mb-4">                    
                      <div class="col-sm-12 col-md-12 col-xl-12">
                        <textarea  rows="4" cols="40"class="summernote-simple " name="cover" id="cover"></textarea>
                      </div>
                    </div>
                     
                    
                     
                     
                    
                    
                                          
                         
                        


                    </div>  
                    <script>
                
                CKEDITOR.replace( 'cover',{
                    
                } );
            </script>        
                  </form>
                  <div class="card-footer text-right">
                    <button type="submit"  class="btn btn-primary btnApply mr-2" id="btnApply"><i class="fa fa-spinner fa-spin spin"></i>Submit</button>
                   
                  
                    </div>
                      
                  
                
                     
                      <!---------------------password------------------------------->
                   
                     
                
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
//adding jobrole
$("#btnApply").on("click", function(event){
      event.preventDefault();
      $('.spin').show();
      CKEDITOR.instances.cover.updateElement();
var form = document.forms.namedItem("applyform");
var formData = new FormData(form);

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$.ajax({
  type:'post',
    url:'{{URL::to('/')}}/user/job/apply',
    data:formData, 
    processData: false,
    contentType: false,
    success: function(data){
      if(data == 1){
        $('.spin').hide();
        Fnon.Hint.Success('Application sent successfully.Kindly Wait for approval. Please do not resend application as this will automatically disqualify you for this post.', {
          position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'left-bottom', 'center-top', 'center-center', 'center-bottom'
          animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
         callback:function(){
          // callback
          }
        });

$('.result').html('Application sent successfully.Kindly Wait for approval. Please do not resend application as this will automatically disqualify you for this post.')
}else  {
    $('.spin').hide();
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

  $('.updatec').on('click',function(){
    event.preventDefault();
    $('.spin').show();
    var form = document.forms.namedItem("updateCompany");
    var formData = new FormData(form);

    $.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$.ajax({
  type:'post',
    url:'{{URL::to('/')}}/admin/update/company',
    data:formData, 
    processData: false,
    contentType: false,
    success: function(data){
      if(data == 1){
        $('.spin').hide();
        Fnon.Hint.Success('Company updated successfully. Good Job!', {
          position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'left-bottom', 'center-top', 'center-center', 'center-bottom'
          animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
         callback:function(){
          // callback
          }
        });
location.reload(false);

}else  {
    $('.spin').hide();
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

        
      });
        
  </script>

@endsection