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
                        <li><a href="{{ route('home') }}">Home</a><i>></i></li>
                        <li>Endless Product</li>
                    </ul>
                </div>
            </div>
            <!--//w3_short-->
        </div>
    </div>

    <div class="m-t-30">
        <div class="container">
            <div class="col-md-3 products-left">
                <div class="sidebar-menu">
                    <h4>Categories</h4>
            
                    <div class="panel-collapse collapse-data">
                        <div class="input-group m-t-10">
                            <input type="text" name="product" class="form-control" value="{{ $search }}" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-orange" type="submit" name="search"> <i class="fa fa-search"></i> </button>
                            </span>
                        </div>
                        <div class="panel-body m-t-10 scroll-menu">
                            <ul class="nav nav-pills nav-stacked category-menu" id="dev-p-cats">
                                <h3>{{ trans('Merk') }}</h3>
                                @foreach ($manufacturers as $item)
                                    <li class="checkbox checkbox-primary">
                                        <a>
                                            <label>
                                                <?php
                                                $checked = in_array($item->manufacturers_name, $selected_filter) ? 'checked="checked"' : '';
                                                ?>
                                                <input type="checkbox" value="{{ $item->manufacturers_name }}" {{ $checked }} name="merk">
                                                <span class="catnamebheim">
                                                    {{ $item->manufacturers_name }}
                                                </span>
                                            </label>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        {{-- <div class="panel-body m-t-10 scroll-menu">
                            <ul class="nav nav-pills nav-stacked category-menu" id="dev-p-cats">
                                <h3>{{ trans('Color') }}</h3>
                                @foreach ($product_options as $item)
                                    <li class="checkbox checkbox-primary">
                                        <a>
                                            <label>
                                                
                                                //$checked = in_array($item->options_values_name, $selected_filter) ? 'checked="checked"' : '';
                                                
                                                <input type="checkbox" value="{{ $item->options_values_name }}" {{ $checked }} name="color">
                                                <span class="catnamebheim">
                                                    {{ $item->options_values_name }}
                                                </span>
                                            </label>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div> --}}
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-9 products-right" id="Products">
                <div class="row">
                    @foreach ($products as $item)
                        <div class="col-md-4 col-sm-4 col-xs-6 item-product">
                            <a href="{{ route('product.detail', ['slug' => $item->products_slug]) }}"><img src="{{ asset($item->products_image) }}" alt="" class="img-responsive"></a>
                            <div class="item-info-product ">
                                <a href="{{ route('product.detail', ['slug' => $item->products_slug]) }}" class="btn btn-block btn-view-product">{{ strtoupper('Quick View') }}</a>
                                <h4><a href="{{ route('product.detail', ['slug' => $item->products_slug]) }}">{{ ucwords(trans(strtolower($item->products_name))) }}</a></h4>
                                <div class="info-product-price">
                                    <span class="item_price">{{ App\Models\Setting::getAttr('currency_symbol') }} {{ number_format($item->products_price) }}</span>
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

@section('addscript')

<script>
$(function(){
    $("input").change(function () { 
        var whereSearch = "";
        var search = $("input[name='product']").val();
        if(search) {
            whereSearch = "product="+search;
        }

        var merk = [];
        var whereMerk = "";
        $.each($("input[name='merk']:checked"), function(){            
            merk.push($(this).val());
        });
        if(merk.length > 0) {
            whereMerk = "merk="+merk;
        }

        var color = [];
        var whereColor = "";
        $.each($("input[name='color']:checked"), function(){            
            color.push($(this).val());
        });
        if(color.length > 0) {
            whereColor = "color="+color;
        }
        
        window.location.href = "{{ route('product.filter') }}?"+whereSearch+"&"+whereMerk+"&"+whereColor;
    });
});
</script>    
@endsection