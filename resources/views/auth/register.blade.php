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

                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                    @endif

                    <div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="gridSystemModalLabel">Congratulation!</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            {{ session()->get('message')  }}
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('customers_firstname') ? ' has-error' : '' }}">
                        <label for="customers_firstname" class="control-label">First Name</label>
                        <input id="customers_firstname" type="text" class="form-control" name="customers_firstname" value="{{ old('customers_firstname') }}" required autofocus>

                        @if ($errors->has('customers_firstname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('customers_firstname') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('customers_lastname') ? ' has-error' : '' }}">
                            <label for="customers_lastname" class="control-label">Last Name</label>
                            <input id="customers_lastname" type="text" class="form-control" name="customers_lastname" value="{{ old('customers_lastname') }}" required autofocus>

                            @if ($errors->has('customers_lastname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('customers_lastname') }}</strong>
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

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="control-label">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>

                    <div class="form-group m-t-20">
                        <button type="submit" class="newbutton">
                            <i class="fa fa-user-md"></i> Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('addscript')
    @if(session()->has('message'))
        <script type="text/javascript">
            $(window).on('load',function(){
                $('#modalMessage').modal('show');
            });
        </script>
    @endif
@endsection
