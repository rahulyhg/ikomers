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

            @if (session('salah'))
                <div class="alert alert-danger m-t-30">
                    {{ session('salah') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success m-t-30">
                    {{ session('success') }}
                </div>
            @endif

            <div class="m-t-30">
                <form method="POST" class="form-horizontal" action="{{ route('user.change-password') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="customers_id" value="{{ $user->customers_id }}">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group{{ $errors->has('password_lama') ? ' has-error' : '' }}">
                                <label for="password_lama" class="col-sm-3 control-label text-primary">Old Password</label>
                                <div class="col-sm-9">
                                    <input id="password_lama" type="password" class="form-control" name="current_password" value="" required autofocus>
            
                                    @if ($errors->has('password_lama'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_lama') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('password_baru') ? ' has-error' : '' }}">
                                <label for="password_baru" class="col-sm-3 control-label text-primary">New Password</label>
                                <div class="col-sm-9">
                                    <input id="password_baru" type="password" class="form-control" name="new_password" required autofocus>
            
                                    @if ($errors->has('password_baru'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_baru') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('ulangi_password') ? ' has-error' : '' }}">
                                <label for="ulangi_password" class="col-sm-3 control-label text-primary">Confirm New Password</label>
                                <div class="col-sm-9">
                                    <input id="ulangi_password" type="password" class="form-control" name="new_password_confirm" required autofocus>
        
                                    @if ($errors->has('ulangi_password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ulangi_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
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