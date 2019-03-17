@extends('frontend.layout')

@section('content')

<div class="page-head_agile_info_w3l">
  <div class="container dottedline-bheim">
      <h3>Checkout</h3>
      <!--/w3_short-->
      <div class="services-breadcrumb">
          <div class="agile_inner_breadcrumb">
              <ul class="w3_short">
                  <li><a href="{{ route('home') }}">Home</a><i>|</i></li>
                  <li>Checkout</li>
              </ul>
          </div>
      </div>
      <!--//w3_short-->
  </div>
</div>

<form method="POST" id="formCheckout" class="m-t-30" onsubmit="return submitForm();">
    <div class="banner_bottom_agile_info">
        <div class="container">
            <div class="col-sm-12 address-grid">
                <h4 class="">Shipping <span>Address</span></h4>
            </div>
            <div class="col-sm-6 address-grid">
                {{ csrf_field() }}
                <input type="hidden" name="customers_id" value="@isset($data['user']){{ $data['user']->customers_id }}@endisset">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('customers_firstname') ? ' has-error' : '' }}">
                            <label for="customers_firstname" class="control-label">First Name</label>
                            <input id="customers_firstname" type="text" class="form-control" name="customers_firstname" value="@isset($data['user']){{ $data['user']->customers_firstname }}@endisset{{ old('customers_firstname') }}" required autofocus>
        
                            @if ($errors->has('customers_firstname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('customers_firstname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('customers_lastname') ? ' has-error' : '' }}">
                            <label for="customers_lastname" class="control-label">Last Name</label>
                            <input id="customers_lastname" type="text" class="form-control" name="customers_lastname" value="@isset($data['user']){{ $data['user']->customers_lastname }}@endisset{{ old('customers_lastname') }}" required autofocus>

                            @if ($errors->has('customers_lastname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('customers_lastname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group{{ $errors->has('delivery_street_address') ? ' has-error' : '' }}">
                            <label for="delivery_street_address" class="control-label">Address</label>
                            <textarea class="form-control" name="delivery_street_address" id="delivery_street_address" rows="2" required>@isset($data['address_book']){{ $data['address_book']->entry_street_address }}@endisset{{ old('delivery_street_address') }}</textarea>
                            
                            @if ($errors->has('delivery_street_address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('delivery_street_address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('delivery_state') ? ' has-error' : '' }}">
                            <label for="delivery_state" class="control-label">State</label>
                            {{-- <input id="delivery_state" type="text" class="form-control" name="delivery_state" value="@isset($data){{ $data['address_book']->entry_state }}@endisset{{ old('delivery_state') }}" required autofocus> --}}
                            <select name="delivery_state" id="delivery_state" class="form-control" required>
                                <option value="">-- Select --</option>
                                @foreach ($provinces as $item)
                                    <option @isset($data['address_book']) @if($item['province'] == $data['address_book']->entry_state) selected @endif @endisset data-value="{{ $item['province_id'] }}" value="{{ $item['province'] }}">{{ $item['province'] }}</option>
                                @endforeach
                            </select>
        
                            @if ($errors->has('delivery_state'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('delivery_state') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('delivery_city') ? ' has-error' : '' }}">
                            <label for="delivery_city" class="control-label">City</label>
                            {{-- <input id="delivery_city" type="text" class="form-control" name="delivery_city" value="@isset($data){{ $data['address_book']->entry_city }}@endisset{{ old('delivery_city') }}" required autofocus> --}}
                            <select name="delivery_city" id="delivery_city" class="form-control" required>
                                <option value="">-- Select --</option>
                                @isset($data['address_book']) <option selected value="{{ $data['address_book']->entry_city }}">{{ $data['address_book']->entry_city }}</option> @endisset
                            </select>
        
                            @if ($errors->has('delivery_city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('delivery_city') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('delivery_suburb') ? ' has-error' : '' }}">
                            <label for="delivery_suburb" class="control-label">Region</label>
                            {{-- <input id="delivery_suburb" type="text" class="form-control" name="delivery_suburb" value="@isset($data){{ $data['address_book']->entry_suburb }}@endisset{{ old('delivery_suburb') }}" required autofocus> --}}
                            <select name="delivery_suburb" id="delivery_suburb" class="form-control" required>
                                <option value="">-- Select --</option>
                                @isset($data['address_book']) <option selected value="{{ $data['address_book']->entry_suburb }}">{{ $data['address_book']->entry_suburb }}</option> @endisset
                            </select>
                            
                            @if ($errors->has('delivery_suburb'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('delivery_suburb') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('delivery_postcode') ? ' has-error' : '' }}">
                            <label for="delivery_postcode" class="control-label">Zip Code</label>
                            <input id="delivery_postcode" type="text" class="form-control" name="delivery_postcode" value="@isset($data['address_book']){{ $data['address_book']->entry_postcode }}@endisset{{ old('delivery_postcode') }}" required autofocus>
        
                            @if ($errors->has('delivery_postcode'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('delivery_postcode') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group{{ $errors->has('delivery_phone') ? ' has-error' : '' }}">
                            <label for="delivery_phone" class="control-label">Phone Number</label>
                            <input id="delivery_phone" type="text" class="form-control" name="delivery_phone" value="@isset($data['user']){{ $data['user']->customers_telephone }}@endisset{{ old('delivery_phone') }}" required autofocus>
        
                            @if ($errors->has('delivery_phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('delivery_phone') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">Email</label>
                            <input id="email" type="email" class="form-control" name="email" value="@isset($data['user']){{ $data['user']->email }}@endisset{{ old('email') }}" required>
        
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 col-sm-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Order Summary</h3>
                        <div class="row summaryheim">
                            <div class="col-sm-4 col-xs-12 summaryheim">
                                <h5>Order Subtotal</h5>
                            </div>
                            <div class="col-sm-6 col-xs-12 summaryheim">
                                <h6>{{ App\Models\Setting::getAttr('currency_symbol') }} {{Cart::subtotal(0, '', ',')}} </h6>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-4 col-xs-12 summaryheim">
                                <h5>Shipping Cost</h5>
                            </div>
                            <div class="col-sm-8 col-xs-12 summaryheim form-horizontal form-ongkir">
                                <div class="col-xs-5 p-0">
                                    <select name="shipping_methods" id="shipping_methods" class="form-control" required>
                                        @foreach ($data['shipping_methods'] as $item)
                                        <option value="{{ $item->slug }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <label class = "col-xs-2 control-label shipping-method" style="text-align:left;padding-left:0;">@isset($cost) {{ strtoupper($cost[0]['code']) }} @endisset</label> --}}
                                <div class = "col-xs-7 shipping-cost" style="margin-bottom:10px;">
                                    <select name="shipping_cost" id="ongkir" class="form-control" required>
                                        <option value="">-- Layanan --</option>
                                        @isset($cost)
                                            @foreach ($cost[0]['costs'] as $item)
                                            <option value="{{ $item['cost'][0]['value'] }}" data-type="{{ $item['service'] }}" data-duration="{{ $item['cost'][0]['etd'] }}">{{ $item['service'] }} {{ $item['cost'][0]['etd'] }} Hari</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="col-xs-12 p-0"> <h6 class="biaya-ongkir"></h6> </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-4 col-sm-6 col-xs-6 summaryheim">
                                <h6>Total</h6>
                            </div>
                            <div class="col-md-8 col-sm-6 col-xs-6 summaryheim">
                                <h6>{{ App\Models\Setting::getAttr('currency_symbol') }} <span id="totalSummary">{{ Cart::total(0, '', ',') }}</span></h6>
                                <input type="hidden" id="total" value="{{ Cart::total(0,'','') }}">
                            </div>
                        </div>
                        @if (Cart::count())
                            <div class="form-group m-t-40">
                                <button type="submit" class="btn btn-block btn-buy-product btn-lg">
                                    Select Payment Method
                                </button>
                            </div>
                        @endif	
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!--//contact-->
@endsection

@section('addscript')
<script>
$(document).ready(function() {

    $('#shipping_methods').val("jne").change();

    $('#delivery_state').on('change', function() {
        var data = {
            'id': $('option:selected', this).attr('data-value')
        };
        $.post('{{ route("get-cities") }}', data, function(data, textStatus, xhr) {
            /*optional stuff to do after success */
            //console.log(data);
            $('#delivery_city').empty();
            $('#delivery_city').append('<option value="">-- Select --</option>');
            $.each( data, function(k, v) {
                $('#delivery_city').append('<option data-value="'+k+'" value="'+v+'">'+v+'</option>');
           });
        });
    });

    $('#delivery_city').on('change', function() {
        var data = {
            'id': $('option:selected', this).attr('data-value')
        };
        $.post('{{ route("get-subdistricts") }}', data, function(data, textStatus, xhr) {
            /*optional stuff to do after success */
            //console.log(data);
            $('#delivery_suburb').empty();
            $('#delivery_suburb').append('<option value="">-- Select --</option>');
            $.each( data, function(k, v) {
                $('#delivery_suburb').append('<option data-value="'+k+'" value="'+v+'">'+v+'</option>');
           });
        });
    });

    $('#delivery_suburb').on('change', function() {
        var data = {
            'id': $('option:selected', '#delivery_city').attr('data-value')
        };
        $.post('{{ route("get-cost") }}', data, function(data, textStatus, xhr) {
            /*optional stuff to do after success */
            
            $('.shipping-method').html(data[0]['code'].toUpperCase());
            $('#shipping_methods').val("jne").change();
            $('#ongkir').empty();
            $('#ongkir').append('<option value="">-- Layanan --</option>');
            $.each( data, function(k, v) {
                if(v.costs.length == 0){
                    $('.shipping-method').hide();
                    $('.shipping-cost').hide();
                    $('.biaya-ongkir').html("<span class='text-danger'>Maaf alat tujuan tidak terjangkau.</span>");
                } else {
                    $('.shipping-method').show();
                    $('.shipping-cost').show();
                    $('.biaya-ongkir').html('');
                }

                $.each( v.costs, function(k, v) {
                    var cost = '';
                    var etd = '';
                    //console.log(v);
                    $.each( v.cost, function(k, v) {
                        cost = v.value;
                        etd = v.etd;
                    });
                    $('#ongkir').append('<option data-type="'+v.service+'" value="'+cost+'" data-duration="'+etd+'">'+v.service+' '+etd+' Hari</option>');
                });
           });
        });
    });

    $('#shipping_methods').on('change', function() {
        var method = $(this).val();
        var data = {
            'id': $('option:selected', '#delivery_city').val(),
            'courier': method
        };
        $.post('{{ route("get-cost") }}', data, function(data, textStatus, xhr) {
            /*optional stuff to do after success */
            
            $('.shipping-method').html(data[0]['code'].toUpperCase());
            $('#ongkir').empty();
            $('#ongkir').append('<option value="">-- Layanan --</option>');
            $.each( data, function(k, v) {
                if(v.costs.length == 0){
                    $('.shipping-method').hide();
                    $('.shipping-cost').hide();
                    $('.biaya-ongkir').html("<span class='text-danger'>Maaf alat tujuan tidak terjangkau.</span>");
                } else {
                    $('.shipping-method').show();
                    $('.shipping-cost').show();
                    $('.biaya-ongkir').html('');
                }

                $.each( v.costs, function(k, v) {
                    var cost = '';
                    var etd = '';
                    //console.log(v);
                    $.each( v.cost, function(k, v) {
                        cost = v.value;
                        etd = v.etd;
                    });
                    $('#ongkir').append('<option data-type="'+v.service+'" value="'+cost+'" data-duration="'+etd+'">'+v.service+' '+etd+' Hari</option>');
                });
           });
        });
    });

    $('#ongkir').on('change', function() {
        var ongkir = parseInt($(this).val());
        if (!isNaN(ongkir)) {
            var v_ongkir = ongkir;
        } else {
            var v_ongkir = 0;
        }
        console.log(v_ongkir);
        var total = v_ongkir + parseInt($('#total').val());
        $('#totalSummary').html(total.toLocaleString());
        $('#total').html(total);
        $('.biaya-ongkir').html("{{ App\Models\Setting::getAttr('currency_symbol') }} " + v_ongkir.toLocaleString());

        var data = {
            'shipping_cost': parseInt($(this).val()),
            'shipping_type': $('option:selected', this).attr('data-type'),
            'shipping_duration': $('option:selected', this).attr('data-duration')
        };
        $.post('{{ route("update-cost") }}', data, function(data, textStatus, xhr) {
            /*optional stuff to do after success */
        });

    });

    
});
</script>
    
@endsection