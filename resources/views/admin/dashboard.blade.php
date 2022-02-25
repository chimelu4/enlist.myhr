<?php $page='home';
use Carbon\Carbon;?>
@extends('admin.master')

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
                   
                  </div>
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">{{getStat("employer","active")}}</div>
                      <div class="card-stats-item-label"><span class="badge">Active</span></div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">{{getStat("employer","deactivated")}}</div>
                      <div class="card-stats-item-label">Banned</div>
                    </div>
                  
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-landmark"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total</h4>
                  </div>
                  <div class="card-body">
                  {{getStat("employer","total")}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">candidates Stats -
                  
                  </div>
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">{{getStat("candidate","active")}}</div>
                      <div class="card-stats-item-label"><span class="badge">Active</span></div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">{{getStat("candidate","deactivated")}}</div>
                      <div class="card-stats-item-label"><span class="badge">Banned</span></div>
                    </div>
                   
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total</h4>
                  </div>
                  <div class="card-body">
                  {{getStat("candidate","total")}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">Job Posts -
                  
                  </div>
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">{{getStat("jobpost","published")}}</div>
                      <div class="card-stats-item-label"><span class="badge">Published</span></div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">{{getStat("jobpost","taken")}}</div>
                      <div class="card-stats-item-label"><span class="badge">Taken</span></div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">{{getStat("jobpost","expired")}}</div>
                      <div class="card-stats-item-label"><span class="badge">Expired</span></div>
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
                  {{getStat("jobpost","total")}}
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
                    <a href="{{URL::to('/admin/all-job-posts')}}" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                  <table class='table table-striped'>
                  {!!getRecentPosts()!!}
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
                  <h4>{{getTotalApplication()}}</h4>
                  <div class="card-description">Job Applications</div>
                </div>
               {!!applicationRequest()!!}
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