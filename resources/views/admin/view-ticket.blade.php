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
                        <li class="breadcrumb-item " aria-current="page" >Support Ticket</a></li>                        
                      </ol>
                    </nav>
           
           
            
          </div>

          <div class="section-body">

          <h2 class="section-title">Support Ticket</h2>
            <p class="section-lead">
             
            </p>

            <div class="row container">
              <div class="col-md-12">
                <div class="card">
                 
                  <div class="card-body">
                    <a href="#" class="btn btn-primary btn-icon icon-left btn-lg btn-block mb-4 d-md-none" data-toggle-slide="#ticket-items">
                      <i class="fas fa-list"></i> All Tickets
                    </a>
                    <div class="tickets">
                      
                      <div class="ticket-content">
                       @foreach ($dialogs as $dialog)
                       <div class="ticket-header">
                          
                          <div class="ticket-detail">
                            <div class="ticket-title">
                              <h4>{{$dialog->title}}</h4>
                            </div>
                            <div class="ticket-info">
                              <div class="font-weight-600">{{getUserName($dialog->from_bid)}}</div>
                              <div class="bullet"></div>
                              <div class="text-primary font-weight-600">{{$dialog->created_at->diffForHumans()}}</div>
                            </div>
                          </div>
                        </div>
                        <div class="ticket-description">
                          <p>{!!$dialog->message!!}</p>


                       @endforeach
                          <div class="ticket-divider"></div>

                          <div class="ticket-form">
                            <form>
                              <div class="form-group">
                                <textarea class="summernote form-control" placeholder="Type a reply ..."></textarea>
                              </div>
                              <div class="form-group text-right">
                                <button class="btn btn-primary btn-lg">
                                  Reply
                                </button>
                              </div>
                            </form>
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