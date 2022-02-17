<?php $page='settings'; ?>
@extends('admin.master')
@section('content')

 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-header">
          <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{URL::to('/admin/all-candidates')}}"><i class="fas fa-list"></i> All Candidates</a></li>
                        <li class="breadcrumb-item " aria-current="page">Add New Candidate</li>
                      </ol>
                    </nav>
         
          </div>

          <div class="section-body">
        
                <div class="card">
                 
                  <div class="card-body" >

                    <div id="accordion"  >
                      <div class="accordion" >                          
          
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true"    >
                          <h4>New Candidate</h4>
                        </div>
                        <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
                  <div class="col-md-12"  >
                  <form name="addCandidate" enctype="multipart/form-data" novalidate=""  >
                  @csrf
                  
                    <div class="card-body">
                      <div class="row">
                          <div class="col-md-8">

                          <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Full Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control"  required="" name="fname" id="fname">
                         
                          <div class="invalid-feedback">
                            What's Staff fullname?
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control"  required="" name="email" id="email">
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
                          <input type="text" class="form-control"  required="" name="phone" id="phone">
                          <div class="invalid-feedback">
                            No phone number!
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">address</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control"  required="" name="addr" id="addr">
                          <div class="invalid-feedback">
                            No valid <address></address>!
                          </div>
                        </div>
                      </div>
                    
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Gender</label>
                        <div class="col-sm-9">
                          <select class="form-control" required="" name="gender" id="gender">
                          <option value="" selected disabled>Choose gender</option>
                              <option value="female" >Female</option>
                              <option value="male" >Male</option>
                          </select>
                          <div class="invalid-feedback">
                            Choose gender for staff!
                          </div>
                        </div>
                      </div>
                          </div>                    
                          <div class="col-md-4">
                              <div class="col-md-12">
                              <div class="photo-holder"><img id="pholder"  width="150px" height="150px"></div>
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
                    <button type="submit" class="btn btn-primary btnAddCandidate mr-2" id="btnAddCandidate"><i class="fa fa-spinner fa-spin spin"></i>Submit</button>
                   
                  
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
//adding jobrole
$("#btnAddCandidate").on("click", function(event){
      event.preventDefault();
      $('.spin').show();
var form = document.forms.namedItem("addCandidate");
var formData = new FormData(form);
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$.ajax({
  type:'post',
    url:'{{URL::to('/')}}/admin/create/candidate',
    data:formData, 
    processData: false,
    contentType: false,
    success: function(data){
      if(data == 1){
        $('.spin').hide();
        Fnon.Hint.Success('Candidate added successfully. Well Done!', {
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