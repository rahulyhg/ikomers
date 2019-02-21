@extends('frontend.layout')

@section('content')

<div class="page-head_agile_info_w3l">
		<div class="container dottedline-bheim">
			<h3 style="text-transform: unset;">Frequently Ask <span>Questions </span></h3>
			<!--/w3_short-->
                <div class="services-breadcrumb">
                <div class="agile_inner_breadcrumb">
                    <ul class="w3_short">
                        <li><a href="index.html">Home</a><i>|</i></li>
                        <li>Frequently Ask Questions</li>
                    </ul>
                </div>
            </div>
	   <!--//w3_short-->
	</div>
</div>


<div class="container-fluid p-0">
    <div class="agile_ab_w3ls_info">
        <div class="col-md-12 header-img-about p-0">
            <img src="{{ asset('resources/views/frontend/images/faq.png') }}" alt=" " class="img-responsive" />
        </div>
        <div class="container p-0" style="position:relative">
            <div class="col-md-6 col-md-offset-3 text-center filter-faq">
                <h1>Do you have a question?</h1>
                <div class="m-t-30">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                          <button class="btn btn-orange" type="button"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin:10em auto">
        <div class="row">
            <div class="col-md-4">
                <ul class="list-faq">
                    <li><a class="active" href="">Endless OS Installer & Download</a></li>
                    <li><a href="">How to use Endless OS</a></li>
                    <li><a href="">Apps & Programs</a></li>
                    <li><a href="">Technical Questions</a></li>
                    <li><a href="">Endless Computers</a></li>
                    <li><a href="">Endless Community</a></li>
                    <li><a href="">Partnerships & Others</a></li>
                </ul>
            </div>
            <div class="col-md-7 faq-accordion">
                <h2 class="text-primary" style="line-height:1.6em">Endless OS Installer & Download</h2>
                <div class="panel-group m-t-30" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    1. How do I create an Endless OS USB stick on Windows?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                2. How do I install Endless OS alongside Windows?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                3. Will Endless OS work with my computer?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                4. Where can I download the Endless OS ISO image files directly?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="panel-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFive">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                                4. How do I create an Endless USB stick from Linux?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                            <div class="panel-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

<div class="container-fluid about-grid">
    <div class="row row-eq-height row-grid">
        <div class="col-md-6 row-grid-content" style="background:url({{ asset('resources/views/frontend/images/oren.png') }})">
            <h3 class="text-yellow">"Access The World Without Limits"</h3>
            <p class="m-t-20 text-white">Around the world, there are still around 5 billion people who have not been touched by computers. Therefore, we make educational computers for everyone.</p>
            <div class="col-md-12 m-t-50 text-center">
                <img class="img-avatar" src="{{ asset('resources/views/frontend/images/about-matt.png') }}" alt="">
                <p class="m-t-10 text-white"><strong>Matt Dalio</strong></p>
                <p class="m-t-10 text-white">CEO and Founder Endless OS</p>
            </div>
        </div>
        <div class="col-md-6 p-0">
            <img src="{{ asset('resources/views/frontend/images/about-2.jpeg') }}" alt=" " class="img-responsive" />
        </div>
    </div>
    <div class="row row-eq-height row-grid">
        <div class="col-md-6 p-0">
            <img src="{{ asset('resources/views/frontend/images/about-1.jpg') }}" alt=" " class="img-responsive" />
        </div>
        <div class="col-md-6 row-grid-content" style="background:url({{ asset('resources/views/frontend/images/putih.png') }})">
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