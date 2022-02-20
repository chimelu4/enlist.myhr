<?php $page='settings'; ?>
@extends('admin.master')
@section('content')

 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-header">
          <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/all-staff')}}"><i class="fas fa-list"></i> All Staff</a></li>
                        <li class="breadcrumb-item " aria-current="page">Edit Staff</li>
                      </ol>
                    </nav>
         
          </div>

          <div class="section-body">
        
                <div class="card">
                 
                  <div class="card-body" >

                    <div id="accordion"  >
                      <div class="accordion" >
                          
          
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true"    >
                          <h4>Personal Data</h4>
                        </div>
                        <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
                  <div class="col-md-12"  >
                  <form name="userUpdateInfo" enctype="multipart/form-data" novalidate=""  >
                  @csrf
                  <div class="card-header">
                    </div>
                    <div class="card-body">
                      <div class="row">
                          <div class="col-md-8">

                          <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Full Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="{{$data->fullname}}" required="" name="fname" id="fname">
                          <input type="hidden" class="form-control" value="{{$data->id}}"  name="id" id="id">
                          <div class="invalid-feedback">
                            What's Staff fullname?
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" value="{{$data->email}}" required="" name="email" id="email">
                          <div class="invalid-feedback">
                            Oh no! Email is invalid.
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                          <small class="text-danger text-center" id="unerror"></small>
                          <input type="text" class="form-control" value="{{$data->username}}" required="" name="uname" id="uname">
                          <div class="invalid-feedback">
                            Select a username for staff!
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Phone Number</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="{{$data->phone}}" required="" name="phone" id="phone">
                          <div class="invalid-feedback">
                            No phone number!
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">address</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="{{$data->address}}" required="" name="addr" id="addr">
                          <div class="invalid-feedback">
                            No valid <address></address>!
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Salary</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" value="{{$data->salary}}" required="" name="salary" id="salary">
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
                              <option value="female" {{ ( $data->gender == "female") ? 'selected' : '' }}>Female</option>
                              <option value="male" {{ ( $data->gender == "male") ? 'selected' : '' }}>Male</option>
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
                        <option selected disabled>Choose</option>
                        @foreach ($jobroles as $jobrole)
                          <option value="{{$jobrole->id}}" {{ ( $data->job_role == $jobrole->id) ? 'selected' : '' }}>{{$jobrole->name}}</option>
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
                              <div class="photo-holder"><img id="pholder" src="{{URL::to('/')}}/public/{{$data->passport}}" width="150px" height="150px"></div>
                              <label class=" col-form-label">Passport Photo</label>                        
                           <input type="file"   required="" name="photo" id="photo">
                           <div class="invalid-feedback">
                           No file selected?
                          </div>
                              </div>
                             
                          </div>


                      </div>
                    </div>                    
                  </form>
                  <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary btnUpdateUser mr-2" id="btnUpdateUser"><i class="fa fa-spinner fa-spin spin"></i>Update</button>
                   
                    <button class="btn btn-danger " id="resetUserPassword">Reset Password</button>
                   
                  
                    </div>
                  </div>     
                  
                
                        </div>
                      </div>

                      <!---------------------password------------------------------->
                     @if ($data->bid == Auth::user()->bid)
                     <div class="accordion">
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-4" aria-expanded="" >
                          <h4>Security</h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-body-4" data-parent="#accordion">
                        <div class="col-md-12"  >
                  <form   >
                 
                  <div class="card-header">
                    </div>
                    <div class="card-body">
                      <div class="row">
                          <div class="col-md-8">
                          <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Old Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control"   name="oldp" id="oldp">
                          <div class="invalid-feedback">
                            What's your old password?
                          </div>
                        </div>
                      </div>
                       <div class="form-group row">
                        <label class="col-sm-3 col-form-label">New Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control"   name="newp" id="newp">
                          <div class="invalid-feedback">
                          </div>
                        </div>
                      </div>
                       <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Confirm New Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control"   name="cnewp" id="cnewp">
                          <div class="invalid-feedback">
                            
                          </div>
                        </div>
                      </div>
                 </div>
                    </div>                   
                  </form>
                  <div class="card-footer text-right">
                <button class="btn changep btn-primary mr-2" >
                <i class="fa fa-spinner fa-spin spin"></i> Change</button>                    
                    </div>
                </div>
                        </div>
                      </div>
                      </div>
                     @endif
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
    $("#btnUpdateUser").on("click", function(event){
      event.preventDefault();
      $('.spin').show();
var form = document.forms.namedItem("userUpdateInfo");
var formData = new FormData(form);
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$.ajax({
  type:'post',
    url:'{{URL::to('/')}}/admin/update/staff',
    data:formData, 
    processData: false,
    contentType: false,
    success: function(data){
      if(data == 1){
        $('.spin').hide();
        Fnon.Hint.Success('Staff updated successfully. Good Job!', {
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
              url:"{{URL::to('/')}}/admin/reset-admin-password/"+id,
          
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


  //adding idType
  $(".changep").on("click", function(event){
    event.preventDefault();
    $('.spin').show();
var oldp = $('#oldp').val();
var newp = $('#newp').val();
var cnewp = $('#cnewp').val();

$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
type:'post',
  url:'{{URL::to('/')}}/admin/security-check-password-change',
  data:{oldp:oldp,newp:newp,cnewp:cnewp},
  success: function(data){
    if(data == 1){
      $('.spin').hide();
      Fnon.Hint.Success('Password changed successfully. Well Done!', {
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