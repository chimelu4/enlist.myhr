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
                        <li class="breadcrumb-item " aria-current="page" >all Reviews</a></li>                        
                      </ol>
                    </nav>
           
           
            
          </div>

          <div class="section-body">

           
<div >

<div class="card">
                  <div class="card-header">
                    <h4>Reviews</h4>                  
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
                            <th class="text-center">from</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">message</th>
                            <th class="text-center">Reference</th>
                            <th class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($tickets as $data)

                            <tr>
                             <td class="text-center">
                              <div class="sort-handler">
                                <i class="fas fa-th"></i>
                              </div>
                            </td class="text-center">
                              <td class="text-center"> {{getUserName($data->from_bid)}}</td>
                              <td class="text-center"> {{ $data->title}}</td>
                              <td class="text-center"> {{ $data->message}}</td>
                              <td class="text-center"> {{$data->ref}}</td> 
                             <td class="text-center">
                          <div class="btn-group custom-dropdown mb-0 dropleft">
                      <div type="button" style="border: none;" class="badge sharp tp-btn  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="12" cy="5" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="12" cy="19" r="2"/></g></svg>
                           </div>
                           
                      <div class="dropdown-menu dropleft">
                      <a  href="{{URL::to('/admin/view-ticket')}}/{{$data->id}}"  class=" dropdown-item  ">View</a>               
                             <a href=""  data-id="{{$data->id}}"   class=" dropdown-item  delete-post ">Delete</a>
                              
					 
					 
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
  $('.spin').hide();







  //Deleting job-role
  $('.delete-post').click(function(e){
          e.preventDefault();  
          var el = this;
          var id = $(this).data('id');
          var confirmalert = confirm("Are you sure?");
          if (confirmalert == true) {
              
              
              
                  $.ajax({  
                        url:"{{URL::to('/')}}/admin/delete-post/"+id,  
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