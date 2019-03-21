@extends('frontend.layout')

@section('content')

<div class="page-head_agile_info_w3l">
  <div class="container dottedline-bheim">
      <h3>Contact <span>Us </span></h3>
      <!--/w3_short-->
      <div class="services-breadcrumb">
          <div class="agile_inner_breadcrumb">
              <ul class="w3_short">
                  <li><a href="{{ route('home') }}">Home</a><i>|</i></li>
                  <li>Contact Us</li>
              </ul>
          </div>
      </div>
      <!--//w3_short-->
  </div>
</div>

<div class="banner_bottom_agile_info">
    <div class="container">
        <div class="agile-contact-grids">
            <div class="agile-contact-left">
                <div class="col-md-6 address-grid">
                    <h4>For more <span>information</span></h4>
                    <div class="mail-agileits-w3layouts">
                        <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                        <div class="contact-right">
                            <p>Telephone </p><span>{{ App\Models\Setting::getAttr('phone_no') }}</span>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="mail-agileits-w3layouts">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <div class="contact-right">
                            <p>Mail </p>{{ App\Models\Setting::getAttr('contact_us_email') }}
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="mail-agileits-w3layouts">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <div class="contact-right">
                            <p>Location</p><span>{{ App\Models\Setting::getAttr('address') }}, {{ App\Models\Setting::getAttr('city') }}, {{ App\Models\Setting::getAttr('state') }}</span>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <ul class="social-nav model-3d-0 footer-social w3_agile_social two contact">
                        <li class="share">share on : </li>
                        <li>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank" class="facebook">
                                <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}" target="_blank" class="twitter">
                                <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/endlessindonesia/" class="instagram">
                                <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 contact-form address-grid">
                    <h4 class="">Mail <span>Us</span></h4>
                    @if(session()->has('message'))
                        <div class="alert alert-success m-t-20">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <form action="{{ route('post.contact') }}" method="post" class="m-t-30">
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" name="name" required="">
                            <label>Name</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input type="email" name="email" required="">
                            <label>Email</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <input type="text" name="subject" required="">
                            <label>Subject</label>
                            <span></span>
                        </div>
                        <div class="styled-input">
                            <textarea name="message" required=""></textarea>
                            <label>Message</label>
                            <span></span>
                        </div>
                        <button type="submit" class="btn btn-wishlist-product">Send</button>
                    </form>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--//contact-->
@endsection