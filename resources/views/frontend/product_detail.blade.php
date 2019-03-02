@extends('frontend.layout')

@section('addcss')
<link rel="stylesheet" href="{{ asset('resources/views/frontend/css/flexslider.css') }}" type="text/css" media="screen" />
<link href="{{ asset('resources/views/frontend/css/easy-responsive-tabs.css') }}" rel='stylesheet' type='text/css'/>
<style>
.resp-tabs-list li {
	border-bottom: 3px solid #ccc;
    color: #ccc !important;
    font-weight: normal !important;
    margin-right: 12px;
}
.resp-tabs-list .resp-tab-active {
	border-bottom: 4px solid #ff6633;
    background: #ff6633;
    color: #fff !important;
    font-weight: normal !important;
    border-radius: 6px;
}
.resp-tab-active:before {
    display: none;
}
</style>
@endsection

@section('content')

<div class="page-head_agile_info_w3l">
    <div class="container dottedline-bheim">
        <h3>Endless <span>Products  </span></h3>
        <!--/w3_short-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">

                <ul class="w3_short">
                    <li><a href="">Home</a><i>|</i></li>
                    <li><a href="{{ route('product') }}">Products</a><i>|</i></li>
                    {{-- <li>
                        <a href="">
                            {{ $product->categories_name }}
                        </a><i>|</i></li> --}}
                    <li>
                        {{ ucwords(strtolower($product->products_name)) }}
                    </li>
                </ul>
            </div>
        </div>
        <!--//w3_short-->
    </div>
</div>

<div class="products spaceproheim">
    <div class="container p-0">
        
            <div class="single-page">
                <div class="single-page-row" id="detail-21">
                    <div class="col-md-6">
                            <div id="slider" class="flexslider">
                              <ul class="slides">
                                    <li>
                                        <img src="{{ asset($product->products_image) }}" data-imagezoom="true"/>
                                    </li>
                                    @foreach ($product_images as $item)
                                        <li>
                                            <img src="{{ asset($item->image) }}" data-imagezoom="true"/>
                                        </li>
                                    @endforeach
                              </ul>
                            </div>
                            <div id="carousel" class="flexslider">
                              <ul class="slides">
                                    <li>
                                        <div class="thumb-image"><img src="{{ asset($product->products_image) }}"/></div>
                                    </li>
                                    @foreach ($product_images as $item)
                                        <li>
                                            <div class="thumb-image"><img src="{{ asset($item->image) }}"/></div>
                                        </li>
                                    @endforeach
                              </ul>
                            </div>
                            
                    </div>
                        <div class="col-md-6 single-right-left simpleCart_shelfItem">
                            
                            <form action="{{ URL::to('cart') }}" method="POST">
                            <div class="product-attr">
                                <h4>{{ trans('labels.Price') }} :</h4>
                                <p><span class="item_price"> {{ $currency }} </span> {{ number_format($product->products_price) }}</p>
                                <h4>{{ trans('labels.Quantity') }} :</h4>
                                <div class="form-group m-t-10" style="width:100px">
                                    <input type="number" value="1" min="1" name="qty" class="form-control">
                                </div>
                            </div>
            
                            <div class="">
                                <div class="row">
                                    <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                                        <button class="btn btn-buy-product btn-block" type="submit" name="buy" value="1">Buy now</button>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                                        <button class="btn btn-view-product btn-block" type="submit">Add to Cart</button>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4">
                                        <button class="btn btn-wishlist-product btn-block" type="submit" name="add_wishlist">Wishlist</button>
                                    </div>
                                </div>
                            </div>

                            {!! csrf_field() !!}
                            <input type="hidden" name="id" value="{{ $product->products_id }}">
                            <input type="hidden" name="name" value="{{ $product->products_name }}">
                            <input type="hidden" name="price" value="{{ $product->products_price }}">
                            </form>
                            <ul class="social-nav model-3d-0 footer-social w3_agile_social single_page_w3ls">
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
            
                    <div class="clearfix"> </div>
                </div>
            </div>

        <!-- /new_arrivals -->
        <div class="responsive_tabs_agileits">
            <div id="horizontalTab">
                <ul class="resp-tabs-list">
                    <li>Hardware Description</li>
                    <li>Endless OS Package</li>
                </ul>
                <div class="resp-tabs-container">
                    <!--/tab_one-->
                    <div class="tab1">

                        <div class="single_page_agile_its_w3ls">
                            <h6>{{ ucwords(strtolower($product->products_name)) }}</h6>
                            <p>
                                {{ strip_tags($product->products_description) }}
                            </p>
                        </div>
                    </div>
                    <!--//tab_one-->
                    <div class="tab2">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 single_page_agile_its_w3ls">
                                    <ul class="desc_product">
                                        <li>Endless Operating System (in Indonesian)</li>
                                        <li>50,000 pages of Encyclopedia without the need for the Internet</li>
                                        <li>Hundreds of Education Videos for Elementary-Middle School-High School Lessons without internet</li>
                                        <li>Ms-Office compatibility without the need for license fees</li>
                                        <li>Educational applications in the form of subject topics: Biology, Physics, Geography, History, Social Sciences, and Astronomy without the need for internet</li>
                                        <li>Dozens of educational games</li>
                                        <li>Complete Multimedia Application (GIMP, Inkscape, Video Editor, VLC Video player, Photo Editor, etc.)</li>
                                        <li>Do not need Anti Virus</li>
                                        <li>Equipped with an application center with hundreds of free Apps</li>
                                        <li>Complete social media (FB / Twitter / Instagram / Skype / Email / WA)</li>
                                        <li>Already have hundreds of drivers for printers and scanners, just plug and print / scan</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //new_arrivals -->
        <!--/slider_owl-->
    </div>
</div>
<!--//single_page-->

<!--see other products-->
<div class="products spaceproheim ">
    <div class="container">
        <hr>
        <div class="single-page ">
            <div class="single_page_agile_its_w3ls centerheim ">
                <h6>{{ trans('labels.OtherProduct') }}</h6>
                <div class="row row-eq-height m-t-50">
                    @foreach ($products as $item)
                        <div class="col-md-3 item-product">
                            <div class="other-product">
                                <a href="{{ route('product.detail', ['slug' => $item->products_slug]) }}"><img src="{{ asset($item->products_image) }}" alt="" class="img-responsive"></a>
                                <div class="item-info-product">
                                    <h4 class="m-t-30"><a href="{{ route('product.detail', ['slug' => $item->products_slug]) }}">{{ ucwords(trans(strtolower($item->products_name))) }}</a></h4>
                                    <div class="m-t-50">
                                        <div class="seemore">
                                            <a href="{{ route('product.detail', ['slug' => $item->products_slug]) }}">see more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--see other products-->
@stop

@section('addscript')
<script type="text/javascript" src="{{ asset('resources/views/frontend/js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('resources/views/frontend/js/easy-responsive-tabs.js') }}"></script>
<script src="{{ asset('resources/views/frontend/js/imagezoom.js') }}"></script>
<script src="{{ asset('resources/views/frontend/js/jquery.flexslider.js') }}"></script>
<script>
    $(window).load(function() {
        $('#carousel').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 120,
            asNavFor: '#slider'
        });
        
        $('#slider').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#carousel"
        });
    });
</script>
<script type="text/javascript" src="{{ asset('resources/views/frontend/js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('resources/views/frontend/js/jquery.easing.min.js') }}"></script>
@endsection
