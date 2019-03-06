@extends('frontend.layout')

@section('addcss')
<style>
#accordion input {
	display: none;
}
#accordion label {
	background: #eee;
	border-radius: .25em;
	cursor: pointer;
	display: block;
	margin-bottom: .125em;
	padding: 0.8em 1em;
	z-index: 20;
}
#accordion label:hover {
	background: #ccc;
}

#accordion input:checked + label {
	background: #ff6633;
	border-bottom-right-radius: 0;
	border-bottom-left-radius: 0;
	color: white;
	margin-bottom: 0;
}
#accordion article {
	background: #f7f7f7;
	height:0px;
	overflow:hidden;
	z-index:10;
}
#accordion article p {
	padding: 1em;
}
#accordion input:checked article {
}
#accordion input:checked ~ article {
	border-bottom-left-radius: .25em;
	border-bottom-right-radius: .25em;
	height: auto;
	margin-bottom: .125em;
}
</style>
@endsection

@section('content')
<div class="page-head_agile_info_w3l">
    <div class="container dottedline-bheim">
        <h3>Payment <span>Method </span></h3>
        <!--/w3_short-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">
                <ul class="w3_short">
                    <li><a href="{{ route('home') }}">Home</a><i>|</i></li>
                    <li>Payment Method</li>
                </ul>
            </div>
        </div>
        <!--//w3_short-->
    </div>
</div>

    {{-- Payment with SnapMidtrans
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 m-t-50">
                <div class="panel panel-default">
                    <div class="panel-body">
                        Summary Order
                        <div class="row summaryheim">
                            <div class="col-md-6 col-sm-6 col-xs-6 summaryheim">
                                <h5>Order Subtotal</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 summaryheim">
                                <h5>{{ App\Models\Setting::getAttr('currency_symbol') }} {{Cart::subtotal()}} </h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 summaryheim">
                                <h5>Shipping Cost</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 summaryheim">
                                <h5 id="shippingCost" data-total="">{{ App\Models\Setting::getAttr('currency_symbol') }} {{ number_format($shipping_cost,2) }}</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 summaryheim">
                                <h6>Total</h6>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 summaryheim">
                                <h6 id="totalSummary" data-total="">{{ App\Models\Setting::getAttr('currency_symbol') }} {{ number_format($total,2) }}</h6>
                            </div>
                        </div>
                        <form id="formPayment">
                            <div class="form-group m-t-40">
                                <button type="submit" class="btn btn-block btn-buy-product btn-lg">
                                    Continue Payment
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- Payment With VTWEB Midtrans --}}
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 m-t-50">
                <header>
                    <h3>Select Payment Method</h3>
                </header>
                <div class="panel panel-default m-t-30">
                    <div class="panel-body">
                        Summary Order
                        <div class="row summaryheim">
                            <div class="col-md-6 col-sm-6 col-xs-6 summaryheim">
                                <h5>Order Subtotal</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 summaryheim">
                                <h5>{{ App\Models\Setting::getAttr('currency_symbol') }} {{Cart::subtotal()}} </h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 summaryheim">
                                <h5>Shipping Cost</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 summaryheim">
                                <h5 id="shippingCost" data-total="">{{ App\Models\Setting::getAttr('currency_symbol') }} {{ number_format($shipping_cost,2) }}</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 summaryheim">
                                <h6>Total</h6>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 summaryheim">
                                <h6 id="totalSummary" data-total="">{{ App\Models\Setting::getAttr('currency_symbol') }} {{ number_format($total,2) }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route('post-payment') }}" method="POST">
                    <section id="accordion" class="m-t-30">
                        @foreach ($methods as $item)
                            <div>
                                <input type="hidden" name="invoice_number" value="{{ $invoice_number }}">
                                <input type="radio" name="payment_type" value="{{ $item->payment_type }}" id="option-{{ $item->payment_id }}" />
                                <label for="option-{{ $item->payment_id }}">{{ $item->payment_type_name }}</label>
                                <article>
                                    <p>{{ $item->payment_description }}</p>
                                    @if ($item->payment_type == "bank_transfer")
                                        @foreach ($banks as $bank)
                                            <div class="m-t-10">
                                                <p>{{ $bank->bank_name }}<br>
                                                {{ $bank->bank_account_no }}<br>
                                                a/n {{ $bank->bank_account_name }}</p>
                                            </div>
                                        @endforeach
                                    @endif
                                </article>
                            </div>
                        @endforeach
                    </section>
                    <div class="form-group m-t-20">
                        <button type="submit" class="newbutton">
                            Continue Payment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('addscript')
<script src="{{ !$config['isProduction'] ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}" data-client-key="{{ $config['clientKey'] }}"></script>
<script>
$("#formPayment").on("submit", function(){
    //Code: Action (like ajax...)
    $.post("{{ route('post-payment-snap') }}",null,
    function (data, status) {
        snap.pay(data, {
            // Optional
            onSuccess: function (result) {
                window.location.replace("{{ route('payment', ['status'=>'success']) }}");
            },
            // Optional
            onPending: function (result) {
                window.location.replace("{{ route('payment', ['status'=>'pending']) }}");
            },
            // Optional
            onError: function (result) {
                window.location.replace("{{ route('payment', ['status'=>'error']) }}");
            }
        });
    });
    return false;
})
</script>
    
@endsection