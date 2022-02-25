<?php use Illuminate\Support\Facades\Auth;?>

@if( Auth::user()->status !=1)
    @php
        header("Location: " . URL::to('/logout'), true, 302);
        exit();
    @endphp
          
          
@endif


@include('user.header')
@if ($page != "index")
   @include('user.navbar')
@endif
     
      @yield('css')
      @yield('content')      
    
      
    @include('user.footer')
  @yield('js')