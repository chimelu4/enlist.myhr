<?php $page="allstaff"; ?>
@extends('admin.master')

@section('content')

 <!-- Main Content -->
 <div class="main-content">
 
  
        <section class="section">
          <div  class="section-header">
          <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{URL::to('/all-staff')}}"><i class="fas fa-list"></i> All Staff</a></li>
                        <li class="breadcrumb-item " aria-current="page">Add Staff</li>
                      </ol>
                    </nav>
                   
          </div>

          <div class="section-body">
         
   <div class="container">
   <form class="needs-validation"  class="formvalues" name="addStaff" enctype="multipart/form-data" novalidate=""  >
                  
                  
                  <div  class="card-body container">
                 
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-sm-12">
                         
                        <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Full Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" required="" name="fname" id="fname">
                        <div class="invalid-feedback">
                          What's Staff fullname?
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                      <small class="text-danger text-center" id="emailerror"></small>
                        <input type="email" class="form-control" required="" name="email" id="email">
                        <div class="invalid-feedback">
                          Oh no! Email is invalid.
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Username</label>
                      <div class="col-sm-9">
                        <small class="text-danger text-center" id="unerror"></small>
                        <input type="text" class="form-control" required="" name="uname" id="uname">
                        <div class="invalid-feedback">
                          Select a username for staff!
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Phone Number</label>
                      <div class="col-sm-9">
                      <small class="text-danger text-center" id="phoneerror"></small>
                        <input type="text" class="form-control" required="" name="phone" id="phone">
                        <div class="invalid-feedback">
                          No phone number!
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">address</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" required="" name="addr" id="addr">
                        <div class="invalid-feedback">
                          No valid <address></address>!
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Salary</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" required="" name="salary" id="salary">
                        <div class="invalid-feedback">
                          No salary for staff!
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Gender</label>
                      <div class="col-sm-9">
                        <select class="form-control" required="" name="gender" id="gender">
                        <option value="" selected disabled>Choose gender</option>
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                        </select>
                        <div class="invalid-feedback">
                          Choose gender for staff!
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Job Role</label>
                      <div class="col-sm-9">
                        <select class="form-control" required="" name="role" id="role">
                        <option value="" selected disabled>Assign Jobrole</option>
                        @foreach ($jobroles as $jobrole)
                          <option value="{{$jobrole->id}}">{{$jobrole->name}}</option>
                        @endforeach
                        </select>
                        <div class="invalid-feedback">
                          Assign role to staff!
                        </div>
                      </div>
                    </div>
                   
                    
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-12">
                            <div class="photo-holder"><img id="pholder" src="" width="150px" height="150px"></div>
                            <label class=" col-form-label">Passport Photo</label>                        
                         <input type="file" value="choose" required="" name="photo" id="photo">
                         <div class="invalid-feedback">
                         No file selected?
                        </div>
                            </div><br>
                           
                           
                        </div>


                    </div>
                  </div>
                 
                </form>
<div  class="text-center">
                    <button class="btn btnAddStaff btn-primary" id="submit">Submit</button>
                  </div>
  


</div>
          </div>
        </section>
      </div>
    
     
@endsection
@section('js')

<script>
$(document).ready(function(){
  $('.spin').hide();
//adding jobrole
$("#btnAddStaff").on("click", function(event){
      event.preventDefault();
      $('.spin').show();
var form = document.forms.namedItem("addStaff");
var formData = new FormData(form);
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$.ajax({
  type:'post',
    url:'{{URL::to('/')}}/admin/create/staff',
    data:formData, 
    processData: false,
    contentType: false,
    success: function(data){
      if(data == 1){
        $('.spin').hide();
        Fnon.Hint.Success('Staff added successfully. Good Start!', {
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