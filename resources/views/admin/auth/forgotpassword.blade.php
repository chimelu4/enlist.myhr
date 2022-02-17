<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Reset &mdash; EnlistAndRetain</title>

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
.min-h-screen {
    background-color: #fff !important;
  }
  .w-full{
      border: 1px solid lightgray !important;
      box-shadow: none !important;
      

  }
  button{
     background: rgb(255, 87, 10) !important;
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
  
  <div class="col-md-12" id="app">
    <section style="margin-top: -35px;" class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class=" col-md-12 col-12  min-vh-100  bg-white">
          
          <x-guest-layout >
    <x-jet-authentication-card >
    <x-slot  name="logo">
    <a href="{{URL::to('/')}}" class="ml-5">
    <img width="90" height="35" src="{{URL::to('/')}}/public/frontend/assets/images/footer-logo.png" alt="">
    </a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
<div class="text-danger text-center" id='error'></div>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
<h4><b>Let's help you get back in.</b></h4><br>
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="">
                <x-jet-label for="phone" value="{{ __('Enter Your Email, Username or Phone') }}" />
                <input id="un" class="block mt-1 w-full un" type="text" name="un" required  />
            </div>
            <div >
                        <label>Verify Your Security Question</label>
                        
                          <select class="form-control" name="question" id="question" required>
                          <option value="" selected disabled>choose your question</option>                        
                          <option value="What is your mother's maiden name" >What is your mother's maiden name?</option>                        
                            <option value="What is the name of your first school" > What is the name of your first school?</option>
                            <option value="Who is your favourite secondary school teacher" >Who is your favourite secondary school teacher? </option>
                            <option value="Where did you meet your spouse" >Where did you meet your spouse? </option>
                        
                          </select>
                          <div class="invalid-feedback">
                            Choose one security question!
                          </div>
                        
                      </div> 
             <div class="">
                <x-jet-label for="answer" value="{{ __('Your Answer') }}" />
                <input id="answer" class="block mt-1 w-full answer" type="text" name="answer" required  />
            </div>

            <div class="mt-4">
                <x-jet-label for="pass" value="{{ __('New Password') }}" />
                <input id="password" class="block mt-1 w-full password" type="password" name="password"  required autofocus />
            </div>

            <div class="">
                <x-jet-label for="password" value="{{ __('Confirm Password') }}" />
                <input id="cpassword" class="block mt-1 w-full password" type="password" name="cpassword" required  />
                <x-jet-checkbox  onclick="myFunction()"/> <span class="ml-2 text-sm text-gray-600">{{ __('Show Password') }}</span>
            </div>
           
<div class="row mt-5">

<div class="col-md-6">
            <a href="{{URL::to('/login')}}" class="btn  text-primary">Back to Login</a>
            </div>


<div class="flex items-center justify-end col-md-6">
             <x-jet-button class="ml-4 reset" >
                    {{ __('Reset') }}
                </x-jet-button>
            </div>
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
  <script src="{{URL::to('/')}}/public/assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{URL::to('/')}}/public/assets/js/scripts.js"></script>
  <script src="{{URL::to('/')}}/public/assets/js/custom.js"></script>
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
 
  $(".reset").click(function(e){
    e.preventDefault();
    
    var id = $("#userid").val();
    var password = $("#password").val();
    var cpassword = $("#cpassword").val();
    var question = $("#question").find(":selected").val();
    var answer = $("#answer").val();
    var un = $("#un").val();

                               if(un ==""){
                                $("#error").text('Enter phone or username.');
                               }else if(question ==""){
                                $("#error").text('Choose a security question.');
                               }else if(answer ==""){
                                $("#error").text('Answer the question.');
                               }else if(password != cpassword){
                                $("#error").text('Passwords do not match');
                               }else if(password.length<=8){
                               $("#error").text('Passwords must be more than 8 characters.');
                               }else{
                                $("#error").text('');
                                $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
                                $.ajax({  
         url:"reset-password-post",  
         type:"post",  
         data:{password:password,question:question,answer:answer,un:un},
  
         success:function(data)  
         {  
           if(data == 0){  
             $("#error").text('Bad gateway.');
       }else if(data ==1) {
           alert("Password changed successfully. Login to continue")
        $(location).prop('href', 'dashboard');
       // $("#error").text(data);
       }else{
        $("#error").text(data);
       }

         }  
    }); 
                               }
   
 
 });

});

</script>
  <!-- Page Specific JS File -->
</body>
</html>
