<?php  
   use \App\Http\Controllers\HomeController;
    ?> 
<div class="main-sidebar custom-sidebar ">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{URL::to('/')}}"><img  src="{{URL::to('public/assets/img/LOGO-23D.png')}}" style="width: auto;" alt="" class="thumbnail-sm img-responsive mt-2" ></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{URL::to('/')}}">ER</a>
          </div>
         @if (Auth::user()->account_type==1)
         <ul  class="sidebar-menu ">
          
          <li class="menu-header" >Menu</li>
          <li><a class="nav-link <?php echo $page=="home"?'active':'';?>" href="{{URL::to('dashboard')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
         <li class="nav-item dropdown ">
            <a href="#" class="nav-link <?php echo $page=="accounts"?'active':'';?> has-dropdown"> <i class="fas fa-landmark"></i><span>Manage Staff</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{URL::to('create-account')}}">All Staff</a></li>                
            </ul>
          </li> 
           <li class="nav-item dropdown ">
            <a href="#" class="nav-link <?php echo $page=="pendings"?'active':'';?> has-dropdown">  <i class="fas fa-users"></i><span>Job Posts</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{URL::to('unposted-report')}}">Create New</a></li>
              <li class="active"><a class="nav-link" href="{{URL::to('unremmitted-variance')}}">All Job Post</a></li>                  
            </ul>
          </li>
            <li  class="nav-item dropdown ">
            <a href="#" class="nav-link <?php echo $page=="reports"?'active':'';?> has-dropdown"><i class="fa fa-list"></i><span>About</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{URL::to('opening-reports')}}">My Profile</a></li>                  
              <li><a class="nav-link" href="{{URL::to('opening-reports')}}">My Company</a></li>                  
            </ul>
          </li>           
          <li class="menu-header">Administration</li>
          
          <li><a class="nav-link" href="{{ route('user.logout') }}"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
        </ul>
         @elseif(Auth::user()->account_type==2)
         <ul  class="sidebar-menu ">
          
          <li class="menu-header" >Menu</li>
          <li><a class="nav-link <?php echo $page=="home"?'active':'';?>" href="{{URL::to('dashboard')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
         <li class="nav-item dropdown ">
            <a href="#" class="nav-link <?php echo $page=="accounts"?'active':'';?> has-dropdown"> <i class="fas fa-landmark"></i><span>My Applications</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{URL::to('create-account')}}">Jobs Update</a></li>                
              <li><a class="nav-link" href="{{URL::to('create-account')}}">Jobs Applied</a></li>                
              <li><a class="nav-link" href="{{URL::to('create-account')}}">Jobs Rejected</a></li>                
            </ul>
          </li> 
           
            <li  class="nav-item dropdown ">
            <a href="#" class="nav-link <?php echo $page=="reports"?'active':'';?> has-dropdown"><i class="fa fa-list"></i><span>About Me</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{URL::to('opening-reports')}}">My Profile</a></li>                  
              <li><a class="nav-link" href="{{URL::to('opening-reports')}}">My CV</a></li>                      
            </ul>
          </li>           
          <li class="menu-header">links</li>
          
          <li><a class="nav-link" href="{{ route('user.logout') }}"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
        </ul>
        
         @endif

           
        </aside>
      </div>
      