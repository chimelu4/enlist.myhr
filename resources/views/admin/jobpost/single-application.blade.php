<?php $page='job';?>
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
                        <li class="breadcrumb-item " aria-current="page" >Single Application</a></li>                        
                      </ol>
                    </nav>
           
           
            
          </div>

          <div class="section-body">

           
<div >


                
                    <h6 class="m-3 text-primary">Candidate's Application</h6>                  
                
                
                  
                 <div class="container">
               <div class="row">
               <div class="col-md-12">

               <div class=" author-box card-primary">
                  <div class="card-body">
                    <div class="author-box-left">
                 
                      <img src="{{URL::to('/')}}/public/{{$posts->passport}}" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      <a href="#" data-id="{{$posts->id}}" class="btn btn-success mt-3 accept" >Accept</a><br>
                      <a href="#" data-id="{{$posts->id}}" class="btn btn-danger mt-3 reject " >Reject</a>
                    </div>
                    <div class="author-box-details">
                      <div class="author-box-name">
                        <h6 href="#"><b>Name: </b>{{$posts->fullname}}</h6>
                      </div>
                      <div class="author-box-job row">
                          <div class="col-6">
                               <p><b>Position: </b>{{$posts->job_title}}</p>
                          </div>
                           <div class="col-6">
                               <p><b>Date: </b>{{$posts->created_at->diffForHumans()}}</p>
                          </div>
                     
                    
                    </div><hr>
                      <h6 style="color: #3333;">Cover Letter</h6>
                      <div  class="author-box-description p-4">
                         
                        {!!$posts->message!!}
                      </div>
                      <form method="post" action="{{URL::to('/')}}/download-cv">  @csrf
                      <input type="hidden" name="id" value="{{$posts->candidate_id??0}}">
                     <div class="container">
                      <input type="submit" value="Download CV" class="btn btn-primary btn downloa" >
                      
                  </div>
                    </form>
                     
                      <div class="w-100 d-sm-none"></div>
                      <div class="float-right mt-sm-0 mt-3">
                        <a href="{{URL::to('admin/all-applications')}}" class="btn">All Applications <i class="fas fa-chevron-right"></i></a>
                      </div>
                    </div>
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







  //Deleting job-role
  $('.accept').click(function(e){
          e.preventDefault();  
          var el = this;
          var id = $(this).data('id');
          var confirmalert = confirm("This will move this Candidate to the recruiting Company as a staff?");
          if (confirmalert == true) {
              
              
              
                  $.ajax({  
                        url:"{{URL::to('/')}}/admin/assign-job/"+id,  
                        type:"get",  
                        success:function(data)  
                        {  
                          if(data == 1){
                            Fnon.Hint.Success('Assigned successfully.', {
          position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'left-bottom', 'center-top', 'center-center', 'center-bottom'
          animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
         callback:function(){
          // callback
          }
        });
        location.reload(false);
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
  $('.reject').click(function(e){
          e.preventDefault();  
          var el = this;
          var id = $(this).data('id');
          var confirmalert = confirm("This will change status of application to Rejected?");
          if (confirmalert == true) {
              
              
              
                  $.ajax({  
                        url:"{{URL::to('/')}}/admin/reject-job/"+id,  
                        type:"get",  
                        success:function(data)  
                        {  
                          if(data == 1){
                            Fnon.Hint.Success('Application rejected successfully.', {
          position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'left-bottom', 'center-top', 'center-center', 'center-bottom'
          animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
         callback:function(){
          // callback
          }
        });
        location.reload(false);
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