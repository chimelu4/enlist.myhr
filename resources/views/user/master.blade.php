<?php use Illuminate\Support\Facades\Auth;?>

@include('user.header')
@if ($page != "index")
   @include('user.navbar')
@endif
     
      @yield('css')
      @yield('content')      
    
      
    @include('user.footer')
  @yield('js')