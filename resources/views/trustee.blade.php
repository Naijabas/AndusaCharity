@extends('layouts.guest')
@section('content')
<section id="inner-banner">
       <div class="overlay">
              <div class="container">
                     <div class="row">
                            <div class="col-sm-6">
                                   <h1>Biography</h1>
                            </div>
                            <div class="col-sm-6">
                                   <h6 class="breadcrumb"><a href="{{ route('index') }}">Home</a> / Biography</h6>
                            </div>
                     </div>
              </div>
       </div>
</section>

<section id="about-sec">
       <div class="container">
              <div class="text-center row">
                     <h1>ABOUT <br/>{{ $trustee->name }}</h1> <br/>
                     <div class="avatar-inner"><img src="{{asset('storage/uploads/'.$trustee->passport) }}" width="300px"></div>
                     <hr>
                     <p class="text-justify text-lead">{!! $trustee->bio !!}</p>
              </div>
       </div>
</section>



<div class="callout">
       <div class="container">
              <div class="row">
                     <div class="col-md-6">
                            <h2>Change Their World. Change Yours. This changes everything.</h2><!-- /.callout-title -->
                     </div><!-- /.columns large-6 -->

                     <div class="col-md-6">
                            <div class="callout-actions">
                                   <a href="{{ route('contact') }}" class="button">Become Volunteer</a>

                                   <span class="callout-separator">
                                          <span>Or</span>
                                   </span>

                                   <a href="#" class="button">Donate For Cause</a>
                            </div><!-- /.callout-actions -->
                     </div><!-- /.columns large-6 -->
              </div><!-- /.row -->
       </div>
</div>
@endsection

