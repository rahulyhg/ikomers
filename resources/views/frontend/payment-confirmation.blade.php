@extends('frontend.layout')

@section('content')

<div class="page-head_agile_info_w3l">
  <div class="container dottedline-bheim">
      <h3>Payment <span>Confirmation</span></h3>
      <!--/w3_short-->
      <div class="services-breadcrumb">
          <div class="agile_inner_breadcrumb">
              <ul class="w3_short">
                  <li><a href="index.html">Home</a><i>|</i></li>
                  <li>Payment Confirmation</li>
              </ul>
          </div>
      </div>
      <!--//w3_short-->
  </div>
</div>

<div class="banner_bottom_agile_info">
    <div class="container">
        <div class="col-md-6">
            <h2>Please Confirm Your Payment</h2>
            <form method="POST" action="{{ route('post.checkout') }}" class="m-t-30">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('customers_firstname') ? ' has-error' : '' }}">
                    <label for="customers_firstname" class="control-label">Invoice No</label>
                    <input id="customers_firstname" type="text" class="form-control" name="customers_firstname" value="{{ old('customers_firstname') }}" required autofocus>

                    @if ($errors->has('customers_firstname'))
                        <span class="help-block">
                            <strong>{{ $errors->first('customers_firstname') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('customers_firstname') ? ' has-error' : '' }}">
                    <label for="customers_firstname" class="control-label">Amount Sent</label>
                    <input id="customers_firstname" type="text" class="form-control" name="customers_firstname" value="{{ old('customers_firstname') }}" required autofocus>

                    @if ($errors->has('customers_firstname'))
                        <span class="help-block">
                            <strong>{{ $errors->first('customers_firstname') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('customers_firstname') ? ' has-error' : '' }}">
                    <label for="customers_firstname" class="control-label">Select Payment Mode</label>
                    <input id="customers_firstname" type="text" class="form-control" name="customers_firstname" value="{{ old('customers_firstname') }}" required autofocus>

                    @if ($errors->has('customers_firstname'))
                        <span class="help-block">
                            <strong>{{ $errors->first('customers_firstname') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('customers_firstname') ? ' has-error' : '' }}">
                    <label for="customers_firstname" class="control-label">Sender Bank</label>
                    <input id="customers_firstname" type="text" class="form-control" name="customers_firstname" value="{{ old('customers_firstname') }}" required autofocus>

                    @if ($errors->has('customers_firstname'))
                        <span class="help-block">
                            <strong>{{ $errors->first('customers_firstname') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('delivery_phone') ? ' has-error' : '' }}">
                    <label for="delivery_phone" class="control-label">Sender Name</label>
                    <input id="delivery_phone" type="text" class="form-control" name="delivery_phone" value="{{ old('delivery_phone') }}" required autofocus>

                    @if ($errors->has('delivery_phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('delivery_phone') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Payment Date</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group m-t-20">
                    <button type="submit" class="newbutton">
                        Confirm Payment
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--//contact-->
@endsection