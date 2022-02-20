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
                        <li class="breadcrumb-item " aria-current="page" >Job Posts</a></li>                        
                      </ol>
                    </nav>
           
           
            
          </div>

          <div class="section-body">

           
<div >

<div class="card">
                  <div class="card-header">
                    <h4>Job Posts</h4>                  
                  </div>
                  <div class="card-body">
                  
                  <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal">Post Job</button>
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
                            <th class="text-center">Title</th>
                            <th class="text-center">Job Type</th>
                            <th class="text-center">Industry</th>
                            <th class="text-center">Company Name</th>
                            <th class="text-center">Application</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($posts as $data)

                            <tr>
                             <td class="text-center">
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td class="text-center">
                              <td class="text-center"> {{$data->job_title}}</td>
                              <td class="text-center"> {{$data->job_type}}</td>
                              <td class="text-center"> {{$data->industry}}</td>
                              <td class="text-center"> {{$data->company_id}}</td>
                              <td class="text-center"> {{$data->applied}}</td>   
                              <td class="text-center"><img src="{{URL::to('/')}}/public/{{$data->image}}" class="table-img" ></td>
                              <td class="text-center"> {{$data->status}}</td>
                             <td class="text-center"><a href="#" data-id="{{$data->id}}"  data-toggle="modal" data-target="#exampleModalEdit" class="btn tablebtn btn-secondary edit">Edit</a>        
                             <a href=""  data-id="{{$data->id}}"   class="btn  tablebtn delete-qualification btn-danger">Delete</a></td>
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
                        url:"{{URL::to('/')}}/admin/get-qualification-value/"+id,  
                        type:"get",  
                        success:function(data)  
                        {  
                            $('#edit_name').val(data.name);
                          $('#edit_id').val(data.id);
                          $('#edit_abbr').val(data.abbr);
                         

                        }  
                  });  

  });


//adding jobrole
$(".btnAddQualification").on("click", function(event){
      event.preventDefault();
      $('.spin').show();
//alert('form submit');
var name = $('#name').val();
var abbr = $('#abbr').val();

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$.ajax({
  type:'post',
    url:'{{URL::to('/')}}/admin/store-qualification',
    data:{name:name,abbr:abbr},
    success: function(data){
      if(data == 1){
        $('.spin').hide();
        $('#exampleModal').modal('hide');
        Fnon.Hint.Success('Qualification added successfully. Good!', {
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
$(".btnUpdateQualification").on("click", function(event){
      event.preventDefault();
      $('.spin').show();
//alert('form submit');

var name = $('#edit_name').val();
var id = $('#edit_id').val();
var abbr = $('#edit_abbr').val();

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$.ajax({
  type:'post',
    url:'{{URL::to('/')}}/admin/update-qualification',
    data:{name:name,id:id,abbr:abbr},
    success: function(data){
      if(data == 1){
        $('.spin').hide();
        $('#exampleModal').modal('hide');
        Fnon.Hint.Success('Qualification Updated successfully. Well done!', {
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
  $('.delete-qualification').click(function(e){
          e.preventDefault();  
          var el = this;
          var id = $(this).data('id');
          var confirmalert = confirm("Are you sure?");
          if (confirmalert == true) {
              
              
              
                  $.ajax({  
                        url:"{{URL::to('/')}}/admin/delete-qualification/"+id,  
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