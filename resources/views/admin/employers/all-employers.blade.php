<?php $page='settings';?>
@extends('admin.master')
@section('content')
<?php   use \App\Http\Controllers\JobroleController; ?>
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add New Employer </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form >

  <div class="form-group">
    <label for="title">Role Title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter role title">
   
  </div>
 
  
</form>
<button type="submit" class="btn btnAddJobRole btn-primary">Save</button>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Dismiss</button>
               
              </div>
            </div>
          </div>
        </div>
 <!-- Main Content -->
 <div  class="main-content">
        <section class="section">
          <div class="section-header">
          <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="breadcrumb-item " aria-current="page" >All Employers</a></li>                        
                      </ol>
                    </nav>
           
           
            
          </div>

          <div class="section-body">

           
<div >

<div class="card">
                  <div class="card-header">
                    <h4>Employers</h4>                  
                  </div>
                  <div class="card-body">
                  
                  <a  href="{{URL::to('admin/add/employer')}}" class="btn btn-primary mb-4" >Add New</a>
               <div class="container">
               <div class="row">
               <div class="col-md-12">

               <div class="table-responsive">
                      <table class="table  table-hover" id="example" >
                        <thead>
                          <tr>
                            <th class="text-center">
                              <i class="fas fa-th"></i>
                            </th>
                            <th class="text-center">Fullname</th>
                            <th class="text-center">Company Name</th>
                            <th class="text-center">Date Joined</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($employers as $data)

                            <tr>
                             <td class="text-center">
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td class="text-center">
                              <td class="text-center"> {{$data->fullname}}</td>
                              <td class="text-center"> {{$data->company}}</td>
                             <td class="text-center">{{ $data->created_at->format('d M Y') }}</td>
                               <td class="text-center">@if ($data->status==1)
                               <div class="badge badge-primary">Active</div>
                               @else
                               <div class="badge badge-secondary">Pending</div> 
                               @endif</td>
                             <td class="text-center">
                             <div class="btn-group custom-dropdown mb-0 dropleft">
                      <div type="button" style="border: none;" class="badge sharp tp-btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="12" cy="5" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="12" cy="19" r="2"/></g></svg>
                           </div>
                           
                      <div class="dropdown-menu dropleft">
                      <a  href="{{URL::to('/admin/edit-employer')}}/{{$data->id}}"  class=" dropdown-item  ">Edit</a>        
                             <a href=""  data-id="{{$data->id}}"   class=" dropdown-item  delete-employer ">Delete</a>
                             <a  href="#" data-id="{{$data->id}}"  class="dropdown-item banUser">@if ($data->status==1)
                        Ban @else Activate
                      @endif</a> 
					 
					 
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
  
//adding jobrole
$(".btnAddJobRole").on("click", function(event){
      event.preventDefault();
//alert('form submit');
var title = $('#title').val();

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$.ajax({
  type:'post',
    url:'save-job-role',
    data:{title:title},
    dataType:'json',
    success: function(data){
      if(data == 1){
        $('#exampleModal').modal('hide');
        Fnon.Hint.Success('Role created successfully. Good Job!', {
          position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'left-bottom', 'center-top', 'center-center', 'center-bottom'
          animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
         callback:function(){
          // callback
          }
        });
location.reload(false);

}else if(data==2) {
  Fnon.Hint.Danger('Error detected. Record might be a duplicate', {
    callback:function(){
    // callback
    }
  });
}else {
  Fnon.Hint.Danger('Error detected. Record might be a duplicate', {
    callback:function(){
    // callback
    }
  });
}

    }

}) ;      
      
      
  });

  //Deleting job-role
  $('.delete-employer').click(function(e){
          e.preventDefault();  
          var el = this;
          var id = $(this).data('id');
          var confirmalert = confirm("Are you sure?");
          if (confirmalert == true) {
              
              
              
                  $.ajax({  
                        url:"{{URL::to('/')}}/admin/delete/employer/"+id,  
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

        $(document).on('click', '.banUser',function(e) {   
    e.preventDefault();
   var userid= $(this).data('id');

            $.ajax({  
                 url:"{{URL::to('/')}}/admin/activate-ban-user/"+userid,  
                 type:"get",  
                 success:function(data)  
                 {  
                   if(data == 1){
                   
                    Fnon.Hint.Success('Done Successfully.', {
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
        
   
  }); 

      });
        
  </script>

@endsection