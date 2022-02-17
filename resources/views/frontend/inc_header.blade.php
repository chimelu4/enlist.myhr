<!DOCTYPE html>
<html lang="en">

<head>
  <title>index</title>
  @include('frontend.inc_metadata')
  </head>

<body>
<div class="body-inner">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Enlist and Retain -- Apply and get the right jobs in major cities." name="description">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta content="Jobs, Careers, CV, Professionals, Entrepreneur, Work Ethics, Enlist and Retain" name="keywords">

    <div style="display:none" id="top-bar" class="top-bar">
        <div class="container">
          <div class="row">
              <div  class="col-lg-8 col-md-8">
                <ul class="top-info text-center text-md-left">
                    <li><i class="fas fa-map-marker-alt"></i> <p class="info-text">No. 215 Konoko Crescent, off Ademola Adetokunbo, Wuse II, ABUJA</p>
                    </li>
                </ul>
              </div>
              <!--/ Top info end -->
  
              <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
                <ul class="list-unstyled">
                    <li>
                      <a title="Facebook" href="#">
                          <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                      </a>
                      <a title="Twitter" href="#">
                          <span class="social-icon"><i class="fab fa-twitter"></i></span>
                      </a>
                      <a title="Instagram" href="#">
                          <span class="social-icon"><i class="fab fa-instagram"></i></span>
                      </a>
                      <a title="Linkedin" href="#">
                          <span class="social-icon"><i class="fab fa-linkedin"></i></span>
                      </a>
                    </li>
                </ul>
              </div>
              <!--/ Top social end -->
          </div>
          <!--/ Content row end -->
        </div>
        <!--/ Container end -->
    </div>
    <!--/ Topbar end -->

<!-- Header start -->
<header id="header" class="header-one">
    <div class="bg-white">
      <div class="container">
        <div class="logo-area">
            <div class="row align-items-center">
              <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                  <a class="d-block" href="index">
                    <img loading="lazy" src="{{URL::to('/')}}/public/frontend/assets/images/logo.png" alt="Constra">
                  </a>
              </div><!-- logo end -->
    
              <div class="col-lg-9 header-right">
                  <ul class="top-info-box">
                    <li>
                      <div class="info-box">
                        <div class="info-box-content">
                            <p class="info-box-title">Call Us</p>
                            <p class="info-box-subtitle">+2349135840920</p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="info-box">
                        <div class="info-box-content">
                            <p class="info-box-title">Email Us</p>
                            <p class="info-box-subtitle">contact@enlistandretain.com.com</p>
                        </div>
                      </div>
                    </li>
                    <li class="last">
                      <div class="info-box last">
                        <div class="info-box-content">
                            <p class="info-box-title">Global Certificate</p>
                            <p class="info-box-subtitle">ISO 9001:2017</p>
                        </div>
                      </div>
                    </li>
                   
                  </ul><!-- Ul end -->
              </div><!-- header right end -->
            </div><!-- logo area end -->
    
        </div><!-- Row end -->
      </div><!-- Container end -->
    </div>
  
    <div style="background-color:#ff4500"class="site-navigation">
    <div  class="container">
        <div class="row">
          <div class="col-lg-12">
              <nav class="navbar navbar-expand-lg navbar-dark  p-0 ml-4">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div id="navbar-collapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav mr-auto">
                      <li class="nav-item dropdown <?php if($page=="home"){echo "active";} ?>">
                          <a href="{{URL::to('/')}}" class="nav-link dropdown-toggle" >Home </a>
                          
                      </li>
                      <li class="nav-item dropdown <?php if($page=="about"){echo "active";} ?>">
                          <a href="{{URL::to('/about')}}" class="nav-link dropdown-toggle" >About Us </a>
                          
                      </li>
                      <li class="nav-item dropdown <?php if($page=="services"){echo "active";} ?>">
                          <a href="{{URL::to('/services')}}" class="nav-link dropdown-toggle" >Our Services </a>
                          
                      </li>
                      <li class="nav-item dropdown <?php if($page=="pricing"){echo "active";} ?>">
                          <a href="{{URL::to('/pricing')}}" class="nav-link dropdown-toggle" >Pricing </a>
                          
                      </li>
                      <li class="nav-item dropdown <?php if($page=="contact"){echo "active";} ?>">
                          <a href="contact" class="nav-link dropdown-toggle" >Contact </a>
                          
                      </li>

                     
                    </ul>
                   <div  class="call flex-wrap">
                   <div class="btn-group" role="group" aria-label="Basic example">
                   <div class="mr-1">
                      <a class="btn btn-dark" href="{{URL::to('/login')}}"><i class="text-white fa fa-sign-out-alt"></i>Login</a>
                      </div>
                   <div class="no-bullets dropdown ">
                          <a href="#" class=" dropdown-toggle btn btn-dark" data-toggle="dropdown">Register </a>
                          <ul class="dropdown-menu " role="menu">
                            <li class="no-bullets"><a href="{{URL::to('register')}}/employer" class="nav-link emp-reg " data-id="1" href="">As Employer</a></li>
                            <li class="no-bullets"><a  href="{{URL::to('register')}}/candidate" class="nav-link  can-reg" data-id="2" href="">As Candidate</a></li>
                          </ul>
                      </div>
</div>
                   
                     

                   
                     
                   </div>
                </div>                
              </nav>                         
             
          </div>
        <div style="display: none;" class="m-auto top-category">
        <div role="group" aria-label="Basic example" class="btn-group group-top-link btn-group-justified">
  <a href="#" class="btn btn-top-link"><i  class="fa fa-square m-1 "></i>Banking & Finance</a>
  <a href="#"  class="btn btn-top-link"><i class="fa fa-square m-1"></i>Technology</a>
  <a href="#"  class="btn btn-top-link"><i class="fa fa-square m-1"></i>Ecommerce</a>
  <a href="#"  class="btn btn-top-link"><i class="fa fa-square m-1"></i>Business</a>
  <a  href="#"  class="btn btn-top-link"><i class="fa fa-square m-1"></i>Law Firms</a>
  <a  href="#"  class="btn btn-top-link"><i class="fa fa-square m-1"></i>Sales and Marketing</a>
  <a  href="#"  class="btn btn-top-link"><i class="fa fa-square m-1"></i>Civil Servants</a>
 
      </div>
        </div>
        
        </div>
      
        <!--/ Row end -->

        
     <div class="container logo-enlist">
     <div class="nav-search" style=" z-index:1999;">
            <span ><img src="{{URL::to('/')}}/public/frontend/assets/images/preloader.png"></i></span>
          </div><!-- Search end -->
     </div>
        <!-- Site search end -->
    </div>
    <!--/ Container end -->

  </div>
    <!--/ Navigation end -->
  </header>