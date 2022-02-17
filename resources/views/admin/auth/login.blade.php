<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; EnlistAndRetain</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="{{ URL::to('/') }}/public/assets/css/style.css">
  <link rel="stylesheet" href="{{URL::to('/')}}/public/frontend/assets/css/style.css">
  <!-- Extra styling for the services page  -->
  <link rel="stylesheet" href="{{ URL::to('/') }}/public/assets/css/custom.css">
  <link rel="stylesheet" href="{{ URL::to('/') }}/public/assets/css/components.css">
  <link rel="stylesheet" href="{{ URL::to('/') }}/public/assets/css/fnon.min.css">
 
</head>
<style >
body{
    margin-top:20px;
}
.account-block {
    padding: 0;
    background-image: url('../public/frontend/assets/images/auth/login.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height: 100%;
    position: relative;
}
.account-block .overlay {
    -webkit-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
}
.account-block .account-testimonial {
    text-align: center;
    color: #fff;
    position: absolute;
    margin: 0 auto;
    padding: 0 1.75rem;
    bottom: 3rem;
    left: 0;
    right: 0;
}

.text-theme {
    color: #ff4500 !important;
}
.main-wrapper{
 max-width:400px;
}
.overlay-logo{
  z-index: 9999;
}
  </style>
 
<div id="main-wrapper" >
<a href="{{URL::to('/')}}" class="ml-5">
    <img width="70" height="30" src="{{URL::to('/')}}/public/frontend/assets/images/footer-logo.png" alt="">
    </a>
    <div class="row justify-content-center pt-5">
        <div class="col-xl-10 col-md-10 col-sm-12">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-5">
                            <div class="p-4">
                               <div class="mb-2">
                                    <!---<img width="100" height="50" src="{{URL::to('/')}}/public/frontend/assets/images/footer-logo.png" alt="">--->
                                </div>

                                <h4 class=" mb-4 text-primary">Admin Panel</h4>
                                
                                @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-center text-danger">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <p class="text-muted mt-2 mb-2">Enter your email address and password to access admin panel.</p>

                                <form method="POST" action="{{ route('admin.signin') }}">
                                @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Your Email Address</label>
                                        <input type="text" class="form-control" id="email" required autofocus name="email" :value="{{ old('username') ?: old('email') }}">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" >
                                    </div>
                                    <div class="row">
                                    <div class="col-12 ">
                                    <x-jet-checkbox id="remember_me" name="remember" />
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>              
                                    </div>
                                      <div class="col-6 float-left">
                                      <x-jet-checkbox  onclick="myFunction()"/> <span class="ml-2 text-sm text-gray-600">{{ __('Show Password') }}</span>
                                      </div>
                                    
                                </div>
                                <div class="text-danger text-center mb-2" id='error'></div>
                                    <button type="submit" class="btn btn-primary login">Login</button>
                                    <a href="{{URL::to('admin/forgot-my-password')}}" class="forgot-link float-right text-primary">Forgot password?</a>
                                </form>                 
           
                            </div>
           
                        </div>

                        <div class="col-lg-7 d-none d-lg-inline-block">
                            <div class="account-block rounded-right">
                                <div class="overlay rounded-right"></div>
                                <!---<div class="account-testimonial">
                                    <h4 class="text-white mb-4">This  beautiful theme yours!</h4>
                                    <p class="lead text-white">"Best investment i made for a long time. Can only recommend it for other users."</p>
                                    <p>- Admin User</p>
                                </div>-->
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->

            <!-- end row -->

        </div>
        <!-- end col -->
    </div>
    <!-- Row -->
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
  $(".logiln").click(function(e){
  e.preventDefault();
  
  var email = $("#email").val();
  var password = $("#password").val();

 
  $.ajax({  
       url:"check-admin-login/"+email+"/"+password,  
       type:"post",
       data:{email:email,password:password},
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