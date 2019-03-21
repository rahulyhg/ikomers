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
            <div class="col-sm-12 m-t-50">
                @forelse ($orders as $order)
                    <div class="well m-t-30">
                        <div class="order">
                            <div class="row">
                                <div class="col-md-2">
                                    <p>NO TAGIHAN</p>
                                    <strong><p>{{ $order->invoice_number }}</p></strong>
                                    <p>{{ \Carbon\Carbon::parse($order->date_purchased)->format('d F Y H:i') }} WIB</p>
                                </div>
                                <div class="col-md-2">
                                    <p>TOTAL TAGIHAN</p>
                                    <strong><p>{{ App\Models\Setting::getAttr('currency_symbol') }} {{ number_format($order->order_price, 0 , '.' , '.') }},-</p></strong>
                                </div>
                                <div class="col-md-2">
                                    <p>STATUS TAGIHAN</p>
                                    @php
                                        $order_history = App\Models\Order::getHistoryOrder($order->orders_id)
                                    @endphp
                                    <strong><p>{{ $order_history->orders_status_name }}</p></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $products = App\Models\Order::getOrderProducts($order->orders_id)
                    @endphp
                    @foreach ($products as $item)
                        @php
                            $products_attr = App\Models\Product::where('products_id',$item->products_id)->first()
                        @endphp
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="{{ asset($products_attr->products_image) }}" alt="" class="img-responsive" width="120">
                            </div>
                            <div class="col-sm-3 m-t-30">
                                <strong><h4 class="text-primary">{{ $item->products_name }}</h4></strong>
                                <p>STATUS PEMBELIAN</p>
                                <strong><p>{{ $order_history->orders_status_name }}</p></strong>
                            </div>
                            <div class="col-sm-3 m-t-30">
                                <a href="{{ route('product.detail',['slug' => $products_attr->products_slug]) }}" class="btn btn-buy-product">Beli Lagi</a>
                            </div>
                        </div>
                        <hr class="orange">
                    @endforeach
                    @empty
                        <p>Empty</p>
                @endforelse
            </div>
        </div>
    </div>
</div> 
@endsection