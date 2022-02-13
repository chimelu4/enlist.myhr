<?php
$page="home";
?>
@extends('frontend.inc_master')
@section('content')
@section('css')
<style>
body{
  background:#fff;
}
</style>
@endsection
<!--/ Header end -->

<!-- Contents here -->

<div class="banner-carousel banner-carousel-1 mb-0">
  <div class="banner-carousel-item" style="background-image:url('public/frontend/assets/images/slider-main/services.jpg');">
    <div class="slider-content text-right">
        <div class="container h-100">
          <div class="row align-items-center h-100">
              <div class="col-md-12 ">
                <h2  class="slide-title" data-animation-in="slideInDown"><span  style="background-color: #ff4500 !important; padding:5px; color:#fff; font-weight:bold;"class="p-2">Get Your Dream Job. </span></h2>
                <h3 class="slide-sub-title" data-animation-in="slideInRight">Register And Work With Us.</h3>
                <!---<p data-animation-in="slideInLeft" data-duration-in="1.2">
                    <a href="submitcv" class="slider btn btn-top">Submit CV</a>
                    <a href="postjob" class="slider btn btn-top border">Post a Job</a>
                </p>--->
              </div>
          </div>
        </div>
    </div>
  </div>

  <div class="banner-carousel-item" style="background-image:url('public/frontend/assets/images/slider-main/bg2.jpg')">
    <div class="slider-content text-left">
        <div class="container h-100">
          <div class="row align-items-center h-100">
              <div class="col-md-12">
                <h2 class="" data-animation-in="slideInDown">Get Enlisted</h2>
                <h3 class="slide-title" data-animation-in="fadeIn"><span  style="background-color: #ff4500 !important; padding:5px; color:#fff; font-weight:bold;"> With Top Companies</span></h3>
                <h3 class="slide-sub-title" data-animation-in="slideInLeft">Send Us Your CV</h3>
               <!-- <p data-animation-in="slideInRight">
                    
                <a href="submitcv" class="slider btn btn-top">Submit CV</a>
                    <a href="postjob" class="slider btn btn-top border">Post a Job</a>
                </p>--->
              </div>
          </div>
        </div>
    </div>
  </div>

  <div class="banner-carousel-item" style="background-image:url('public/frontend/assets/images/slider-main/bg3.jpg')">
    <div class="slider-content text-right">
        <div class="container h-100">
          <div class="row align-items-center h-100">
              <div class="col-md-12">
                <h2  class="slide-title" data-animation-in="slideInDown"><span style="background-color: #ff4500 !important; padding:5px; color:#fff; font-weight:bold;"> Lets Manage Your Crew</span></h2>
                <h3 class="slide-sub-title" data-animation-in="fadeIn">We believe in sustainability</h3>
                <p class="slider-description lead" data-animation-in="slideInRight">Our payment structures are flexible and affordable.</p>
               <!--- <div data-animation-in="slideInLeft">
                    <a href="postjob" class="slider btn btn-top" aria-label="contact-with-us">Post a Job</a>
                    <a href="submitcv" class="slider btn btn-top border" aria-label="learn-more-about-us">Submit CV</a>
                </div>-->
              </div>
          </div>
        </div>
    </div>
  </div>
</div>

<section class="call-to-action-box no-padding">
  <div   class="container">
    <div class="action-style-box">
        <div class="row align-items-center">
        <h4 class="ml-2 action-title ">Search Jobs Opening</h4> 
          <div class=" ml-3 text-center ">
          <form> 
           
  <div class="btn-group flex-wrap ">    
    <select class="form-control location mr-1 col-xl-3" name="location" >
      <option disabled selected>Select State</option>
      <option value="Federal Capital Territory">Federal Capital Territory</option>
    </select>
    <select class="form-control location mr-1 col-xl-3" name="industry" >
    <option disabled selected>Select Industry</option>
      <option value="accounting">Accounting</option>
    </select>    
    <input type="text" class="form-control search mr-1 col-xl-3" placeholder="Enter key word">
    <div class="input-group-append">
      <a  class="btn btn-dark">Search</a>
    </div>
  </div>
</form> 
          </div><!-- Col end -->
         
        </div><!-- row end -->
    </div><!-- Action style box -->

   
  </div>
 
  <!-- Container end -->
</section><!-- Action end -->

<section id="ts-features" class="ts-features">
<div class=" result mt-5">
    <h3 class="ml-5 text-left">Recent Job Posts</h3><hr class="ml-5 mr-5">
  <div class="row">
    <div class="col-xl-3 col-md-3 col-sm-12 side-menu">
<p style="font-size:14px" class="ml-5"><i class="fa fa-search mr-1"></i>Sort results by </p>
    <div class="container ">


<!--Accordion wrapper-->
<div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

  <!-- Accordion card -->
  <div class="card">

    <!-- Card header -->
    <div class="card-header card-no-bg" role="tab" id="headingOne1">
      <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
         aria-controls="collapseOne1">
        <h5 class="mb-0 ">
         Category <i class="fas fa-angle-down rotate-icon "></i>
        </h5>
      </a>
    </div>

    <!-- Card body -->
    <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
         data-parent="#accordionEx">
      <div class="card-body">
      <ul class="no-bullets">
      <li><b>All Categories</b></li>
      <li>Category 1</li>
      <li>Category 2</li>
      <li>Category 3</li>
      <li>Category 4</li>
      <li>Category 5</li>
</ul>
      </div>
    </div>

  </div>
  <!-- Accordion card -->

  <!-- Accordion card -->
  <div class="card">

    <!-- Card header -->
    <div class="card-header card-no-bg" role="tab" id="headingTwo2">
      <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
         aria-expanded="false" aria-controls="collapseTwo2">
        <h5 class="mb-0">
          Job Type <i class="fas fa-angle-down rotate-icon"></i>
        </h5>
      </a>
    </div>

    <!-- Card body -->
    <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
         data-parent="#accordionEx">
      <div class="card-body">
      <ul class="no-bullets">
<li ><input type="checkbox" class="mr-1">Full-Time</li>
<li><input type="checkbox" class="mr-1">Part-Time</li>
<li><input type="checkbox" class="mr-1">Intern</li>

</ul>
      </div>
    </div>

  </div>
  <!-- Accordion card -->

  <!-- Accordion card -->
  <div class="card">

    <!-- Card header -->
    <div class="card-header card-no-bg" role="tab" id="headingThree3">
      <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3"
         aria-expanded="false" aria-controls="collapseThree3">
        <h5 class="mb-0">
          Salary <i class="fas fa-angle-down rotate-icon"></i>
        </h5>
      </a>
    </div>

    <!-- Card body -->
    <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"
         data-parent="#accordionEx">
      <div class="card-body">
   <div class="box text-left">
   <ul class="no-bullets"><li><label>From:</lable></li>
   <li><input type="number" placeholder="0" class=""></li>
   <li><label>To:</lable></li>
   <li><input type="number" placeholder="500000" class=""></li></ul>
   </div>
   
   
      </div>
    </div>

  </div>
  <!-- Accordion card -->

</div>
<!-- Accordion wrapper -->

</div>
    </div>
    <div class="col-xl-9 col-md-9 col-sm-12">
    
    <div  class="col-xl-10 col-md-10 col-sm-12 ">
      <div  class="btn-group btn-group-justified">
  <a type="button" class="btn btn-dark ">This week</a>
  <a type="button" class="btn btn-dark">This Month</a>
  <a type="button" class="btn btn-dark">This Year</a>
  <a type="button" class="btn btn-dark">Any Time</a>
</div> 
      </div>
    
    <div class="container mt-5 mb-3">
    <div class="row">
        <div class="col-md-4">
            <div class="card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="ms-2 c-details">
                            <h6 class="mb-0">Accounting</h6> <span>1 days ago</span>
                        </div>
                    </div>
                    <a href="#"><div class="badge"> <span>Apply </span> </div></a>
                </div>
                <div class="img">
                  <img  src="{{URL::to('/')}}/public/frontend/assets/images/dwn.jpg" alt="">
                </div>
                <div class="">
                    <h6 class="heading">Senior Accountant</h6>
                    <p class="heading text-secondary">Location:FCT - Garki</p>
                    <div class="mt-5">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="mt-3"> <span class="text1">32 Applied <span class="text2">of 50 capacity</span></span> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        <div class="card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                    <div class="ms-2 c-details">
                            <h6 class="mb-0">Hospitality</h6> <span>3 days ago</span>
                        </div>
                    </div>
                    <a href="#"><div class="badge"> <span>Apply </span> </div></a>
                </div>
                <div class="img">
                  <img  src="{{URL::to('/')}}/public/frontend/assets/images/dwn2.jpg" alt="">
                </div>
                <div class="">
                    <h6 class="heading">Supervisor</h6>
                    <p class="heading text-secondary">Location:FCT - Lokogoma</p>
                    
                    <div class="mt-5">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="mt-3"> <span class="text1">122 Applied <span class="text2">of 200 capacity</span></span> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        <div class="card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="ms-2 c-details">
                            <h6 class="mb-0">Ecommerce</h6> <span>1 days ago</span>
                        </div>
                    </div>
                    <a href="#"><div class="badge"> <span>Apply </span> </div></a>
                </div>
                <div class="img">
                  <img  src="{{URL::to('/')}}/public/frontend/assets/images/dwn3.jpg" alt="">
                </div>
                <div class="5">
                    <h6 class="heading">Marketing Manager</h6>
                    <p class="heading text-secondary">Location:FCT - Kuje</p>
                    <div class="mt-5">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="mt-3"> <span class="text1">23 Applied <span class="text2">of 50 capacity</span></span> </div>
                    </div>
                </div>
            </div>
        </div>
        <!------second row ------>
        <div class="col-md-4">
            <div class="card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="ms-2 c-details">
                            <h6 class="mb-0">Accounting</h6> <span>1 days ago</span>
                        </div>
                    </div>
                    <a href="#"><div class="badge"> <span>Apply </span> </div></a>
                </div>
                <div class="img">
                  <img  src="{{URL::to('/')}}/public/frontend/assets/images/dwn.jpg" alt="">
                </div>
                <div class="m">
                    <h6 class="heading">Senior Accountant</h6>
                    <p class="heading text-secondary">Location:FCT - Garki</p>
                    <div class="mt-5">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="mt-3"> <span class="text1">32 Applied <span class="text2">of 50 capacity</span></span> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        <div class="card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                    <div class="ms-2 c-details">
                            <h6 class="mb-0">Hospitality</h6> <span>3 days ago</span>
                        </div>
                    </div>
                    <a href="#"><div class="badge"> <span>Apply </span> </div></a>
                </div>
                <div class="img">
                  <img  src="{{URL::to('/')}}/public/frontend/assets/images/dwn2.jpg" alt="">
                </div>
                <div class="m5">
                    <h6 class="heading">Supervisor</h6>
                    <p class="heading text-secondary">Location:FCT - Lokogoma</p>
                    
                    <div class="mt-5">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="mt-3"> <span class="text1">122 Applied <span class="text2">of 200 capacity</span></span> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
        <div class="card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="ms-2 c-details">
                            <h6 class="mb-0">Ecommerce</h6> <span>1 days ago</span>
                        </div>
                    </div>
                    <a href="#"><div class="badge"> <span>Apply </span> </div></a>
                </div>
                <div class="img">
                  <img  src="{{URL::to('/')}}/public/frontend/assets/images/dwn3.jpg" alt="">
                </div>
                <div class="mt-">
                    <h6 class="heading">Marketing Manager</h6>
                    <p class="heading text-secondary">Location:FCT - Kuje</p>
                    <div class="mt-5">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="mt-3"> <span class="text1">23 Applied <span class="text2">of 50 capacity</span></span> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
  </div>
  </div>

  
</section><!-- Feature are end -->

<section style="display: none;" id="facts" class="facts-area dark-bg ">
  <div class="container">
    <div class="facts-wrapper">
        <div class="row">
          <div class="col-md-3 col-sm-6 ts-facts">
              <div class="ts-facts-img">
                <img loading="lazy" src="{{URL::to('/')}}/public/frontend/assets/images/icon-image/fact1.png" alt="facts-img">
              </div>
              <div class="ts-facts-content">
                <h2 class="ts-facts-num"><span class="counterUp" data-count="1789">0</span></h2>
                <h3 class="ts-facts-title">Happy Clients</h3>
              </div>
          </div><!-- Col end -->

          <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-sm-0">
              <div class="ts-facts-img">
                <img loading="lazy" src="{{URL::to('/')}}/public/frontend/assets/images/icon-image/fact2.png" alt="facts-img">
              </div>
              <div class="ts-facts-content">
                <h2 class="ts-facts-num"><span class="counterUp" data-count="647">0</span></h2>
                <h3 class="ts-facts-title">Recruits & Staff</h3>
              </div>
          </div><!-- Col end -->

          <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
              <div class="ts-facts-img">
                <img loading="lazy" src="{{URL::to('/')}}/public/frontend/assets/images/icon-image/fact3.png" alt="facts-img">
              </div>
              <div class="ts-facts-content">
                <h2 class="ts-facts-num"><span class="counterUp" data-count="12">0</span></h2>
                <h3 class="ts-facts-title">Years of Experience</h3>
              </div>
          </div><!-- Col end -->

          <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
              <div class="ts-facts-img">
                <img loading="lazy" src="{{URL::to('/')}}/public/frontend/assets/images/icon-image/fact4.png" alt="facts-img">
              </div>
              <div class="ts-facts-content">
                <h2 class="ts-facts-num"><span class="counterUp" data-count="44">0</span></h2>
                <h3 class="ts-facts-title">Partners</h3>
              </div>
          </div><!-- Col end -->

        </div> <!-- Facts end -->
    </div>
    <!--/ Content row end -->
  </div>
  <!--/ Container end -->
</section><!-- Facts end -->

<!-- The incoming section till (Project area end) was commented out in the css code -->



<section class="content">
  <div class="container">
    <div class="row">
        <div class="col-lg-6">
          <h3 class="column-title">Testimonials</h3><hr>

          <div id="testimonial-slide" class="testimonial-slide">
              <div class="item">
                <div class="quote-item">
                    <span class="quote-text">
                    They are good in what they do. I appreciate working with Sonia.
                    </span>

                    <div class="quote-item-footer">
                     <div class="quote-item-info">
                          <h3 class="quote-author">Nweke, Charles</h3>
                          <span class="quote-subtext">Chairman, Opendiari</span>
                      </div>
                    </div>
                </div><!-- Quote item end -->
              </div>
              <!--/ Item 1 end -->

              <div class="item">
                <div class="quote-item">
                    <span class="quote-text">
                    I really wanted to focus more on improving my products, all i needed was EnlistandRetain to manage my workers.
              
                    </span>

                    <div class="quote-item-footer">
                      <div class="quote-item-info">
                          <h3 class="quote-author">Mba, Ogbonna</h3>
                          <span class="quote-subtext">Managing Partner - Proficient Capital</span>
                      </div>
                    </div>
                </div><!-- Quote item end -->
              </div>
              <!--/ Item 2 end -->

              <div class="item">
                <div class="quote-item">
                    <span class="quote-text">
                    Think HR, Think EnlistandRetain..
                    </span>

                    <div class="quote-item-footer">
                      <div class="quote-item-info">
                          <h3 class="quote-author">Okon, Wilson</h3>
                          <span class="quote-subtext">Store Owner</span>
                      </div>
                    </div>
                </div><!-- Quote item end -->
              </div>
              <!--/ Item 3 end -->

          </div>
          <!--/ Testimonial carousel end-->
        </div><!-- Col end -->

        <div class="col-lg-6 mt-5 mt-lg-0">

          <h3 class="column-title">Happy Clients</h3>

          <div class="row all-clients">
              <div class="col-sm-4 col-6">
                <figure class="clients-logo">
                    <a href="#!"><img loading="lazy" class="img-fluid" src="{{URL::to('/')}}/public/frontend/assets/images/clients/client1.png" alt="clients-logo" /></a>
                </figure>
              </div><!-- Client 1 end -->

              <div class="col-sm-4 col-6">
                <figure class="clients-logo">
                    <a href="#!"><img loading="lazy" class="img-fluid" src="{{URL::to('/')}}/public/frontend/assets/images/clients/client2.png" alt="clients-logo" /></a>
                </figure>
              </div><!-- Client 2 end -->

              <div class="col-sm-4 col-6">
                <figure class="clients-logo">
                    <a href="#!"><img loading="lazy" class="img-fluid" src="{{URL::to('/')}}/public/frontend/assets/images/clients/client3.png" alt="clients-logo" /></a>
                </figure>
              </div><!-- Client 3 end -->

              <!---<div class="col-sm-4 col-6">
                <figure class="clients-logo">
                    <a href="#!"><img loading="lazy" class="img-fluid" src="images/clients/client4.png" alt="clients-logo" /></a>
                </figure>
              </div><-- Client 4 end 

              <div class="col-sm-4 col-6">
                <figure class="clients-logo">
                    <a href="#!"><img loading="lazy" class="img-fluid" src="images/clients/client5.png" alt="clients-logo" /></a>
                </figure>
              </div><-- Client 5 end 

              <div class="col-sm-4 col-6">
                <figure class="clients-logo">
                    <a href="#!"><img loading="lazy" class="img-fluid" src="images/clients/client6.png" alt="clients-logo" /></a>
                </figure>
              </div> Client 6 end -->

          </div><!-- Clients row end -->

        </div><!-- Col end -->

    </div>
    <!--/ Content row end -->
  </div>
  <!--/ Container end -->
</section><!-- Content end -->

<section style="display:none" class="subscribe no-padding">
  <div class="container">
    <div class="row">
        <div class="col-lg-4">
          <div class="subscribe-call-to-acton">
              <h3>We Can Help You</h3>
              <h4>+2349135840920</h4>
          </div>
        </div><!-- Col end -->

        <div class="col-lg-8">
          <div class="ts-newsletter row align-items-center">
              <div class="col-md-5 newsletter-introtext">
                <h4 class="text-white mb-0">Newsletter Sign-up</h4>
                <p class="text-white">Latest updates and news</p>
              </div>

              <div class="col-md-7 newsletter-form">
                <form action="#" method="post">
                    <div class="form-group">
                      <label for="newsletter-email" class="content-hidden">Newsletter Email</label>
                      <input type="email" name="email" id="newsletter-email" class="form-control form-control-lg" placeholder="Your your email and hit enter" autocomplete="off">
                    </div>
                </form>
              </div>
          </div><!-- Newsletter end -->
        </div><!-- Col end -->

    </div><!-- Content row end -->
  </div>
  <!--/ Container end -->
</section>
<!--/ subscribe end -->

<section id="news" class="news">
  <div class="container">
    <div class="row text-center">
        <div class="col-12">
          <h2 class="section-title">Work of Excellence</h2>
          <h3 class="section-sub-title">Recent Activities</h3>
        </div>
    </div>
    <!--/ Title row end -->

    <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="latest-post">
              <div class="latest-post-media">
                <a href="javascript:void()" class="latest-post-img">
                    <img loading="lazy" class="img-fluid" src="{{URL::to('/')}}/public/frontend/assets/images/news/news1.jpg" alt="img">
                </a>
              </div>
              <div class="post-body">
                <h4 class="post-title">
                    <a class="d-inline-block">Our first recruitment and training of twenty staff</a>
                </h4>
                <div class="latest-post-meta">
                    <span class="post-item-date">
                      <i class="fa fa-clock-o"></i> March 2021
                    </span>
                </div>
              </div>
          </div><!-- Latest post end -->
        </div><!-- 1st post col end -->

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="latest-post">
              <div class="latest-post-media">
                <a href="javascript:void()" class="latest-post-img">
                    <img loading="lazy" class="img-fluid" src="{{URL::to('/')}}/public/frontend/assets/images/news/news2.jpg" alt="img">
                </a>
              </div>
              <div class="post-body">
                <h4 class="post-title">
                    <a class="d-inline-block">Head of HR and Recruitment with a Staff</a>
<!-- remove jscript code	<a href="javascript:void()" class="d-inline-block">Head of HR and Recruitment with a Staff</a>  -->
                </h4>
                <div class="latest-post-meta">
                    <span class="post-item-date">
                      <i class="fa fa-clock-o"></i> April, 2021
                    </span>
                </div>
              </div>
          </div><!-- Latest post end -->
        </div><!-- 2nd post col end -->

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="latest-post">
              <div class="latest-post-media">
                <a href="javascript:void()" class="latest-post-img">
                    <img loading="lazy" class="img-fluid" src="{{URL::to('/')}}/public/frontend/assets/images/news/news3.jpg" alt="img">
                </a>
              </div>
              <div class="post-body">
                <h4 class="post-title">
                    <a class="d-inline-block">First Successful Interviews and training</a>
<!-- remove the news link <a href="news-single.html" class="d-inline-block">   -->
                </h4>
                <div class="latest-post-meta">
                    <span class="post-item-date">
                      <i class="fa fa-clock-o"></i> April 2021
                    </span>
                </div>
              </div>
          </div><!-- Latest post end -->
        </div><!-- 3rd post col end -->
    </div>
    <!--/ Content row end -->

<!-- disable link to all posts 
    <div class="general-btn text-center mt-4">
        <a class="btn btn-top" href="news-left-sidebar.html">See All Posts</a>
    </div>
-->

  </div>
  <!--/ Container end -->
</section>
<!--/ News end -->

<!--/ Contents end -->

  </div><!-- Body inner end -->
  </body>

  </html>
@endsection
@section('js')
<script>

 // INSERT JS HERE


// SOCIAL PANEL JS
const floating_btn = document.querySelector('.floating-btn');
const close_btn = document.querySelector('.close-btn');
const social_panel_container = document.querySelector('.social-panel-container');

floating_btn.addEventListener('click', () => {
	social_panel_container.classList.toggle('visible')
});

close_btn.addEventListener('click', () => {
	social_panel_container.classList.remove('visible')
});
</script>
@endsection