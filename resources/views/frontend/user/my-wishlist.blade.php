@extends('frontend.layout')

@section('content')

<div class="page-head_agile_info_w3l">
		<div class="container dottedline-bheim">
			<h3>History <span>Pembelian</span></h3>
			<!--/w3_short-->
                <div class="services-breadcrumb">
                <div class="agile_inner_breadcrumb">
                    <ul class="w3_short">
                        <li><a href="{{ route('home') }}">Home</a><i>|</i></li>
                        <li>History Pembelian</li>
                    </ul>
                </div>
            </div>
	   <!--//w3_short-->
	</div>
</div>


<div class="container-fluid p-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12 m-t-20">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>
            <div class="col-sm-12 m-t-50">
                @foreach ($orders as $item)
                    @php
                        $products_attr = App\Models\Product::where('products_id',$item->id)->first()
                    @endphp
                    <div class="row">
                        <div class="col-sm-2">
                            <img src="{{ asset($products_attr->products_image) }}" alt="" class="img-responsive">
                            <form action="{{ URL::to('cart', ['id' => $item->rowId]) }}" method="POST">
                                {!! csrf_field() !!}
                                <input type="hidden" name="wishlist" value="1">
                                <input type="hidden" name="_method" value="PUT">
                                <button type="submit" class="btn-link toggle-wishlist"><i class="fa fa-heart" aria-hidden="true"></i></button>
                            </form>
                        </div>
                        <div class="col-sm-3 m-t-30">
                            <strong><h4 class="text-primary">{{ $item->name }}</h4></strong>
                            <p class="m-t-20 text-default">{{ App\Models\Setting::getAttr('currency_symbol') }} {{ number_format($item->price) }}</p>
                            <a href="{{ route('product.detail',['slug' => $products_attr->products_slug]) }}" class="btn btn-link">Detail Produk</a>
                        </div>
                        
                        <div class="col-sm-5 text-right m-t-30">
                            <form action="{{ URL::to('cart') }}" method="POST">
                                {!! csrf_field() !!}
                                <input type="hidden" name="qty" value="1">
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <input type="hidden" name="name" value="{{ $item->name }}">
                                <input type="hidden" name="price" value="{{ $item->price }}">
                                <button type="submit" class="btn btn-buy-product">Beli Lagi</button>
                            </form>
                        </div>
                    </div>
                    <hr class="orange">
                @endforeach
            </div>
        </div>
    </div>
</div> 
@endsection