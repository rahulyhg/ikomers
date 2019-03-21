@extends('frontend.layout')

@section('content')
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
    <div class="container dottedline-bheim">
        <h3>Endless <span>Cart  </span></h3>
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
                        Cart
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="m-t-30">
    <div class="container">
        <div class="col-md-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="text-center">Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
            
                <tbody>
            
                    @foreach(Cart::content() as $row)
            
                        <tr>
                            <td>
                                <p><strong>{{ ucwords(strtolower($row->name)) }}</strong></p>
                                <p>{{ $row->options->has('size') ? $row->options->size : '' }}</p>
                            </td>
                            <td class="text-center">
                                <input style="width:42px;text-align:center;" onchange="qty(this.value, '{{$row->rowId}}')" type="number" name="qty" id="qty" value="{{ $row->qty }}" min="1">
                            </td>
                            <td>{{ App\Models\Setting::getAttr('currency_symbol') }} {{ number_format($row->price) }}</td>
                            <td>{{ App\Models\Setting::getAttr('currency_symbol') }} {{ number_format($row->total) }}</td>
                            <td>
                                 <form action="{{ URL::to('cart', ['id' => $row->rowId]) }}" method="POST">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-view-product m-0" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
            
                    @endforeach
            
                </tbody>
            </table>
        </div>
        <div class="col-md-4"><!-- col-md-3 Starts -->

            <div class="box" id="order-summary"><!-- box Starts -->
            
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="box-header"><!-- box-header Starts -->
                        
                        <h3>Order Summary</h3>
                        
                        </div><!-- box-header Ends -->
                        
                        <p class="text-muted m-t-20">
                        Shipping and additional costs are calculated based on the values you have entered.
                        </p>
                    </div>
                </div>
                
                <div class="row summaryheim">
                    <div class="col-sm-6 col-xs-12 summaryheim">
                        <h6>Total</h6>
                    </div>
                    <div class="col-sm-6 col-xs-12 summaryheim">
                        <h6 id="totalSummary" data-total="">{{ App\Models\Setting::getAttr('currency_symbol') }} {{ Cart::total() }}</h6>
                    </div>
                    <div class="clearfix"></div>
                    @if (Cart::count())
                        <div class="col-md-12 m-t-20">
                            <a href="{{ route('checkout') }}" class="btn btn-block btn-buy-product btn-lg">Checkout</a>
                        </div>
                    @endif	
                </div>
            
            </div><!-- box Ends -->
            
        </div>
    </div>
</div>
@endsection

@section('addscript')
<script>

function qty(qty, id) {
    data = {
        'qty':qty,
        '_token':'{!! csrf_token() !!}',
        '_method':'PUT'
    };
    $.post('{{ URL::to("cart") }}/'+id+'', data, function(data, textStatus, xhr) {
        /*optional stuff to do after success */
        console.log(data);
    });
}
</script>    
@endsection