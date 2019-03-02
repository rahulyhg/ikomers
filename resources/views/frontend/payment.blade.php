@extends('frontend.layout')

@section('addcss')
<style>
#accordion input {
	display: none;
}
#accordion label {
	background: #eee;
	border-radius: .25em;
	cursor: pointer;
	display: block;
	margin-bottom: .125em;
	padding: 0.8em 1em;
	z-index: 20;
}
#accordion label:hover {
	background: #ccc;
}

#accordion input:checked + label {
	background: #ff6633;
	border-bottom-right-radius: 0;
	border-bottom-left-radius: 0;
	color: white;
	margin-bottom: 0;
}
#accordion article {
	background: #f7f7f7;
	height:0px;
	overflow:hidden;
	z-index:10;
}
#accordion article p {
	padding: 1em;
}
#accordion input:checked article {
}
#accordion input:checked ~ article {
	border-bottom-left-radius: .25em;
	border-bottom-right-radius: .25em;
	height: auto;
	margin-bottom: .125em;
}
</style>
@endsection

@section('content')
<div class="page-head_agile_info_w3l">
    <div class="container dottedline-bheim">
        <h3>Payment</h3>
        <!--/w3_short-->
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">
                <ul class="w3_short">
                    <li><a href="{{ route('home') }}">Home</a><i>|</i></li>
                    <li>Payment</li>
                </ul>
            </div>
        </div>
        <!--//w3_short-->
    </div>
</div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 m-t-50">
                <div class="alert alert-success text-center">
                    <h5>{{ $message }}</h5>
                </div>
            </div>
        </div>
    </div>

@endsection