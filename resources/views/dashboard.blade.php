<?php $page='home';
use Carbon\Carbon;?>
@extends('master')

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
         <div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">Employers Stats -
                    <div class="dropdown d-inline">
                      <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">February</a>
                      <ul class="dropdown-menu dropdown-menu-sm">
                        <li class="dropdown-title">Select Month</li>
                        <li><a href="#" class="dropdown-item">January</a></li>
                        <li><a href="#" class="dropdown-item">February</a></li>
                        <li><a href="#" class="dropdown-item">March</a></li>
                        <li><a href="#" class="dropdown-item">April</a></li>
                        <li><a href="#" class="dropdown-item">May</a></li>
                        <li><a href="#" class="dropdown-item">June</a></li>
                        <li><a href="#" class="dropdown-item">July</a></li>
                        <li><a href="#" class="dropdown-item active">August</a></li>
                        <li><a href="#" class="dropdown-item">September</a></li>
                        <li><a href="#" class="dropdown-item">October</a></li>
                        <li><a href="#" class="dropdown-item">November</a></li>
                        <li><a href="#" class="dropdown-item">December</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">24</div>
                      <div class="card-stats-item-label">Pending</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">52</div>
                      <div class="card-stats-item-label">Approved</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">41</div>
                      <div class="card-stats-item-label">Rejected</div>
                    </div>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-landmark"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>All</h4>
                  </div>
                  <div class="card-body">
                    117
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">candidates Stats -
                    <div class="dropdown d-inline">
                      <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">February</a>
                      <ul class="dropdown-menu dropdown-menu-sm">
                        <li class="dropdown-title">Select Month</li>
                        <li><a href="#" class="dropdown-item">January</a></li>
                        <li><a href="#" class="dropdown-item">February</a></li>
                        <li><a href="#" class="dropdown-item">March</a></li>
                        <li><a href="#" class="dropdown-item">April</a></li>
                        <li><a href="#" class="dropdown-item">May</a></li>
                        <li><a href="#" class="dropdown-item">June</a></li>
                        <li><a href="#" class="dropdown-item">July</a></li>
                        <li><a href="#" class="dropdown-item active">August</a></li>
                        <li><a href="#" class="dropdown-item">September</a></li>
                        <li><a href="#" class="dropdown-item">October</a></li>
                        <li><a href="#" class="dropdown-item">November</a></li>
                        <li><a href="#" class="dropdown-item">December</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">17</div>
                      <div class="card-stats-item-label">Pending</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">12</div>
                      <div class="card-stats-item-label">Approved</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">23</div>
                      <div class="card-stats-item-label">Rejected</div>
                    </div>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>All</h4>
                  </div>
                  <div class="card-body">
                    52
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">Job Posts -
                    <div class="dropdown d-inline">
                      <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">February</a>
                      <ul class="dropdown-menu dropdown-menu-sm">
                        <li class="dropdown-title">Select Month</li>
                        <li><a href="#" class="dropdown-item">January</a></li>
                        <li><a href="#" class="dropdown-item">February</a></li>
                        <li><a href="#" class="dropdown-item">March</a></li>
                        <li><a href="#" class="dropdown-item">April</a></li>
                        <li><a href="#" class="dropdown-item">May</a></li>
                        <li><a href="#" class="dropdown-item">June</a></li>
                        <li><a href="#" class="dropdown-item">July</a></li>
                        <li><a href="#" class="dropdown-item active">August</a></li>
                        <li><a href="#" class="dropdown-item">September</a></li>
                        <li><a href="#" class="dropdown-item">October</a></li>
                        <li><a href="#" class="dropdown-item">November</a></li>
                        <li><a href="#" class="dropdown-item">December</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">249</div>
                      <div class="card-stats-item-label">Pending</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">154</div>
                      <div class="card-stats-item-label">Taken</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">763</div>
                      <div class="card-stats-item-label">Rejected</div>
                    </div>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-chalkboard"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>All</h4>
                  </div>
                  <div class="card-body">
                    1,166
                  </div>
                </div>
              </div>
            </div>
          </div>
         
        
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4>Recent Job Posts</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
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
            <div class="col-md-4">
              <div class="card card-hero">
                <div class="card-header">
                  <div class="card-icon">
                    <i style="color:#fff" class=" far fa-question-circle"></i>
                  </div>
                  <h4>14</h4>
                  <div class="card-description">Support Requests</div>
                </div>
                <div class="card-body p-0">
                  <div class="tickets-list">
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>I haven't recieved the staff yet</h4>
                      </div>
                      <div class="ticket-info">
                        <div>Shola Ahmed</div>
                        <div class="bullet"></div>
                        <div class="text-primary">1 min ago</div>
                      </div>
                    </a>
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>Please cancel my request</h4>
                      </div>
                      <div class="ticket-info">
                        <div>Rita Sani</div>
                        <div class="bullet"></div>
                        <div>2 hours ago</div>
                      </div>
                    </a>
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>I have paid for this month</h4>
                      </div>
                      <div class="ticket-info">
                        <div>Daniel Uzor</div>
                        <div class="bullet"></div>
                        <div>6 hours ago</div>
                      </div>
                    </a>
                    <a href="features-tickets.html" class="ticket-item ticket-more">
                      View All <i class="fas fa-chevron-right"></i>
                    </a>
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