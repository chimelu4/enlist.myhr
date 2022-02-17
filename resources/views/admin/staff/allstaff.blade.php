<?php $page="allstaff"; ?>
@extends('admin.master')
@section('content')
<?php   use \App\Http\Controllers\JobroleController; ?>
<?php   use \App\Http\Controllers\IdentificationController; ?>

 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div  class="section-header">
          <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                       <li class="breadcrumb-item actie" aria-current="page">All Staff</li>
                      </ol>
                    </nav>
          </div>

          <div class="section-body">

           
<div ><div class="card">
                  
                  <div class="card-body">
                  <a class="btn btn-primary mb-4" href="{{URL::to('add-staff')}}">New Staff</a>

                  <h6 class="ml-3">All Members</h6>
               <div class="container">
               <div class="row">
               <div class="col-md-12">

               <div class="table-responsive">
                      <table class="table  table-hover" id="example">
                        <thead >
                          <tr>
                            <th >
                              <i class="fas fa-th"></i>
                            </th>
                            <th>Name</th>
                            <th>Photo</th>
                            <th>Username</th>
                            <th>Phone</th>
                            <th>Job Role</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                       @foreach ($admin as $user)
                          <tr>
                             <td>
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td>
                              <td> {{$user->fullname}}</td>
                              <td class="text-center"><img src="{{URL::to('/')}}/public/{{$user->passport}}" class="table-img" ></td>
                              <td>{{$user->username}} </td>
                              <td>{{$user->phone}} </td>
                              <td>{{getRowName($user->job_role); }} </td>
                              <td>
                                 @if($user->status=='1')
                                <span class="badge badge-success ">Active</span>
                                @else  <span class="badge badge-secondary">Inactive</span>
                              @endif 
                            </td>
                             <td>
                             <div class="btn-group custom-dropdown mb-0 dropleft">
                      <div type="button" style="border: none;" class="badge sharp tp-btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="12" cy="5" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="12" cy="19" r="2"/></g></svg>
                           </div>
                           
                      <div class="dropdown-menu dropleft">
                      <a  href="#" data-id="{{$user->id}}"  class="dropdown-item banUser">@if ($user->status==1)
                        Ban @else Activate
                      @endif</a>               
                      <a  href="{{URL::to('/admin/edit-staff')}}/{{$user->id}}"  class="dropdown-item">Edit</a>               
                             <a href=""  data-id="{{$user->id}}"   class="dropdown-item delete-user ">Delete</a>
                      </div>
                    </div>
                             </td>
                            </tr>
                          
                       @endforeach
                           
                          
                                              
                          
                        </tbody>
                      </table>
                    </div>










               
               </div>
               
               
               </div>
               
               </div>   
     </div>
                </div>
</div></div>
          </div>
        </section>
      </div>
     
@endsection
@section('js')
<script>
$(document).ready(function(){
   //restore account
   $(document).on('click', '.restore-user',function(e){
          e.preventDefault();  
          var el = this;
          var id = $(this).data('id');
          var confirmalert = confirm("Are you sure?");
          if (confirmalert == true) {
              
              
              
                  $.ajax({  
                        url:"restore-user/"+id,  
                        type:"get",  
                        success:function(data)  
                        {  
                          if(data == 1){
                          
                              // Remove row from HTML Table
      $(el).closest('tr').css('background','tomato');
      $(el).closest('tr').fadeOut(800,function(){
        $(this).remove();});

                      }else {
                        Fnon.Hint.Danger('Error detected. ', {  
                          position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'left-bottom', 'center-top', 'center-center', 'center-bottom'
        animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
       
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