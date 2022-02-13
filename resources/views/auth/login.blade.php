<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; EnlistAndRetain</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">

  <link rel="stylesheet" href="{{ URL::to('/') }}/public/assets/css/style.css">
  <link rel="stylesheet" href="{{ URL::to('/') }}/public/assets/css/custom.css">
  <link rel="stylesheet" href="{{ URL::to('/') }}/public/assets/css/components.css">
  <link rel="stylesheet" href="{{ URL::to('/') }}/public/assets/css/fnon.min.css">
 
</head>
<style >
.min-h-screen {
    background-color: #fff !important;
  }
  .w-full{
      border: 1px solid lightgray !important;
      box-shadow: none !important;
      

  }
  button{
     background:#ff4500 !important;
  }
  @media(max-width:1100px){
  .thumbnail{
   
width: 40% !important;
   margin-right: 40px;
   padding-right: 30px;
   padding-left: 10px;
   padding-top: 10px;
   display: none;
}
}
.thumbnail{
   
  width: 50% !important;
   margin-right: 90px;
   padding-right: 45px;
   padding-left: 15px;
   padding-top: 15px;
}

.version{
  background: #000;
  color: #fff;
  border-radius: 20px;
  float: left;
  padding: 0px;
  width: 100px;
  margin-left: 10px;
  margin-top: 10px;
  margin-bottom: 10px;
  text-align: center;
  z-index: 999999;
  font-size: 12px;
}
.version-holder{
  position:relative; 
  z-index:9999999
}
 
  </style>
<body>

<div class="row">

<div  class=" version-holder col-md-12">
<p class="version">Version 1.5</p>
</div>

  <div class="col-md-12" id="app">
    <section style="margin-top: -35px;" class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div  class=" col-md-12 col-12  min-vh-100  bg-white">
       
          <x-guest-layout >
    <x-jet-authentication-card >
        <x-slot  name="logo">
        <a href="{{URL::to('/')}}"><img  src="{{URL::to('public/assets/img/LOGO-23D.png')}}" style="width: 200px; height:70px; " alt="" class="thumbnail-sm img-responsive mt-2" ></a>
          
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
<div class="text-danger text-center" id='error'></div>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-center text-danger">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email | Username') }}" />
                <input id="email" style="border-radius: 10px;" class="block mt-1 w-full" type="text" name="email" :value="{{ old('username') ?: old('email') }}" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <input id="password" style="border-radius: 10px;" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="row">
                <div class="col-12 ">
                 <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>              
                </div>
                   <div class="col-12">
                   <x-jet-checkbox  onclick="myFunction()"/> <span class="ml-2 text-sm text-gray-600">{{ __('Show Password') }}</span>
                   </div>
                
            </div>

            <div class="row mt-5">
            <div class="col-md-6">
            <a href="{{URL::to('forgot-my-password')}}" class="btn  btn-icon text-primary">Forgot Password?</a>
            </div>
            <div class="col-md-6">
            <div class="flex items-center justify-end ">
               

               <x-jet-button class="ml-4 login">
                   {{ __('Log in') }}
               </x-jet-button>
           </div></div>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
          
        </div>
        <img style="display: none;" class="thumbnail" src="{{ asset('public/assets/img/unsplash/login-bg2.jpg') }}" >
        
      </div>
    </section>
  </div>

</div>
 
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{URL::to('public/assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{URL::to('public/assets/js/scripts.js')}}"></script>
  <script src="{{URL::to('public/assets/js/custom.js')}}"></script>
  <script>
 function myFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    } 
    
$(document).ready(function(){
 //alert('ready');
  $(".login").click(function(e){
  e.preventDefault();
  
  var email = $("#email").val();
  var password = $("#password").val();

 
  $.ajax({  
       url:"check-admin-login/"+email+"/"+password,  
       type:"get",  
       success:function(data)  
       {  
         if(data == 0){  
           $("#error").text('Bad gateway.')
     }else if(data ==1) {
          $(".login").unbind('click').click();
     }

       }  
  });  
});
});

</script>
  <!-- Page Specific JS File -->
</body>
</html>
