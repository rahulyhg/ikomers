@extends('frontend.layout')

@section('content')
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
    <div class="container dottedline-bheim">
        <h3>Endless <span>Cart  </span></h3>
    </div>
</div>

<div class="m-t-30">
    <div class="container">
        <div class="col-md-9">
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
            
                    <?php foreach(Cart::content() as $row) :?>
            
                        <tr>
                            <td>
                                <p><strong>{{ ucwords(strtolower($row->name)) }}</strong></p>
                                <p>{{ $row->options->has('size') ? $row->options->size : '' }}</p>
                            </td>
                            <td class="text-center"><?php echo $row->qty; ?></td>
                            <td>{{ $row->price }}</td>
                            <td>{{ $row->total }}</td>
                            <td>
                                 <form action="{{ URL::to('cart', ['id' => $row->rowId]) }}" method="POST">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-view-product m-0" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
            
                    <?php endforeach;?>
            
                </tbody>
            </table>
        </div>
        <div class="col-md-3"><!-- col-md-3 Starts -->

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
                    <div class="col-md-6 col-sm-6 col-xs-6 summaryheim">
                        <h5>Order Subtotal</h5>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 summaryheim">
                        <h5> {{Cart::subtotal()}} </h5>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 summaryheim">
                        <h5>Shipping Cost</h5>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 summaryheim">
                        <h5 id="shippingCost" data-total="">IDR 0</h5>
                        <input type="hidden" id="shippingCosthide">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 summaryheim">
                        <h6>Total</h6>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 summaryheim">
                        <h6 id="totalSummary" data-total="">{{ Cart::total() }}</h6>
                    </div>
                    @if (Cart::count())
                        <div class="col-md-12 m-t-20">
                            <button class="btn btn-block btn-buy-product btn-lg">Continue Payment</button>
                        </div>
                    @endif	
                </div>
            
            </div><!-- box Ends -->
            
        </div>
    </div>
</div>
@endsection