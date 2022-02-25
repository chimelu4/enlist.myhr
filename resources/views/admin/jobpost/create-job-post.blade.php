<?php $page='settings';?>
@extends('admin.master')
@section('content')
<?php   use \App\Http\Controllers\JobroleController; ?>

 <!-- Main Content -->
 <div  class="main-content">
        <section class="section">
          <div class="section-header">
          <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/admin/dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="breadcrumb-item "><a href="{{URL::to('/admin/all-job-posts')}}" >All Job Posts</a></li>                        
                        <li class="breadcrumb-item " aria-current="page" >Post Job</a></li>                        
                      </ol>
                    </nav>
           
           
            
          </div>

          <div class="section-body">
               
<div class="container">
<h2 class="section-title">Post New Job</h2>     
</div>
           
              <div class="float-left col-12">
                
                   <form name="postcreate"  enctype="multipart/form-data" novalidate="">
                   <div class="form-group row ">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Job Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" placeholder="Job title" name="title" id="title" required>
                      </div>
                    </div>
                    <div class="form-group row ">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Location</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="loc" id="loc" placeholder="Where?" required>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Job Type</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" id="type" name="type">
                        <option selected disabled>Choose Type</option>
                         @foreach ($types as $type)
                             <option value="{{$type->id}}">{{$type->name}}</option>
                         @endforeach
                        </select>
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Industry</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="industry" id="industry">
                        <option selected disabled>Choose Industry</option>
                         @foreach ($industry as $industry)
                             <option value="{{$industry->id}}">{{$industry->name}}</option>
                         @endforeach
                        </select>
                      </div></div>

                      <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Salary Range</label>
                      <div class="col-sm-12 col-md-3">
                      <input type="number" placeholder="min." class="form-control inputtags" name="min" id="min" required>
                      </div> 
                      <div class="col-sm-12 col-md-3">
                      <input type="number" placeholder="max" class="form-control inputtags" name="max" id="max" required>
                      </div>
                    </div> 
                   
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Dates</label>
                      <div class="col-sm-12 col-md-4">
                      Opening Date <input type="date" placeholder="Opened" name="openingdate" id="openingdate" class="form-control inputtags">
                      </div>
                       <div class="col-sm-12 col-md-3">
                       Closing Date:<input type="date" placeholder="Closing" name="closingdate" id="closingdate" class="form-control inputtags">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Hiring Company</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="company" id="company" required>
                        <option selected disabled>Choose Company</option>
                         @foreach ($companies as $company)
                             <option value="{{$company->id}}">{{$company->company}}</option>
                         @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Job Description</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea  rows="4" cols="40"class="summernote-simple " name="desc" id="desc"></textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                      <div class="col-sm-12 col-md-7">
                        
                        <img id="pholder"  class="image-preview">
                          <input type="file" name="photo" id="photo" />
                     
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Minimum Qualification</label>
                      <div class="col-sm-12 col-md-7 p-2">
                        <select class="form-control selectric"  name="minqualification" id="qualification">
                        <option selected disabled>Choose One</option>
                         @foreach ($qualifications as $qualification)
                             <option value="{{$qualification->id}}">{{$qualification->name}}</option>
                         @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Highest Qualification</label>
                      <div class="col-sm-12 col-md-7 p-2">
                        <select class="form-control selectric" name="maxqualification" id="maxqualification">
                        <option selected disabled>Choose One</option>
                         @foreach ($qualifications as $qualification)
                             <option value="{{$qualification->id}}">{{$qualification->name}}</option>
                         @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Other Requirements</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea  rows="4" cols="40" name="other" id="other" class="summernote-simple "></textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="poststatus" id="poststatus" required>
                          
                          <option selected disabled>Select Options</option>
                          @foreach ($jobstatus as $status)
                               <option value="{{$status->id}}">{{ucfirst($status->name)}}</option>
                          @endforeach
                       
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary createpost"><i class="fa fa-spinner fa-spin spin"></i>Create Post</button>
                      </div>
                    </div>
                   
</form>
               
           

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

//creating Post
$(".createpost").on("click", function(event){
      event.preventDefault();
      $('.spin').show();
var form = document.forms.namedItem("postcreate");
var formData = new FormData(form);
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$.ajax({
  type:'post',
    url:'{{URL::to('/')}}/admin/store-post',
    data:formData, 
    processData: false,
    contentType: false,
    success: function(data){
      if(data == 1){
        $('.spin').hide();
        Fnon.Hint.Success('Jop Post Saved successfully. Good Job!', {
          position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'left-bottom', 'center-top', 'center-center', 'center-bottom'
          animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
         callback:function(){
          // callback
          }
        });
location.reload(true);

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