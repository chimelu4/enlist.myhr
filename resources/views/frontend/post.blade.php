<?php
$page="Post";
 use Carbon\Carbon;
?>

@extends('frontend.inc_master')

<!--/ Header end -->

<!-- Contents here -->
@section('content')



<section id="main-container" class="main-container">
  <div class="container">
    <div class="row">
        <div  class="col-lg-6 "><br>
          <h4 class="mr-4 "><u>{{$post->job_title}}</u></h4><span class="badge badge-success"> {{getObjectName('type',$post->job_type)}}</span>
          <span class="badge badge-success">Published {{$post->created_at->diffForHumans()}}</span>
          @if (Carbon::now()>Carbon::parse($post->data_closing))
          <span class="badge badge-danger">Expired {{Carbon::parse($post->date_closing)->diffForHumans()}}</span>
          @else
          <span class="badge badge-primary">Expiring {{Carbon::parse($post->date_closing)->diffForHumans()}}</span>
          @endif
          <p class="text-justify mt-2"><b>Job Description</b><br> {{$post->job_description}}</p>
           
<!--          <blockquote><p>Semporibus autem quibusdam et aut officiis debitis aut rerum est aut optio cumque nihil necessitatibus autemn ec tincidunt nunc posuere ut</p></blockquote> -->
<div class="accordion accordion-group" id="our-values-accordion">
              <div class="card">
                <div class="card-header p-0 bg-transparent" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                         Qualifications Required
                      </button>
                    </h2>
                </div>
              
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#our-values-accordion">
                    <div class="card-body">
                  <ul>
                      <li><b>Minimum Qualification:</b><br> {{getObjectName('qualification',$post->min_qualification)}}</li>
                      <li><b>Highest Qualification:</b><br> {{getObjectName('qualification',$post->highest_qualification)}}</li>
                  </ul>
                    </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header p-0 bg-transparent" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Industry
                      </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#our-values-accordion">
                    <div class="card-body">
                    {{getObjectname('industry',$post->industry)}}
                    </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header p-0 bg-transparent" id="headingThree">
                    <h2 class="mb-0">
                      <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                         Salary Structure
                      </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#our-values-accordion">
                    <div class="card-body">
                    <ul>
                        <li><b>Minimum Salary:</b> {{number_format($post->salary_from)}}</li>
                        <li><b>Maximum Salary:</b> {{number_format($post->salary_to)}}</li>


                    </ul>
                </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header p-0 bg-transparent" id="headingFour">
                    <h2 class="mb-0">
                      <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          Other Requirements
                      </button>
                    </h2>
                </div>
                <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#our-values-accordion">
                    <div class="card-body">
                    {{$post->other_requirement}}
             </div>
                </div>
              </div>
          </div>
        </div><!-- Col end -->

        <div class="col-lg-6 mt-5 mt-lg-0">
          
          <div id="page-slider" class="page-slider small-bg">

              <div class="item" style="background-image:url('../public/{!!$post->image !!}'); border-top-right-radius:25px;">
                <div class="container">
                    <div class="box-slider-content">
                          
                    </div>
                </div>
              </div><!-- Item 1 end -->

          </div><!-- Page slider end-->          
          <div class="accordion accordion-group" id="ou-values-accordion">
              
             
             
              <div class="card">
                <div class="card-header p-0 bg-transparent" id="headingFive">
                    <h2 class="mb-0">
                      <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                          Location
                      </button>
                    </h2>
                </div>
                <div id="collapseFive" class="collapse show" aria-labelledby="headingFive" data-parent="#ou-values-accordion">
                    <div class="card-body">
                    {{ucfirst($post->location)}}
             </div>
                </div>
              </div>
          </div>

        </div><!-- Col end -->
    </div><!-- Content row end -->

  </div>
  <div class="container float-right">
   <a href="{{URL::to('/user/job/apply')}}/{{$post->id}}" class="btn btn-primary">Apply Now</a>
  </div><!-- Container end --><!-- Container end -->
</section><!-- Main container end -->


<section id="facts" class="facts-area dark-bg">
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

<section style="display: none;" id="ts-team" class="ts-team">
  <div class="container">
    <div class="row text-center">
        <div class="col-lg-12">
          <h2 class="section-title">Quality Service</h2>
          <h3 class="section-sub-title">Professional Team</h3>
        </div>
    </div><!--/ Title row end -->

    <div class="row">
        <div class="col-lg-12">
          <div id="team-slide" class="team-slide">
              <div class="item">
                <div class="ts-team-wrapper">
                    <div class="team-img-wrapper">
                      <img loading="lazy" class="w-100" src="{{URL::to('/')}}/public/frontend/assets/images/team/team1.jpg" alt="team-img">
                    </div>
                    <div class="ts-team-content">
                      <h3 class="ts-name">Nats Stenman</h3>
                      <p class="ts-designation">Chief Operating Officer</p>
                      <p class="ts-description">Nats Stenman began his career in construction with boots on the ground</p>
                      <div class="team-social-icons">
                          <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
                          <a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
                          <a target="_blank" href="#"><i class="fab fa-google-plus"></i></a>
                          <a target="_blank" href="#"><i class="fab fa-linkedin"></i></a>
                      </div><!--/ social-icons-->
                    </div>
                </div><!--/ Team wrapper end -->
              </div><!-- Team 1 end -->

              <div class="item">
                <div class="ts-team-wrapper">
                    <div class="team-img-wrapper">
                      <img loading="lazy" class="w-100" src="{{URL::to('/')}}/public/frontend/assets/images/team/team2.jpg" alt="team-img">
                    </div>
                    <div class="ts-team-content">
                      <h3 class="ts-name">Angela Lyouer</h3>
                      <p class="ts-designation">Innovation Officer</p>
                      <p class="ts-description">Nats Stenman began his career in construction with boots on the ground</p>
                      <div class="team-social-icons">
                          <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
                          <a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
                          <a target="_blank" href="#"><i class="fab fa-linkedin"></i></a>
                      </div><!--/ social-icons-->
                    </div>
                </div><!--/ Team wrapper end -->
              </div><!-- Team 2 end -->

              <div class="item">
                <div class="ts-team-wrapper">
                    <div class="team-img-wrapper">
                      <img loading="lazy" class="w-100" src="{{URL::to('/')}}/public/frontend/assets/images/team/team3.jpg" alt="team-img">
                    </div>
                    <div class="ts-team-content">
                      <h3 class="ts-name">Mark Conter</h3>
                      <p class="ts-designation">Safety Officer</p>
                      <p class="ts-description">Nats Stenman began his career in construction with boots on the ground</p>
                      <div class="team-social-icons">
                          <a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
                          <a target="_blank" href="#"><i class="fab fa-google-plus"></i></a>
                          <a target="_blank" href="#"><i class="fab fa-linkedin"></i></a>
                      </div><!--/ social-icons-->
                    </div>
                </div><!--/ Team wrapper end -->
              </div><!-- Team 3 end -->

              <div class="item">
                <div class="ts-team-wrapper">
                    <div class="team-img-wrapper">
                      <img loading="lazy" class="w-100" src="{{URL::to('/')}}/public/frontend/assets/images/team/team4.jpg" alt="team-img">
                    </div>
                    <div class="ts-team-content">
                      <h3 class="ts-name">Ayesha Stewart</h3>
                      <p class="ts-designation">Finance Officer</p>
                      <p class="ts-description">Nats Stenman began his career in construction with boots on the ground</p>
                      <div class="team-social-icons">
                          <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
                          <a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
                          <a target="_blank" href="#"><i class="fab fa-google-plus"></i></a>
                          <a target="_blank" href="#"><i class="fab fa-linkedin"></i></a>
                      </div><!--/ social-icons-->
                    </div>
                </div><!--/ Team wrapper end -->
              </div><!-- Team 4 end -->

              <div class="item">
                <div class="ts-team-wrapper">
                    <div class="team-img-wrapper">
                      <img loading="lazy" class="w-100" src="{{URL::to('/')}}/public/frontend/assets/images/team/team5.jpg" alt="team-img">
                    </div>
                    <div class="ts-team-content">
                      <h3 class="ts-name">Dave Clarkte</h3>
                      <p class="ts-designation">Civil Engineer</p>
                      <p class="ts-description">Nats Stenman began his career in construction with boots on the ground</p>
                      <div class="team-social-icons">
                          <a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
                          <a target="_blank" href="#"><i class="fab fa-google-plus"></i></a>
                          <a target="_blank" href="#"><i class="fab fa-linkedin"></i></a>
                      </div><!--/ social-icons-->
                    </div>
                </div><!--/ Team wrapper end -->
              </div><!-- Team 5 end -->

              <div class="item">
                <div class="ts-team-wrapper">
                    <div class="team-img-wrapper">
                      <img loading="lazy" class="w-100" src="{{URL::to('/')}}/public/frontend/assets/images/team/team6.jpg" alt="team-img">
                    </div>
                    <div class="ts-team-content">
                      <h3 class="ts-name">Elton Joe</h3>
                      <p class="ts-designation">Site Supervisor</p>
                      <p class="ts-description">Nats Stenman began his career in construction with boots on the ground</p>
                      <div class="team-social-icons">
                          <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
                          <a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
                          <a target="_blank" href="#"><i class="fab fa-google-plus"></i></a>
                          <a target="_blank" href="#"><i class="fab fa-linkedin"></i></a>
                      </div><!--/ social-icons-->
                    </div>
                </div><!--/ Team wrapper end -->
              </div><!-- Team 6 end -->

          </div><!-- Team slide end -->
        </div>
    </div><!--/ Content row end -->
  </div><!--/ Container end -->
</section><!--/ Team end -->


@endsection