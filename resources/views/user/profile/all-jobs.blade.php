<?php $page='settings';?>
@extends('user.master')
@section('content')
<?php   use \App\Http\Controllers\JobroleController; ?>

        
        <!---------edit modal------>
    
 <!-- Main Content -->
 <div  class="main-content">
        <section class="section">
          <div class="section-header">
          <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/user/dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="breadcrumb-item " aria-current="page" >All Jobs</a></li>                        
                      </ol>
                    </nav>
           
           
            
          </div>

          <div class="section-body">

           
<div >

<div class="card">
                  <div class="card-header">
                    <h4>All Jobs</h4>                  
                  </div>
                  <div class="card-body">
                  
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
                            <th class="text-center">Min. Salary</th>
                            <th class="text-center">Location</th>
                            <th class="text-center">Status</th>
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
                              <td class="text-center"><a href="{{URL::to('/jobpost')}}/{{$data->id}}">{{$data->job_title}}</a></td>
                             <td class="text-center">{{getObjectName("type",$data->job_type)}}</td>
                               <td class="text-center">{{getObjectName("industry",$data->industry)}}</td>
                               <td class="text-center">{{number_format($data->salary_from)}}</td>
                               <td class="text-center">{{ucfirst($data->location)}}</td>
                             <td class="text-center">@if ($data->status == 0)
                                 <span class="badge badge-secondary">Pending</span>
                             @elseif ($data->status == 2)
                             <span class="badge badge-danger">Rejected</span>
                             @elseif ($data->status == 1)
                             <span class="badge badge-success">Approved</span>
                             @endif</td>
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
                        url:"{{URL::to('/')}}/admin/get-industry-value/"+id,  
                        type:"get",  
                        success:function(data)  
                        {  
                            $('#edit_name').val(data.name);
                          $('#edit_id').val(data.id);
                         

                        }  
                  });  

  });


//adding jobrole
$(".btnAddIndustry").on("click", function(event){
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
    url:'{{URL::to('/')}}/admin/store-industry',
    data:{name:name},
    success: function(data){
      if(data == 1){
        $('.spin').hide();
        $('#exampleModal').modal('hide');
        Fnon.Hint.Success('Industry created successfully. Good Job!', {
          position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'left-bottom', 'center-top', 'center-center', 'center-bottom'
          animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
         callback:function(){
          // callback
          }
        });
location.reload(false);

}else if(data==2) {
    $('.spin').hide();
  Fnon.Hint.Danger('Error detected. Something went wrong', {
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
  
  //adding jobrole
$(".btnUpdateIndustry").on("click", function(event){
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
    url:'{{URL::to('/')}}/admin/update-industry',
    data:{name:name,id:id},
    success: function(data){
      if(data == 1){
        $('.spin').hide();
        $('#exampleModal').modal('hide');
        Fnon.Hint.Success('Industry Updated successfully. Well done!', {
          position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'left-bottom', 'center-top', 'center-center', 'center-bottom'
          animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
         callback:function(){
          // callback
          }
        });
location.reload(false);

}else if(data==2) {
    $('.spin').hide();
  Fnon.Hint.Danger('Error detected. Something went wrong', {
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
  $('.delete-industry').click(function(e){
          e.preventDefault();  
          var el = this;
          var id = $(this).data('id');
          var confirmalert = confirm("Are you sure?");
          if (confirmalert == true) {
              
              
              
                  $.ajax({  
                        url:"{{URL::to('/')}}/admin/delete-industry/"+id,  
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