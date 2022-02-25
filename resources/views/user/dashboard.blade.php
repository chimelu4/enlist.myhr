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
            <div class="col-md-8 col-xl-10 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Your Job Posts</h4>
                  <div class="card-header-action">
                    <a href="{{URL::to('/user/company/hires')}}" class="btn btn-danger ">My Hires <i class="fas fa-users ml-2"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                   {!!getCompanyJobs(Auth::user()->id)!!}
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
                  <h4>Recent jobs post</h4>
                  <div class="card-header-action">
                    <a href="{{URL::to('/')}}" class="btn btn-danger">Search New Jobs post <i class="fas fa-search"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                  {!!showUserRecentPost()!!}
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
 
});
</script>

@endsection