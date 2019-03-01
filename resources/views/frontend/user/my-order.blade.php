@extends('frontend.layout')

@section('content')

<div class="page-head_agile_info_w3l">
		<div class="container dottedline-bheim">
			<h3 style="text-transform: unset;">My <span>Order</span></h3>
			<!--/w3_short-->
                <div class="services-breadcrumb">
                <div class="agile_inner_breadcrumb">
                    <ul class="w3_short">
                        <li><a href="{{ route('home') }}">Home</a><i>|</i></li>
                        <li>My Order</li>
                    </ul>
                </div>
            </div>
	   <!--//w3_short-->
	</div>
</div>


<div class="container-fluid p-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 m-t-50 text-left">
                @include('frontend.user.menu')
            </div>
            <div class="col-sm-offset-1 col-sm-8 m-t-50">
                <h2 class="text-primary">My Orders</h2>
                @foreach ($orders as $order)
                    <div class="panel panel-default m-t-30">
                        <div class="panel-body order">
                            <h3 class="text-primary">Invoice Number : {{ $order->invoice_number }}</h3>
                            @php
                                $products = App\Models\Order::getOrderProducts($order->orders_id)
                            @endphp
                            @foreach ($products as $item)
                                <div class="row m-t-30">
                                    <div class="col-md-4">
                                        <p>Product</p>
                                        <strong><p>{{ $item->products_name }}</p></strong>
                                    </div>
                                    <div class="col-md-4">
                                        <p>Quantity</p>
                                        <strong><p>{{ $item->products_quantity }}</p></strong>
                                    </div>
                                    <div class="col-md-4">
                                        <p>Price</p>
                                        <strong><p>{{ App\Models\Setting::getAttr('currency_symbol') }} {{ number_format($item->products_price, 0 , '.' , ',') }}</p></strong>
                                    </div>
                                </div>
                                <div class="row m-t-20">
                                    <div class="col-md-4">
                                        <p>Total</p>
                                        <strong><p>{{ App\Models\Setting::getAttr('currency_symbol') }} {{ number_format($order->order_price , 0 , '.' , ',') }}</p></strong>
                                    </div>
                                    <div class="col-md-4">
                                        <p>Purchase Date</p>
                                        <strong><p>{{ $order->date_purchased }}</p></strong>
                                    </div>
                                    <div class="col-md-4">
                                        <p>Status</p>
                                        @php
                                            $order_history = App\Models\Order::getHistoryOrder($item->orders_id)
                                        @endphp
                                        <strong><p>{{ $order_history->orders_status_name }}</p></strong>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div> 
@endsection