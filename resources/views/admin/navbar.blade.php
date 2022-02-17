<?php  
   use \App\Http\Controllers\HomeController;
    ?> 
<div class="main-sidebar custom-sidebar ">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{URL::to('/')}}"><img  src="{{URL::to('public/assets/img/LOGO-23D.png')}}" style="width: auto;" alt="" class="thumbnail-sm img-responsive mt-2" ></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{URL::to('/')}}">vp</a>
          </div>
          <ul  class="sidebar-menu ">
          
              <li class="menu-header" >Menu</li>
              <li><a class="nav-link <?php echo $page=="home"?'active':'';?>" href="{{URL::to('/admin/dashboard')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
             <li class="nav-item dropdown ">
                <a href="#" class="nav-link <?php echo $page=="accounts"?'active':'';?> has-dropdown"> <i class="fas fa-landmark"></i><span>Manage Employers</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{URL::to('admin/all-employers')}}">All Employers</a></li>
                  <li><a class="nav-link" href="{{URL::to('admin/add/employer')}}">New Employer</a></li>                 
                </ul>
              </li> 
               <li class="nav-item dropdown ">
                <a href="#" class="nav-link <?php echo $page=="pendings"?'active':'';?> has-dropdown">  <i class="fas fa-users"></i><span>Manage Candidates</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{URL::to('admin/all-candidates')}}">All Candidates</a></li>
                  <li class="active"><a class="nav-link" href="{{URL::to('admin/add-candidate')}}">New Candidate</a></li>                  
                </ul>
              </li>
                <li  class="nav-item dropdown ">
                <a href="#" class="nav-link <?php echo $page=="reports"?'active':'';?> has-dropdown"><i class="fa fa-list"></i><span>Manage Jobs</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{URL::to('admin/all-job-posts')}}">All Job Posts</a></li>
                  <li class="active"><a class="nav-link" href="{{URL::to('admin/post-job')}}">Post Job</a></li>                  
                </ul>
              </li>           
              <li class="menu-header">Administration</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link <?php echo $page=="transactions"?'active':'';?> has-dropdown" data-toggle="dropdown"><i class="fas fa-funnel-dollar"></i> <span>Manage Users</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{URL::to('admin/all-staff')}}">All Users</a></li>
                  <li><a class="nav-link" href="{{URL::to('admin/add-staff')}}">Create User</a></li>
                </ul>
              </li> 
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown <?php echo $page=="settings"?'active':'';?>"><i class="fas fa-cog"></i> <span>Settings</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link " href="{{URL::to('admin/all-industries')}}">Industries</a></li>
                  <li><a class="nav-link" href="{{URL::to('admin/job-categories')}}">Job categories</a></li>
                  <li><a class="nav-link" href="{{URL::to('admin/all-job-types')}}">Job types</a></li>
                  <li><a class="nav-link" href="{{URL::to('admin/all-qualifications')}}">Qualifications</a></li>  
             
                </ul>
              </li>  
             <li><a class="nav-link <?php echo $page=="report"?'active':'';?>" href="{{URL::to('admin/report')}}"><i class="fas fa-file-alt"></i> <span>Reports</span></a></li>
              
              <li><a class="nav-link" href="{{ route('admin.logout') }}"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
            </ul>

           
        </aside>
      </div>
      