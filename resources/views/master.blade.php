<?php use Illuminate\Support\Facades\Auth;?>

@include('header')
@if ($page != "index")
   @include('navbar')
@endif
     
      @yield('css')
      @yield('content')      
    
      
    @include('footer')
  @yield('js')