<?php $page='settings';?>
@extends('admin.master')
@section('content')
<?php   use \App\Http\Controllers\JobroleController; ?>
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Job Type </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form >

  <div class="form-group">
    <label for="title">Name</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter name">
   
  </div>
 
  
</form>
<button type="submit" class="btn btnAddJobType btn-primary"><i class="fa fa-spinner fa-spin spin"></i>Save</button>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Dismiss</button>
               
              </div>
            </div>
          </div>
        </div>
        
        <!---------edit modal------>
        
        <div class="modal fade" tabindex="-1" role="dialog" id="exampleModalEdit">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Job Type </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form >

  <div class="form-group">
    <label for="title">Name</label>
    <input type="text" class="form-control" id="edit_name" name="edit_name" aria-describedby="emailHelp" placeholder="Enter name">
    <input type="hidden" class="form-control" id="edit_id" name="edit_name"  >
   
  </div>
 
  
</form>
<button type="submit" class="btn btnUpdateJobType btn-primary"><i class="fa fa-spinner fa-spin spin"></i>update</button>
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
                        <li class="breadcrumb-item"><a href="{{URL::to('/admin/dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="breadcrumb-item " aria-current="page" >All Job Types</a></li>                        
                      </ol>
                    </nav>
           
           
            
          </div>

          <div class="section-body">

           
<div >

<div class="card">
                  <div class="card-header">
                    <h4>Job Types</h4>                  
                  </div>
                  <div class="card-body">
                  
                  <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal">Add New</button>
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
                            <th class="text-center">Name</th>
                            <th class="text-center">Created On</th>
                            <th class="text-center">Updated On</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($types as $data)

                            <tr>
                             <td class="text-center">
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td class="text-center">
                              <td class="text-center"> {{$data->name}}</td>
                             <td class="text-center">{{ $data->created_at->format('d M Y') }}</td>
                               <td class="text-center">{{ $data->updated_at->format('d M Y') }}</td>
                             <td class="text-center"><a href="#" data-id="{{$data->id}}"  data-toggle="modal" data-target="#exampleModalEdit" class="btn tablebtn btn-secondary edit">Edit</a>        
                             <a href=""  data-id="{{$data->id}}"   class="btn  tablebtn delete-job-type btn-danger">Delete</a></td>
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