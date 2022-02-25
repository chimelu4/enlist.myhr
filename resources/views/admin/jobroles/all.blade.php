<?php $page='settings';?>
@extends('admin.master')
@section('content')
<?php   use \App\Http\Controllers\JobroleController; ?>
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Role </h5>
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
                        <li class="breadcrumb-item"><a href="{{URL::to('dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="breadcrumb-item " aria-current="page" >All Jobroles</a></li>                        
                      </ol>
                    </nav>
           
           
            
          </div>

          <div class="section-body">

           
<div >

<div class="card">
                  <div class="card-header">
                    <h4>Job Roles</h4>                  
                  </div>
                  <div class="card-body">
                  
                  <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal">Add</button>
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
                            <th class="text-center">Role</th>
                            <th class="text-center">Members With Role</th>
                            <th class="text-center">Created On</th>
                            <th class="text-center">Updated On</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($jobroles as $jobrole)

                            <tr>
                             <td class="text-center">
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td class="text-center">
                              <td class="text-center"> {{$jobrole->name}}</td>
                              <td class="text-center"><div class="badge badge-primary">{{ getJobroleRowNumber($jobrole->id); }}</div></td>
                             <td class="text-center">{{ $jobrole->created_at->format('d M Y') }}</td>
                               <td class="text-center">{{ $jobrole->updated_at->format('d M Y') }}</td>
                             <td class="text-center"><a  href="{{URL::to('/edit-jobrole')}}/{{$jobrole->id}}"  class="btn tablebtn btn-secondary">Edit</a>        
                             <a href=""  data-id="{{$jobrole->id}}"   class="btn  tablebtn delete-jobrole btn-danger">Delete</a></td>
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
  $('.delete-jobrole').click(function(e){
          e.preventDefault();  
          var el = this;
          var id = $(this).data('id');
          var confirmalert = confirm("Are you sure?");
          if (confirmalert == true) {
              
              
              
                  $.ajax({  
                        url:"delete-jobrole/"+id,  
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