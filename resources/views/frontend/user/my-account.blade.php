@extends('frontend.layout')

@section('content')

<div class="page-head_agile_info_w3l">
		<div class="container dottedline-bheim">
			<h3 style="text-transform: unset;">My <span>Account</span></h3>
			<!--/w3_short-->
                <div class="services-breadcrumb">
                <div class="agile_inner_breadcrumb">
                    <ul class="w3_short">
                        <li><a href="{{ route('home') }}">Home</a><i>|</i></li>
                        <li>My Account</li>
                    </ul>
                </div>
            </div>
	   <!--//w3_short-->
	</div>
</div>


<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-3 m-t-50 text-left">

            @include('frontend.user.menu')

        </div>

        <div class="col-sm-offset-1 col-sm-8 m-t-50">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="text-primary">My Account</h2>
                </div>
            </div>

            @if (session('message'))
                <div class="alert alert-success m-t-30">
                    {{ session('message') }}
                </div>
            @endif
            
            <form method="POST" action="{{ route('user.update.my-account') }}" class="m-t-30">
                {{ csrf_field() }}
                <input type="hidden" name="customers_id" value="{{ $user->customers_id }}">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group{{ $errors->has('user_name') ? ' has-error' : '' }}">
                            <label for="user_name" class="control-label">Username</label>
                            <input id="user_name" type="text" class="form-control" name="user_name" value="{{ $user->user_name }}" @if($user->user_name) readonly @endif required autofocus>
        
                            @if ($errors->has('user_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('user_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('entry_firstname') ? ' has-error' : '' }}">
                            <label for="entry_firstname" class="control-label">First Name</label>
                            <input id="entry_firstname" type="text" class="form-control" name="entry_firstname" value="{{ $user->customers_firstname }}" required autofocus>
        
                            @if ($errors->has('entry_firstname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('entry_firstname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('entry_lastname') ? ' has-error' : '' }}">
                            <label for="entry_lastname" class="control-label">Last Name</label>
                            <input id="entry_lastname" type="text" class="form-control" name="entry_lastname" value="{{ $user->customers_lastname }}" required autofocus>
    
                            @if ($errors->has('entry_lastname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('entry_lastname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group{{ $errors->has('delivery_street_address') ? ' has-error' : '' }}">
                            <label for="delivery_street_address" class="control-label">Gender</label>
                            <br>
                            <label class="radio-inline">
                                <input type="radio" name="entry_gender" id="inlineRadio1" value="M" @if($user->customers_gender == 'M') checked @endif required> Men
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="entry_gender" id="inlineRadio2" value="F" @if($user->customers_gender == 'F') checked @endif required> Women
                            </label>
                            
                            @if ($errors->has('entry_gender'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('entry_gender') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group{{ $errors->has('entry_street_address') ? ' has-error' : '' }}">
                            <label for="entry_street_address" class="control-label">Address</label>
                            <textarea class="form-control" name="entry_street_address" id="entry_street_address" rows="2" required>@isset($address_book->entry_street_address){{ $address_book->entry_street_address }}@endisset</textarea>
                            
                            @if ($errors->has('entry_street_address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('entry_street_address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('entry_state') ? ' has-error' : '' }}">
                            <label for="entry_state" class="control-label">State{{ $address_book->entry_state }}</label>
                            {{-- <input id="entry_state" type="text" class="form-control" name="entry_state" @isset($address_book->entry_state) value="{{ $address_book->entry_state }}" @endisset required autofocus> --}}
                            <select name="entry_state" id="entry_state" class="form-control" required>
                                <option value="">-- Select --</option>
                                @foreach ($provinces as $item)
                                    <option @if($item['province'] == $address_book->entry_state) selected @endif value="{{ $item['province_id'] }}">{{ $item['province'] }}</option>
                                @endforeach
                            </select>
        
                            @if ($errors->has('entry_state'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('entry_state') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('entry_city') ? ' has-error' : '' }}">
                            <label for="entry_city" class="control-label">City</label>
                            {{-- <input id="entry_city" type="text" class="form-control" name="entry_city" @isset($address_book->entry_city) value="{{$address_book->entry_city}}" @endisset required autofocus> --}}
                            <select name="entry_city" id="entry_city" class="form-control" required>
                                <option value="">-- Select --</option>
                                @isset($address_book) <option selected value="{{ $address_book->entry_city }}">{{ $address_book->entry_city }}</option> @endisset
                            </select>
        
                            @if ($errors->has('entry_city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('entry_city') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('entry_suburb') ? ' has-error' : '' }}">
                            <label for="entry_suburb" class="control-label">Region</label>
                            {{-- <input id="entry_suburb" type="text" class="form-control" name="entry_suburb" @isset($address_book->entry_suburb) value="{{$address_book->entry_suburb}}" @endisset required autofocus> --}}
                            <select name="entry_suburb" id="entry_suburb" class="form-control" required>
                                <option value="">-- Select --</option>
                                @isset($address_book) <option selected value="{{ $address_book->entry_suburb }}">{{ $address_book->entry_suburb }}</option> @endisset
                            </select>
        
                            @if ($errors->has('entry_suburb'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('entry_suburb') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('entry_postcode') ? ' has-error' : '' }}">
                            <label for="entry_postcode" class="control-label">Zip Code</label>
                            <input id="entry_postcode" type="text" class="form-control" name="entry_postcode" @isset($address_book->entry_postcode) value="{{ $address_book->entry_postcode }}" @endisset required autofocus>
        
                            @if ($errors->has('entry_postcode'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('entry_postcode') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group{{ $errors->has('customers_telephone') ? ' has-error' : '' }}">
                            <label for="customers_telephone" class="control-label">Phone Number</label>
                            <input id="customers_telephone" type="text" class="form-control" name="customers_telephone" value="{{ $user->customers_telephone }}" required autofocus>
        
                            @if ($errors->has('customers_telephone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('customers_telephone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">Email</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>
        
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group m-t-20">
                            <button type="submit" class="newbutton">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
    <!--/col-9-->
</div>
<!--/row-->
@endsection