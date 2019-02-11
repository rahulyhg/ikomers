@extends('frontend.layout')

@section('content')
    <!-- /banner_bottom_agile_info -->
    <div class="page-head_agile_info_w3l">
        <div class="container dottedline-bheim">
            <h3>Endless <span>Products  </span></h3>
            <!--/w3_short-->
            <div class="services-breadcrumb">
                <div class="agile_inner_breadcrumb">

                    <ul class="w3_short">
                        <li><a href="index.html">Home</a><i>></i></li>
                        <li>Endless Product</li>
                    </ul>
                </div>
            </div>
            <!--//w3_short-->
        </div>
    </div>

    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <div class="col-md-3 products-left">
                <div class="sidebar-menu">
                    <h4>Categories</h4>
            
                    <div class="panel-collapse collapse-data">
                        <div class="input-group m-t-10">
                            <input type="text" class="form-control borderfilter" id="dev-table-filter" data-action="filter" data-filters="#dev-p-cats" placeholder="Filter Product Categories">
                            <a class="input-group-addon"> <i class="fa fa-search"></i> </a>
                        </div>
                        <div class="panel-body m-t-10 scroll-menu">
                            <ul class="nav nav-pills nav-stacked category-menu" id="dev-p-cats">
                                <h3>{{ trans('Merk') }}</h3>
                                @foreach ($manufacturers as $item)
                                    <li class="checkbox checkbox-primary">
                                        <a>
                                            <label>
                                                <input type="checkbox" value="1" name="p_cat" class="get_p_cat" id="p_cat">
                                                <span class="catnamebheim">
                                                    {{ $item->manufacturers_name }}
                                                </span>
                                            </label>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="panel-body m-t-10 scroll-menu">
                            <ul class="nav nav-pills nav-stacked category-menu" id="dev-p-cats">
                                <h3>{{ trans('Color') }}</h3>
                                @foreach ($product_options as $item)
                                    <li class="checkbox checkbox-primary">
                                        <a>
                                            <label>
                                                <input type="checkbox" value="1" name="p_cat" class="get_p_cat" id="p_cat">
                                                <span class="catnamebheim">
                                                    {{ $item->options_values_name }}
                                                </span>
                                            </label>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-9 products-right" id="Products">
                <div class="row-eq-height">
                    @foreach ($products as $item)
                        <div class="col-md-4 item-product">
                            <a href=""><img src="{{ asset($item->products_image) }}" alt="" class="img-responsive"></a>
                            <div class="item-info-product ">
                                <a href="single.html" class="btn btn-block btn-view-product">{{ strtoupper('Quick View') }}</a>
                                <h4><a href="single.html">{{ ucwords(trans(strtolower($item->products_name))) }}</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">{{ $item->products_price }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        @include('frontend.common.pagination', ['paginator' => $products])
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

        </div>
    </div>

@endsection