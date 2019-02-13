@extends('frontend.layout')

@section('content')
<div class="container">
    <div class="page-head_agile_info_w3l">
        <div class="container dottedline-bheim">
            <h3 class="text-center">Login</h3>
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
                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old( 'remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="newbutton">
                            <i class="fa fa-unlock"></i> Login
                        </button>
                    </div>

                    <div class="form-group text-center">
                        <a href="{{ route('password.request') }}">
                            Forgot Password?
                        </a>
                    </div>

                </form>

                <div class="m-t-50 text-center">
                    <a href="{{ URL::to('register') }}">
                        <h3>New ? Register Here</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
