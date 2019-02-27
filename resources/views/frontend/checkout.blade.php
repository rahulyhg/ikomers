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

<div class="banner_bottom_agile_info">
    <div class="container">
        <div class="col-md-6 address-grid">
            <h4 class="">Shipping <span>Address</span></h4>
            <form method="POST" action="{{ route('post.checkout') }}" class="m-t-30">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('customers_firstname') ? ' has-error' : '' }}">
                            <label for="customers_firstname" class="control-label">First Name</label>
                            <input id="customers_firstname" type="text" class="form-control" name="customers_firstname" value="{{ old('customers_firstname') }}" required autofocus>
        
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
                            <input id="customers_lastname" type="text" class="form-control" name="customers_lastname" value="{{ old('customers_lastname') }}" required autofocus>
    
                            @if ($errors->has('customers_lastname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('customers_lastname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('delivery_street_address') ? ' has-error' : '' }}">
                    <label for="delivery_street_address" class="control-label">Address</label>
                    <textarea class="form-control" name="delivery_street_address" id="delivery_street_address" rows="2" required>{{ old('delivery_street_address') }}</textarea>
                    
                    @if ($errors->has('delivery_street_address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('delivery_street_address') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('delivery_state') ? ' has-error' : '' }}">
                            <label for="delivery_state" class="control-label">State</label>
                            <input id="delivery_state" type="text" class="form-control" name="delivery_state" value="{{ old('delivery_state') }}" required autofocus>
        
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
                            <input id="delivery_city" type="text" class="form-control" name="delivery_city" value="{{ old('delivery_city') }}" required autofocus>
        
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
                            <input id="delivery_suburb" type="text" class="form-control" name="delivery_suburb" value="{{ old('delivery_suburb') }}" required autofocus>
        
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
                            <input id="delivery_postcode" type="text" class="form-control" name="delivery_postcode" value="{{ old('delivery_postcode') }}" required autofocus>
        
                            @if ($errors->has('delivery_postcode'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('delivery_postcode') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('delivery_phone') ? ' has-error' : '' }}">
                    <label for="delivery_phone" class="control-label">Phone Number</label>
                    <input id="delivery_phone" type="text" class="form-control" name="delivery_phone" value="{{ old('delivery_phone') }}" required autofocus>

                    @if ($errors->has('delivery_phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('delivery_phone') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group m-t-20">
                    <button type="submit" class="newbutton">
                        Continue Payment
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--//contact-->
@endsection