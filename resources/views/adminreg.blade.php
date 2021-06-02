@extends('layouts.guest')
@section('content')<section id="inner-banner">
       <div class="overlay">
              <div class="container">
                     <div class="row">
                            <div class="col-sm-6">
                                   <h1>ADMIN REGISTER</h1>
                            </div>
                            <div class="col-sm-6">
                                   <h6 class="breadcrumb"><a href="{{ route('index') }}">Home</a> / Admin</h6>
                            </div>
                     </div>
              </div>
       </div>
</section>

<section id="about-sec">
       <div class="container">
              <div class="text-center row" style=" margin-top:-20px;">
                     <div class="col-md-4" style=" margin-top:20px;">
                            <div class="con-box">
                                   <div class="fancy-box-icon">
                                          <i class="fa fa-mobile-phone"></i>
                                   </div>
                                   <h3>PHONE</h3>
                                   <div class="fancy-box-content">
                                          <p>Phone 01: +1-347-751-9151<br>
                                                 Phone 02: +1-347-751-9151</p>
                                   </div>
                            </div>
                     </div>
                     <div class="col-md-4" style=" margin-top:20px;">
                            <div class="con-box" style="background:#2f3191;">
                                   <div class="fancy-box-icon">
                                          <i class="fa fa-map-marker"></i>
                                   </div>
                                   <h3>ADDRESS</h3>
                                   <div class="fancy-box-content">
                                          <p>1000 Duluth, Hwy lawrenceville<br>
                                                 Geogia </p>
                                   </div>
                            </div>
                     </div>
                     <div class="col-md-4" style=" margin-top:20px;">
                            <div class="con-box">
                                   <div class="fancy-box-icon">
                                          <i class="fa fa-envelope-o"></i>
                                   </div>
                                   <h3>EMAIL</h3>
                                   <div class="fancy-box-content">
                                    <a href="mailto:contactus@andusa.org"><p color ="white">contactus@andusa.org<br>
                                          </p></a>
                                          <p>contactus@andusa.org</p>
                                   </div>
                            </div>
                     </div>
                     <div class="clearfix"></div>
                     <h2><br>
                            ADMIN SIGNUP</h2>
                     <x-alerts.success />
                     <form class="clearfix con-form" method="POST" action="{{ route('createadmin') }}">
                            @csrf
                            <div class="cont" style="background-color: #e7f5ee;">
                                <div class="form sign-in">
                                  @csrf
                                  <h2>Welcome back,</h2><p>

                                  <label >
                                    <span style="color: black;">Name</span>
                                    <input type="text" name = "name" class="form-control" id="name"/>
                                  </label>

                                  <label>
                                  <label>
                                         <span style="color: black;">Email</span>
                                    <input type="email" name ="email" id="email"/>
                                  </label>
                                  <label>
                                    <span style="color: black;">Phone</span>
                               <input type="phone" name ="phone" id="phone"/>
                             </label>
                                  <label>
                                    <span style="color: black;">Password</span>
                                    <input type="password"  name ="password"/>
                                  </label>

                            <div class="col-xs-12 submit-button center">
                                   <input type="submit" value="Register" class="btn2" id="sub" style="border:none; margin: 20px 0 0 0">
                            </div>
                     </form>
              </div>
       </div>
</section>

@endsection

