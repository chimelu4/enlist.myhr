<?php $page='home';
use Carbon\Carbon;?>
@extends('user.master')

@section('css')
<style>
.alice{
        background:rgb(240, 252, 225);
        color:#000;
      }
      .gray{
        background:lightgray;
        color:#000 !important;
      }
      .gray a{
        color:#000;
        font-weight:bold;
      }
</style>
@endsection

@section('content')

         <!-- Main Content -->
         @if (Auth::user()->account_type==1)
         <div class="main-content">
        <section class="section mt-3">
          
        
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4>Recent Job Posts</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-danger">Post New Job <i class="fas fa-file"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>Job ID</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Action</th>
                      </tr>
                      <tr>
                        <td><a href="#">465</a></td>
                        <td class="font-weight-600">Accounting Officer</td>
                        <td><div class="badge badge-secondary">Pending</div></td>
                        <td>July 19, 2022</td>
                        <td>
                          <a href="#" class="btn btn-primary">view</a>
                        </td>
                      </tr>
                       <tr>
                        <td><a href="#">466</a></td>
                        <td class="font-weight-600">Office Clerk</td>
                        <td><div class="badge badge-success">Approved</div></td>
                        <td>May 20, 2022</td>
                        <td>
                          <a href="#" class="btn btn-primary">view</a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">467</a></td>
                        <td class="font-weight-600">Driver</td>
                        <td><div class="badge badge-success">Approved</div></td>
                        <td>March 13, 2022</td>
                        <td>
                          <a href="#" class="btn btn-primary">view</a>
                        </td>
                      </tr>
                     
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-4 col-sm-12">
            <h2 class="section-title">Hi, User</h2>
            <p class="section-lead">
              Summary of your activities on EnlistAndRetain.
            </p>
            <div class="card profile-widget">
                  <div class="profile-widget-header">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Posts</div>
                        <div class="profile-widget-item-value">187</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Hires</div>
                        <div class="profile-widget-item-value">64</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Reviews</div>
                        <div class="profile-widget-item-value">21</div>
                      </div>
                    </div>
                  </div>
                
                  <div class="card-footer text-center">
                    <div class="font-weight-bold mb-2">Your Job stats</div>
                    <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-github mr-1">
                      <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-instagram">
                      <i class="fab fa-instagram"></i>
                    </a>
                  </div>
                </div>
            </div>
         
          </div>
        </section>
      </div>
         @else
         <div class="main-content">
        <section class="section mt-3">
          
        
          <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Monitor Your Career Progress</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-danger">Search Newb Job <i class="fas fa-search"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>Job Title</th>
                        <th>Company Name</th>
                        <th>Date Started</th>
                        <th>End Date</th>
                        <th>Job Type</th>
                        <th>Status</th>
                        <th>Rating</th>
                        <th>Action</th>
                      </tr>
                      <tr>
                        <td>Accounting Officer</td>
                        <td>AA and Steel Industry</td>
                        <td>July 19, 2020</td>
                        <td>June 19, 2021</td>
                        <td>Full Time</td>
                        <td><div class="badge badge-secondary">Completed</div></td>
                        <td>*****</td>
                        <td>
                          <a href="#" class="btn btn-primary">view</a>
                        </td>
                      </tr> 
                      <tr>
                        <td>Accounting Officer</td>
                        <td>AA and Steel Industry</td>
                        <td>July 30, 2021</td>
                        <td>June 19, 2023</td>
                        <td>Full Time</td>
                        <td><div class="badge badge-success">Active</div></td>
                        <td>*****</td>
                        <td>
                          <a href="#" class="btn btn-primary">view</a>
                        </td>
                      </tr>
                     
                    </table>
                  </div>
                </div>
              </div>
            </div>
           
         
          </div>
        </section>
      </div>
         @endif

@endsection
@section('js')
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
 $('#switch').on('change',function(e){
e.preventDefault()
var text = $('.switch-text').html();

$.ajax({  
                        url:"set-settings-deduction",  
                        type:"get",  
                        success:function(data)  
                        { 
                          
                         if(data==1){
                          $('.switch-text').html('Stop Deductions');
                         }else if(data==0){
                           $('.switch-text').html('Start Deductions');
                         }
                         
                        }  
                  });  
 });
  $("#dateSelectPicker").datepicker({
    format: "yyyy-mm-dd"
  }).on('changeDate', function(e) {
    var date = $("#dateSelectPicker").val();    
    $('.datepicker').hide();
    $.ajax({  
                        url:"get-business-stat-daily/"+date,  
                        type:"get",  
                        success:function(data)  
                        { 
                          
                          $('.transfer_count_daily').html(data.transfer);
                          $('.deposit_count_daily').html(data.deposit);
                          $('.withdrawal_count_daily').html(data.withdrawal);
                          $('.capex_count_daily').html(data.capex);
                          $('.opex_count_daily').html(data.opex);
                          $('.salary_count_daily').html(data.salary);
                          $('.ammort_count_daily').html(data.ammort);
                          $('.rev_count_daily').html(data.rev);
                          $('.var_count_daily').html(data.var);
                         
                        }  
                  });  
    });
                $("#monthSelectPicker").datepicker({
                  format: "yyyy-mm",
                  startView: "months", 
                  minViewMode: "months"
                }).on('changeDate', function(e) {
    var month = $("#monthSelectPicker").val();    
    $('.datepicker').hide();
    
    $.ajax({  
                        url:"get-business-stat-monthly/"+month,  
                        type:"get",  
                        success:function(data)  
                        { 
                          
                          $('.transfer_count_monthly').html(data.transfer);
                          $('.deposit_count_monthly').html(data.deposit);
                          $('.withdrawal_count_monthly').html(data.withdrawal);
                          $('.capex_count_monthly').html(data.capex);
                          $('.opex_count_monthly').html(data.opex);
                          $('.salary_count_monthly').html(data.salary);
                          $('.ammort_count_monthly').html(data.ammort);
                          $('.rev_count_monthly').html(data.rev);
                          $('.var_count_monthly').html(data.var);
                         
                        }  
                  });  
    });  


                $("#yearSelectPicker").datepicker({
                  format: "yyyy",
                  startView: "years", 
                  minViewMode: "years"
                }).on('changeDate', function(e) {
    var year = $("#yearSelectPicker").val();    
    
    $('.datepicker').hide();
    
    $.ajax({  
                        url:"get-business-stat-yearly/"+year,  
                        type:"get",  
                        success:function(data)  
                        { 
                          
                          $('.transfer_count_yearly').html(data.transfer);
                          $('.deposit_count_yearly').html(data.deposit);
                          $('.withdrawal_count_yearly').html(data.withdrawal);
                          $('.capex_count_yearly').html(data.capex);
                          $('.opex_count_yearly').html(data.opex);
                          $('.salary_count_yearly').html(data.salary);
                          $('.ammort_count_yearly').html(data.ammort);
                          $('.rev_count_yearly').html(data.rev);
                          $('.var_count_yearly').html(data.var);
                         
                        }  
                  });  
    });    
           

$('.month').on('click', function(){
  var month = $(this).data('id');
 
  $.ajax({  
                        url:"get-business-stat/"+month,  
                        type:"get",  
                        success:function(data)  
                        { 
                          $('.cluster_count').html(data.cluster);
                          $('.staff_count').html(data.staff);
                         $('.outlet_count').html(data.outlet);
                         $('.biz-stats').html(data.month);
                         $('.income').html(data.income);
                         $('.expenses').html(data.expenses);
                         $('.capex').html(data.capex+"<span style='font-size: 10px;'>%</span>");
                         $('.opex').html(data.opex+"<span style='font-size: 10px;'>%</span>");
                         $('.charges').html(data.charges+"<span style='font-size: 10px;'>%</span>");
                         
                        }  
                  });  

});

$('#outlet').on('click', function(){
  var outlet = $(this).val();
 
  $.ajax({  
                        url:"get-daily-report-stat/"+outlet,  
                        type:"get",  
                        success:function(data)  
                        { 
                          $('.opening_table').html(data.opening);
                          $('.closing_table').html(data.closing);
                         
                        }  
                  });  

});


$('.analysis').on('click', function(e){
  e.preventDefault();
  $('.cash').toggle();
});
});
</script>

@endsection