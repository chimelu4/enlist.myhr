<?php use Illuminate\Support\Facades\Auth;?>

@include('admin.header')
@if ($page != "index")
   @include('admin.navbar')
@endif
     
      @yield('css')
      @yield('content')      
    
      
    @include('admin.footer')
  @yield('js')