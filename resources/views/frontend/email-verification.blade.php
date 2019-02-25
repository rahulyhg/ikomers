@extends('frontend.layout')

@section('content')
<div class="page-head_agile_info_w3l">
    <div class="container dottedline-bheim">
        <h3>Endless <span>Indonesia </span></h3>
        <!--/w3_short-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">
                <ul class="w3_short">
                    <li><a href="index.html">Home</a><i>|</i></li>
                    <li>Endless Indonesia</li>
                </ul>
            </div>
        </div>
        <!--//w3_short-->
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registration Confirmed</div>
                <div class="panel-body">
                    Your Email is successfully verified. Click here to <a href="{{url('/login')}}">login</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection