@extends('frontend.layout')

@section('content')

<div class="page-head_agile_info_w3l">
  <div class="container dottedline-bheim">
      <h3>Payment <span>Confirmation</span></h3>
      <!--/w3_short-->
      <div class="services-breadcrumb">
          <div class="agile_inner_breadcrumb">
              <ul class="w3_short">
                  <li><a href="{{ route('home') }}">Home</a><i>|</i></li>
                  <li>Payment Confirmation</li>
              </ul>
          </div>
      </div>
      <!--//w3_short-->
  </div>
</div>

<div class="banner_bottom_agile_info">
    <div class="container">
        <div class="col-md-12">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <h2>Please Confirm Your Payment</h2>
            <form method="POST" action="{{ route('post.payment-confirmation') }}" class="m-t-30" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('payment_date') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Tanggal Transfer</label>
                    <input id="date" type="date" class="form-control" name="payment_date" value="{{ old('payment_date') }}" required>

                    @if ($errors->has('payment_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('payment_date') }}</strong>
                        </span>
                    @endif
                </div>

                
                <div class="form-group{{ $errors->has('orders_id') ? ' has-error' : '' }}">
                    <label for="orders_id" class="control-label">Order ID</label>
                    <input id="orders_id" type="text" class="form-control" name="orders_id" value="{{ old('orders_id') }}" required autofocus>

                    @if ($errors->has('orders_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('orders_id') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('payment_method') ? ' has-error' : '' }}">
                    <label for="payment_method" class="control-label">Pilih Transfer Rekening</label>
                    <select name="payment_method" class="form-control" required>
                        <option value="">-- Pilih Transfer Rekening --</option>
                        @foreach ($bank_transfer as $item)
                        <option value="{{ $item->bank_name }}">{{ $item->bank_name }} a/n {{ $item->bank_account_name }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('payment_method'))
                        <span class="help-block">
                            <strong>{{ $errors->first('payment_method') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('sender_bank') ? ' has-error' : '' }}">
                    <label for="sender_bank" class="control-label">Nama Bank</label>
                    <input id="sender_bank" type="text" class="form-control" name="sender_bank" value="{{ old('sender_bank') }}" required autofocus>

                    @if ($errors->has('sender_bank'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sender_bank') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('sender_name') ? ' has-error' : '' }}">
                    <label for="sender_name" class="control-label">Nama Pemilik Rekening</label>
                    <input id="sender_name" type="text" class="form-control" name="sender_name" value="{{ old('sender_name') }}" required autofocus>

                    @if ($errors->has('sender_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sender_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('amount_sent') ? ' has-error' : '' }}">
                    <label for="amount_sent" class="control-label">Nominal Transfer</label>
                    <input id="amount_sent" type="text" class="form-control" name="amount_sent" value="{{ old('amount_sent') }}" required autofocus>

                    @if ($errors->has('amount_sent'))
                        <span class="help-block">
                            <strong>{{ $errors->first('amount_sent') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('reference_id') ? ' has-error' : '' }}">
                    <label for="reference_id" class="control-label">Reference ID/Memo</label>
                    <input id="reference_id" type="text" class="form-control" name="reference_id" value="{{ old('reference_id') }}" placeholder="Masukkan Reference ID yang tercantum di struk ATM" required autofocus>

                    @if ($errors->has('reference_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('reference_id') }}</strong>
                        </span>
                    @endif
                </div>



                <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                    <label for="photo" class="control-label">Reference ID/Memo</label>
                    <input id="photo" type="file" class="form-control" name="photo" value="{{ old('photo') }}" required autofocus>

                    @if ($errors->has('photo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('photo') }}</strong>
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
        <div class="col-sm-5 col-sm-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>Transfer ke rekening:</h3>
                    @foreach ($bank_transfer as $item)
                        <div class="m-t-20">
                            <p>{{ $item->bank_name }}</p>
                            <p>{{ $item->bank_account_no }}</p>
                            <p>a/n {{ $item->bank_account_name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--//contact-->
@endsection