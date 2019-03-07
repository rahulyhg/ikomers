@extends('frontend.layout')

@section('content')

<div class="page-head_agile_info_w3l">
		<div class="container dottedline-bheim">
			<h3 style="text-transform: unset;">Frequently Ask <span>Questions </span></h3>
			<!--/w3_short-->
                <div class="services-breadcrumb">
                <div class="agile_inner_breadcrumb">
                    <ul class="w3_short">
                        <li><a href="{{ route('home') }}">Home</a><i>|</i></li>
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
                    <form action="{{ route('faq-search') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-orange" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin:10em auto">
        <div class="row">
            <div class="col-md-4">
                <ul class="list-faq">
                    @foreach ($faq_categories as $item)
                        <li><a class="@if($item->slug == $faq_category->slug) active @endif" href="{{ route('faq', ['slug'=>$item->slug]) }}">{{ $item->faq_category_name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-7 faq-accordion">
                <h2 class="text-primary" style="line-height:1.6em">{{ $faq_category->faq_category_name }}</h2>
                <div class="panel-group m-t-30" id="accordion" role="tablist" aria-multiselectable="true">
                    @foreach ($faqs as $item)
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading{{ $item->faq_id }}">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $item->faq_id }}" aria-expanded="false" aria-controls="collapse{{ $item->faq_id }}">
                                        {!! $item->question !!}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{ $item->faq_id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $item->faq_id }}">
                                <div class="panel-body">
                                    {!! $item->answer !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection