<?php use Carbon\Carbon;?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>EnlistAndRetain &mdash; Admin</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" integrity="sha512-Fppbdpv9QhevzDE+UHmdxL4HoW8HantO+rC8oQB2hCofV+dWV2hePnP5SgiWR1Y1vbJeYONZfzQc5iII6sID2Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('../node_modules/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../node_modules/summernote/dist/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('../node_modules/owl.carousel/dist/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../node_modules/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
 <!-- CSS Libraries -->
 <link rel="stylesheet" href="{{ asset('../node_modules/ionicons201/css/ionicons.min.css') }}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrapicons.css') }}">
  <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('public/assets/css/custom.css') }}">
  <link rel="stylesheet" href="{{ asset('public/assets/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('public/assets/css/fnon.min.css') }}">




</head>

<body>@if ($page !="index")
  <div id="app">
    <div class="main-wrapper">
      <div  class="navbar-bg"></div>
  
  <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" id="search-input"  aria-label="Search" data-width="350">
            <button class="btn" type="submit"><i class="fas fa-search fl-left"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
              <div class="search-header" style="height:100px">
                Search for anything..
              </div>
           
              
              
            </div>
          </div>
        </form>
        @if (Session::has('success'))
    <div class="alert alert-primary">
       
            {{ Session::get('success') }}
       
    </div>
@endif
 @if (Session::has('errors'))
    <div class="alert alert-primary">
      
            {{ Session::get('errors') }}
       
    </div>
@endif
        <ul class="navbar-nav navbar-right">
        
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" <?php ?>  ><span style="font-size: 12px;">no messages</span><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="{{URL::to('notifications-mark-read')}}">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons notification">
              {--userMessages()--}
              </div>
              <div class="dropdown-footer text-center">
                <a href="{{URL::to('notifications')}}">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li  class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img style="width: 30px; height:30px" alt="image" src="{{URL::to('/')}}/public/{{Auth::user()->passport??''}}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hello, {{explode(" ",Auth::user()->fullname??"")[0]}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in {{--Auth::user()->last_login->diffForHumans()??""--}}</div>
              <a href="{{URL::to('/edit-staff')}}/{{Auth::user()->id??1}}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> My Profile
              </a>
              
              <div class="dropdown-divider"></div>
              <a href="{{ route('user.logout') }}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
  @endif
      