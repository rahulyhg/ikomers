@extends('frontend.layout')

@section('content')
<div class="container">
    <div class="page-head_agile_info_w3l">
        <div class="container dottedline-bheim">
            <h3 class="text-center">Register</h3>
            <!--/w3_short-->
            <div class="services-breadcrumb">
                <div class="agile_inner_breadcrumb">

                    <ul class="w3_short">
                        <li><a href="home">Home</a><i>></i></li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
            <!--//w3_short-->
        </div>
    </div>
    <div class="banner_bottom_agile_info m-t-20">
        <div class="container">
            <div class="col-md-offset-3 col-md-6 contact-formnewbheim">
                <form method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">E-Mail Address</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password-confirm" class="control-label">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group m-t-20">
                        <button type="submit" class="newbutton">
                            Reset Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
