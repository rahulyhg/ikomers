@extends('frontend.layout')

@section('content')

<div class="page-head_agile_info_w3l">
		<div class="container dottedline-bheim">
			<h3>Endless <span>Indonesia </span></h3>
			<!--/w3_short-->
                <div class="services-breadcrumb">
                <div class="agile_inner_breadcrumb">
                    <ul class="w3_short">
                        <li><a href="index.html">Home</a><i>|</i></li>
                        <li>Endless Indonesia</li>
                    </ul>
                </div>
            </div>
	   <!--//w3_short-->
	</div>
</div>


<div class="container-fluid p-0">
    <div class="row">
        <div class="col-md-12 p-0" style="background: url({{ asset('resources/views/frontend/images/about.png') }}) left bottom; background-size: cover;">
            <div class="col-md-7 text-left header-text-about">
                <div class="agile_ab_w3ls_info">
                    <h5><span>The whole world,</span> empowered.</h5>
                </div>
                
                <p>Our mission is to enable people <br> to harness the power of computing <br> everywhere.</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container" style="margin:10em auto">
        <div class="row">
            <div class="col-md-8 col-md-offset-3">
                <h4 class="text-primary" style="line-height:1.6em">
                    Computing is one of the greatest revolutions in human history. <br>
                    Yet, it remains out of reach for half the planet. <br>
                    We create Endless OS - a free and robust computing solution - <br>
                    so people everywhere have access to relevant information and technology. <br> <br>
    
                    Our goal is build a global platform for digital literacy.
                </h4>
            </div>
        </div>
    </div>
</div> 

<div class="container-fluid about-grid">
    <div class="row">
        <div class="col-md-6 row-grid-content text-left" style="height:760px;min-height:760px;max-height:760px;background:url({{ asset('resources/views/frontend/images/oren.png') }})">
            <h3 class="text-yellow">"Access The World Without Limits"</h3>
            <p class="m-t-20 text-white">Around the world, there are still around 5 billion people who have not been touched by computers. Therefore, we make educational computers for everyone.</p>
            <div class="col-md-12 m-t-50 text-center">
                <img class="img-avatar" src="{{ asset('resources/views/frontend/images/about-matt.png') }}" alt="">
                <p class="m-t-10 text-white"><strong>Matt Dalio</strong></p>
                <p class="m-t-10 text-white">CEO and Founder Endless OS</p>
            </div>
        </div>
        <div class="col-md-6 p-0" style="height:760px;min-height:760px;max-height:760px">
            <img src="{{ asset('resources/views/frontend/images/about-2.jpeg') }}" alt=" " class="img-responsive" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 p-0" style="height:760px;min-height:760px;max-height:760px">
            <img src="{{ asset('resources/views/frontend/images/about-1.jpg') }}" alt=" " class="img-responsive" />
        </div>
        <div class="col-md-6 row-grid-content text-left" style="height:760px;min-height:760px;max-height:760px;background:url({{ asset('resources/views/frontend/images/putih.png') }})">
            <h3 class="text-primary">"All -in-One Solution For Everyone"</h3>
            <p class="m-t-20">The rapid development of technology has given positive impact on Indonesian education. 
                    Education sector is urged to apply technology in many aspects, including curriculum, teaching and learning activities, and many more. One of the examples is providing learning materials through video online.</p>
            <div class="col-md-12 m-t-50 text-center">
                <img class="img-avatar" src="{{ asset('resources/views/frontend/images/about-paul.png') }}" alt="">
                <p class="m-t-10"><strong>Paul Soegianto</strong></p>
                <p class="m-t-10">Indonesia Country Manager Endless OS</p>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top:-50px;">
        <div class="col-md-12 p-0">
            
        </div>
    </div>
</div>
@endsection