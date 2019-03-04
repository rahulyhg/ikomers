@extends('frontend.layout')

@section('addcss')
<style>
.wrapper-upload {
    position: relative;
}
.btn-upload-foto {
    display: none;
    position: absolute;
    top: -34px;
    bottom: 0;
    left: 0;
    right: 0;
    height: 34px;
    width: 42px;
    margin: auto;
    background: #ff6633;
}
</style>
@endsection

@section('content')

<div class="page-head_agile_info_w3l">
		<div class="container dottedline-bheim">
			<h3>Pengaturan</h3>
			<!--/w3_short-->
                <div class="services-breadcrumb">
                <div class="agile_inner_breadcrumb">
                    <ul class="w3_short">
                        <li><a href="{{ route('home') }}">Home</a><i>|</i></li>
                        <li>Pengaturan</li>
                    </ul>
                </div>
            </div>
	   <!--//w3_short-->
	</div>
</div>


<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-8 m-t-50">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div>
                        <img @isset($user->customers_picture) src="{{ $user->customers_picture }}" @endisset src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"  class="avatar img-circle img-thumbnail" alt="avatar">
                        <form method="POST" action="{{ route('user.update.my-account') }}" enctype="multipart/form-data">
                            <label class="btn btn-upload-foto">
                                <i class="fa fa-camera" aria-hidden="true"></i>
                                <input type="file" name="customers_picture" class="file-upload" style="display: none;">
                            </label>
                            <button type="submit" class="btn btn-buy-product hidden">Save</button>
                        </form>
                        <h2 class="text-primary m-t-20">Halo! {{ $user->customers_firstname }} {{ $user->customers_lastname }} </h2>
                    </div>
                </div>
            </div>

            @if (session('message'))
                <div class="alert alert-success m-t-30">
                    {{ session('message') }}
                </div>
            @endif
            <div class="m-t-30">
                <form method="POST" class="form-horizontal" action="{{ route('user.update.my-account') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="customers_id" value="{{ $user->customers_id }}">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group{{ $errors->has('user_name') ? ' has-error' : '' }}">
                                <label for="user_name" class="col-sm-2 control-label text-primary">Username</label>
                                <div class="col-sm-10">
                                    <input id="user_name" type="text" class="form-control" name="user_name" value="{{ $user->user_name }}" @if($user->user_name) readonly @endif required autofocus>
                                </div>
            
                                @if ($errors->has('user_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('entry_firstname') ? ' has-error' : '' }}">
                                <label for="entry_firstname" class="col-sm-2 control-label text-primary">First Name</label>
                                <div class="col-sm-10">
                                    <input id="entry_firstname" type="text" class="form-control" name="entry_firstname" value="{{ $user->customers_firstname }}" required autofocus>
                                </div>
            
                                @if ($errors->has('entry_firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('entry_firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('entry_lastname') ? ' has-error' : '' }}">
                                <label for="entry_lastname" class="col-sm-2 control-label text-primary">Last Name</label>
                                <div class="col-sm-10">
                                    <input id="entry_lastname" type="text" class="form-control" name="entry_lastname" value="{{ $user->customers_lastname }}" required autofocus>
                                </div>
        
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
                                <label for="delivery_street_address" class="col-sm-2 control-label text-primary">Gender</label>
                                <div class="col-sm-10">
                                    <select name="entry_gender" id="entry_gender" class="form-control" required>
                                        <option value="">-- Select --</option>
                                        <option @if($user->customers_gender == 'M') selected @endif value="M">Men</option>
                                        <option @if($user->customers_gender == 'F') selected @endif value="F">Women</option>
                                    </select>
                                </div>
                                
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
                            <div class="form-group{{ $errors->has('customers_telephone') ? ' has-error' : '' }}">
                                <label for="customers_telephone" class="col-sm-2 control-label text-primary">Telephone</label>
                                <div class="col-sm-10">
                                    <input id="customers_telephone" type="text" class="form-control" name="customers_telephone" value="{{ $user->customers_telephone }}" required autofocus>
                                </div>
            
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
                                <label for="email" class="col-sm-2 control-label text-primary">Email</label>
                                <div class="col-sm-10">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                                </div>
            
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
                            <div class="form-group{{ $errors->has('entry_street_address') ? ' has-error' : '' }}">
                                <label for="entry_street_address" class="col-sm-2 control-label text-primary">Address</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="entry_street_address" id="entry_street_address" rows="2" required>@isset($address_book->entry_street_address){{ $address_book->entry_street_address }}@endisset</textarea>
                                </div>
                                
                                @if ($errors->has('entry_street_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('entry_street_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('entry_state') ? ' has-error' : '' }}">
                                <label for="entry_state" class="col-sm-2 control-label text-primary">State</label>
                                <div class="col-sm-10">
                                    <select name="entry_state" id="entry_state" class="form-control" required>
                                        <option value="">-- Select --</option>
                                        @foreach ($provinces as $item)
                                            <option @if($item['province'] == $address_book->entry_state) selected @endif data-value="{{ $item['province_id'] }}" value="{{ $item['province'] }}">{{ $item['province'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
            
                                @if ($errors->has('entry_state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('entry_state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('entry_city') ? ' has-error' : '' }}">
                                <label for="entry_city" class="col-sm-2 control-label text-primary">City</label>
                                <div class="col-sm-10">
                                    <select name="entry_city" id="entry_city" class="form-control" required>
                                        <option value="">-- Select --</option>
                                        @isset($address_book) <option selected value="{{ $address_book->entry_city }}">{{ $address_book->entry_city }}</option> @endisset
                                    </select>
                                </div>
            
                                @if ($errors->has('entry_city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('entry_city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('entry_suburb') ? ' has-error' : '' }}">
                                <label for="entry_suburb" class="col-sm-2 control-label text-primary">Region</label>
                                <div class="col-sm-10">
                                    <select name="entry_suburb" id="entry_suburb" class="form-control" required>
                                        <option value="">-- Select --</option>
                                        @isset($address_book) <option selected value="{{ $address_book->entry_suburb }}">{{ $address_book->entry_suburb }}</option> @endisset
                                    </select>
                                </div>
            
                                @if ($errors->has('entry_suburb'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('entry_suburb') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('entry_postcode') ? ' has-error' : '' }}">
                                <label for="entry_postcode" class="col-sm-2 control-label text-primary">Zip Code</label>
                                <div class="col-sm-10">
                                    <input id="entry_postcode" type="text" class="form-control" name="entry_postcode" @isset($address_book->entry_postcode) value="{{ $address_book->entry_postcode }}" @endisset required autofocus>
                                </div>
            
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
                            <div class="form-group m-t-20">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button type="submit" class="newbutton">
                                            Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>

    </div>
    <!--/col-9-->
</div>
<!--/row-->
@endsection

@section('addscript')
<script>
    $(document).ready(function() {
        $('#entry_state').on('change', function() {
            var data = {
                'id': $('option:selected', this).attr('data-value')
            };
            $.post('{{ route("get-cities") }}', data, function(data, textStatus, xhr) {
                /*optional stuff to do after success */
                //console.log(data);
                $('#entry_city').empty();
                $('#entry_city').append('<option value="">-- Select --</option>');
                $.each( data, function(k, v) {
                    $('#entry_city').append('<option data-value="'+k+'" value="'+v+'">'+v+'</option>');
                });
            });
        });
    
        $('#entry_city').on('change', function() {
            var data = {
                'id': $('option:selected', this).attr('data-value')
            };
            $.post('{{ route("get-subdistricts") }}', data, function(data, textStatus, xhr) {
                /*optional stuff to do after success */
                //console.log(data);
                $('#entry_suburb').empty();
                $('#entry_suburb').append('<option value="">-- Select --</option>');
                $.each( data, function(k, v) {
                    $('#entry_suburb').append('<option data-value="'+k+'" value="'+v+'">'+v+'</option>');
                });
            });
        });
    });
</script>
<script>
$(document).ready(function() {

    $(".btn-save").hide();
        
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    

    $(".avatar, .btn-upload-foto").mouseover(function(){
        $(".btn-upload-foto").show();
        console.log('tes');
    }).mouseout(function() {
        $(".btn-upload-foto").hide();
    });

    $(".file-upload").on('change', function(){
        readURL(this);
        
        $(".btn-buy-product").removeClass('hidden');
    });
});
</script>

@endsection