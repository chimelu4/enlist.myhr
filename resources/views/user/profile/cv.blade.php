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
                       <li class="breadcrumb-item " aria-current="page">My CV</li>
                      </ol>
                    </nav>
         
          </div>

          <div class="section-body">
        
               
                      <h6 class="text-center mt-3">Update or view your CV</h6>

        
                  <form name="cvform"  novalidate=""  >
                  @csrf
                
                    <div class="card-body">
                        <div class="result text-danger"></div>
                        <div style="border: 1px solid #3333; border-radius:5px" class="container"> 
                          

                        <div   class="col-md-4">
                             <p style="font-size: 14px; color:red;">Upload .docx or .PDF files only </p>
                         <div class="col-md-12 mt-3 p-3 ">
                           <label class=" col-form-label">Upload New File</label>                        
                         <input type="file" value="choose" required="" name="cv" id="cv">
                         <div class="invalid-feedback">
                         No file selected?
                        </div>
                            </div><br>
                           
                           
                        </div>


                        </div>
                       
                     

                    </div> 
                         
                  </form>
                  <div class="card-footer text-right">
                    <button type="submit"  class="btn btn-primary btnApply mr-2" id="btnUpload"><i class="fa fa-spinner fa-spin spin"></i>Upload</button>
                   
                  
                    </div>
                    @if (isset($cv))
                        <form method="post" action="{{URL::to('/')}}/download-cv">  @csrf
                      <input type="hidden" name="id" value="{{$cv->candidate_id??0}}">
                     <div class="container mt-3">
                      <input type="submit" value="Preview" class="btn btn-primary btn downloa" >
                      <p>Last updated <b>{{$cv->updated_at->format('d M Y h:m:s')??""}}</b></p>
                  </div>
                    </form>
                    @endif
                      
                 
                
                     
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
$("#btnUpload").on("click", function(event){
      event.preventDefault();
      $('.spin').show();
     
var form = document.forms.namedItem("cvform");
var formData = new FormData(form);

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$.ajax({
  type:'post',
    url:'{{URL::to('/')}}/user/upload/cv',
    data:formData, 
    processData: false,
    contentType: false,
    success: function(data){
      if(data == 1){
        $('.spin').hide();
        Fnon.Hint.Success('CV uploaded successfully.', {
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

  $('.download').on('click',function(){
    event.preventDefault();
    $('.spin').show();
    var id = $(this).data('id');

    $.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$.ajax({
  type:'post',
    url:'{{URL::to('/')}}/download-cv',
    data:{id:id}, 
    processData: false,
    contentType: false,
    success: function(data){
      if(data == 1){
        $('.spin').hide();
      

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