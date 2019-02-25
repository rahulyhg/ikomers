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

<div class="container m-t-50">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
            <h2>Track your order</h2>
            <p class="m-t-10">Please insert your ID Order</p>
            <div class="m-t-20">
                <form id="trackOrder" action="https://pro.rajaongkir.com/api/waybill">
                    <div class="input-group">
                        <input type="text" name="waybill" class="form-control" placeholder="ID Order">
                        <input type="hidden" name="courier" value="jne" class="form-control" placeholder="ID Order">
                        <span class="input-group-btn">
                            <button class="btn btn-orange" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@section('addscript')
<script>
// this is the id of the form
$("#trackOrder").submit(function(e) {
    var form = $(this);
    var url = form.attr('action');

    console.log(form.serialize());

    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(), // serializes the form's elements.}
        headers: {
            "Content-Type" : "application/x-www-form-urlencoded", 
            "key" : "3e169946cdf2a71468f0ee0ec24a7140",
            "Accept" : "application/json"
        },
        success: function(data)
        {
            alert(data); // show response from the php script.
        }
        });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});
</script>
@endsection