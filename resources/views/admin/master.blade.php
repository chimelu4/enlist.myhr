<?php use Illuminate\Support\Facades\Auth;?>

@if( Auth::user()->status !=1)
    @php
        header("Location: " . URL::to('/admin/logout'), true, 302);
        exit();
    @endphp
          
          
@endif

@include('admin.header')
@if ($page != "index")
   @include('admin.navbar')
@endif
     
      @yield('css')
      @yield('content')      
    
      
    @include('admin.footer')
  @yield('js')