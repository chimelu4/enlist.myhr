<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; EnlistAndRetain</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">

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
    background-image: url('../public/frontend/assets/images/auth/users2.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height: 100%;
    position: relative;
}
@media only screen and (max-width: 992px){
    .mobile{
        background: #ff4500;
        color: #fff !important;
        padding: 5px;
        font-size: 11px;
        text-align: center;
    }
}
.form-group{
    margin-bottom:3px;
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
@media(min-width:574px){
    .register-card{
        padding: 5px;
    }
}
  </style>
 
<div id="main-wrapper" >
<a href="{{URL::to('/')}}" class="ml-2">
    <img width="70" height="30" src="{{URL::to('/')}}/public/frontend/assets/images/footer-logo.png" alt="">
    </a>
    <div class="row justify-content-center register-card">
        <div class="col-xl-10 col-md-10 col-sm-12">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="p-4">
                               <div class="mb-2">
                                    <!---<img width="100" height="50" src="{{URL::to('/')}}/public/frontend/assets/images/footer-logo.png" alt="">--->
                                </div>

                                <h4 class=" mb-4">Create <span class="text-primary">{{ucfirst($type)}}</span> Account!</h4>
                               
                                @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-center text-danger">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="mobile text-muted mt-2 mb-2">
                                     <p >All fields are required.</p>

                                </div>
                                <form method="POST" class="reg-form" action="{{ route('user.signup') }}">
                                @csrf
                                   <div class="row">
                                   <div class="form-group col-xl-6 col-md-6 ol-sm-12">
                                        <label for="exampleInputEmail1">FullName</label>
                                        <input type="text" placeholder="Enter Fullname" class="form-control fname" id="fname" required autofocus name="fname" :value="{{  old('fname') }}">
                                    </div>
                                   <div class="form-group col-xl-6 col-md-6 ol-sm-12">
                                        <label for="exampleInputEmail1">Your Email Address</label>
                                        <input type="email" placeholder="you@someplace.com"  class="form-control email" id="email" required autofocus name="email" :value="{{ old('email') }}">
                                    </div>                                   

                                   </div>
                                   <div class="row">
                                   <div class="form-group col-xl-6 col-md-6 ol-sm-12">
                                        <label for="exampleInputEmail1">Username</label>
                                        <input type="text" placeholder="Choose Username"  class="form-control un" id="un" required autofocus name="un" :value="{{  old('un') }}">
                                    </div>
                                    <div class="form-group col-xl-6 col-md-6 col-sm-12">
                                        <label for="exampleInputEmail1">Gender</label>
                                     <select class="form-control gender" name="gender">
                                    <option selected disabled>Select Gender</option>
                                    
                                    <option selected disabled>Choose</option> 
                                    <option value="female">Female</option> 
                                    <option value="male">Male</option> 
                                    <option value="other">Other</option> 
                                    
                                                                        </select> </div>
                                   </div>
                                   <div class="row">
                                   <div class="form-group mb-2 col-xl-6 col-md-6 ol-sm-12">
                                        <label for="exampleInputPassword1">Choose Password</label>
                                        <input type="password" placeholder="********" class="form-control password" id="password" name="password" >
                                    </div> 
                                    <div class="form-group mb-2 col-xl-6 col-md-6 ol-sm-12">
                                        <label for="exampleInputPassword1">Confirm Password</label>
                                        <input type="password" placeholder="********"  class="form-control password" id="cpassword" name="cpassword" >
                                    </div>                                   
                                   </div>
                                   <div class="row ">
                                        <div  class="form-group col-xl-6 col-md-6 col-sm-12">
                                     <input type="hidden" class="form-control type" 
                                     @if ($type=="employer")
                                         value="1"
                                     @else
                                     value="2"
                                     @endif name="type">
                                    </div>
                                       
                                   <div class="col-xl-6 col-md-6 ol-sm-12">
                                      <x-jet-checkbox  onclick="myFunction()"/> <span class="ml-2 text-sm text-gray-600">{{ __('Show Password') }}</span>
                                      </div>
                                   </div>
                                   

                                   
                                    <div class="row">
                                    
                                    
                                    
                                </div > 
                                <div class="mt-3 ml-3">
                                 <div class="text-danger text-center mb-2" id='error'></div>
                                <button type="submit" class="btn btn-primary reg"> <i class="fa fa-spinner fa-spin spin"></i>Register</button>
                                </div>                               
                                 </form>
                                
                                                    
            <p class="text-muted text-center  ">Already have an account? <a href="{{URL::to('login')}}" class="text-primary ml-1">Login</a></p>

                            </div>
           
                        </div>

                        <div class="col-lg-5 d-none d-lg-inline-block">
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
  <script src="{{ asset('public/assets/js/fnon.min.js') }}"></script>
  <script>
function myFunction() {
      var x = document.getElementsByClassName("password");
      for (var i= 0; i < x.length; i++) {
        if (x[i].type === "password") {
        x[i].type = "text";
      } else {
        x[i].type = "password";
      }
}
      
    } 
    
$(document).ready(function(){
 $('.spin').hide();
  $(".reg").click(function(e){
  e.preventDefault();
  $('.spin').show();
  var fname = $(".fname").val();
  var email = $(".email").val();
  var un = $(".un").val();
  var gender = $(".gender").val();
  var type = $(".type").val();
  var password = $(".password").val();
  var cpassword = $("#cpassword").val();

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  $.ajax({  
       url:"../user/checkreg",  
       type:"POST",  
       data:{fname:fname,email:email,un:un,gender:gender,type:type,password:password,cpassword:cpassword},
       success:function(data)  
       {  
        
  
 
         if(data == 1){  
            $('.spin').hide();
     $(".reg").unbind('click').click();
     }else  {
        $('.spin').hide();
        Fnon.Hint.Danger(data, {
  position: 'center-center', // 'right-top', 'right-center', 'right-bottom', 'left-top', 'left-center', 'left-bottom', 'center-top', 'center-center', 'center-bottom'
        animation: 'slide-left', //'fade', 'slide-top', 'slide-bottom', 'slide-right' and 'slide-left'
       callback:function(){
        // callback
        }
});
     }

       }  
  });  
});
});

</script>
  <!-- Page Specific JS File -->
</body>
</html>
