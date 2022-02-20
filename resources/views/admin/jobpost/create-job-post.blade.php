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
                        <li class="breadcrumb-item " aria-current="page" >Post Job</a></li>                        
                      </ol>
                    </nav>
           
           
            
          </div>

          <div class="section-body">
               
<div class="container">
<h2 class="section-title">Post New Job</h2>     
</div>
           
              <div class="float-left col-10">
                <div class="card">
                  <div  class="card-body">
                   <div class="">
                   <div class="form-group row ">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Job Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Job Type</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric">
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
                        <select class="form-control selectric">
                        <option selected disabled>Choose Industry</option>
                         @foreach ($industry as $industry)
                             <option value="{{$industry->id}}">{{$industry->name}}</option>
                         @endforeach
                        </select>
                      </div>
                      <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Minimun Salary</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" class="form-control inputtags">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Maximum Salary</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" class="form-control inputtags">
                      </div>
                    </div> 
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Date Opened</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="date" class="form-control inputtags">
                      </div>
                    </div>  
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Date Closing</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="date" class="form-control inputtags">
                      </div>
                    </div> 
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Hiring Company</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric">
                        <option selected disabled>Choose Company</option>
                         @foreach ($company as $company)
                             <option value="{{$company->id}}">{{$company->name}}</option>
                         @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Job Description</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="summernote-simple form-control"></textarea>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                      <div class="col-sm-12 col-md-7">
                        <div id="image-preview" class="image-preview">
                          <label for="image-upload" id="image-label">Choose File</label>
                          <input type="file" name="image" id="image-upload" />
                        </div>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Required Qualification</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric">
                        <option selected disabled>Choose </option>
                         @foreach ($company as $company)
                             <option value="{{$company->id}}">{{$company->name}}</option>
                         @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric">
                          <option>Publish</option>
                          <option>Draft</option>
                          <option>Pending</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Create Post</button>
                      </div>
                    </div>
                   </div>
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


  $('.edit').on('click',function(){
 var id = $(this).data('id');

 $.ajax({  
                        url:"{{URL::to('/')}}/admin/get-job-type-value/"+id,  
                        type:"get",  
                        success:function(data)  
                        {  
                            $('#edit_name').val(data.name);
                          $('#edit_id').val(data.id);
                         

                        }  
                  });  

  });


//adding jobrole
$(".btnAddJobType").on("click", function(event){
      event.preventDefault();
      $('.spin').show();
//alert('form submit');
var name = $('#name').val();

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$.ajax({
  type:'post',
    url:'{{URL::to('/')}}/admin/store-job-type',
    data:{name:name},
    success: function(data){
      if(data == 1){
        $('.spin').hide();
        $('#exampleModal').modal('hide');
        Fnon.Hint.Success('Job type created successfully. Good!', {
          position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'left-bottom', 'center-top', 'center-center', 'center-bottom'
          animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
         callback:function(){
          // callback
          }
        });
location.reload(false);

}else{
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
  
  //adding jobrole
$(".btnUpdateJobType").on("click", function(event){
      event.preventDefault();
      $('.spin').show();
//alert('form submit');

var name = $('#edit_name').val();
var id = $('#edit_id').val();

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$.ajax({
  type:'post',
    url:'{{URL::to('/')}}/admin/update-job-type',
    data:{name:name,id:id},
    success: function(data){
      if(data == 1){
        $('.spin').hide();
        $('#exampleModal').modal('hide');
        Fnon.Hint.Success('Job type Updated successfully. Well done!', {
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

  //Deleting job-role
  $('.delete-job-type').click(function(e){
          e.preventDefault();  
          var el = this;
          var id = $(this).data('id');
          var confirmalert = confirm("Are you sure?");
          if (confirmalert == true) {
              
              
              
                  $.ajax({  
                        url:"{{URL::to('/')}}/admin/delete-job-type/"+id,  
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


      });
        
  </script>

@endsection