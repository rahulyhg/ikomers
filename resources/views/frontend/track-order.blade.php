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
                <form id="trackOrder" action="{{ route('post.track-order') }}">
                    <div class="input-group">
                        {!! csrf_field() !!}
                        <input type="text" name="waybill" class="form-control" placeholder="ID Order">
                        <input type="hidden" name="courier" value="jne" class="form-control" placeholder="ID Order">
                        <span class="input-group-btn">
                            <button class="btn btn-orange" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                    <div class="loading m-t-10 hidden">Loading...</div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Histori Pengiriman</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <p>Deliveri Status : <span class="delivery-status"></span></p>
                        <div class="m-t-30 history-track">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection


@section('addscript')
<script>
// this is the id of the form
$("#trackOrder").submit(function(e) {
    $('.loading').removeClass('hidden');
    var form = $(this);
    var url = form.attr('action');

    $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(), // serializes the form's elements.}
        success: function(data)
        {
            $('#modalMessage').modal('show');
            $('.loading').addClass('hidden');

            var obj = jQuery.parseJSON(JSON.stringify(data));
            $('.delivery-status').html(obj.delivery_status.status);

            var history = obj.manifest;
            var manifest = "";
            $.each(history, function(i, item) {
                manifest += ""
                +"<tr>"
                +"<td>"+item.manifest_date +"</td>"
                +"<td>"+item.manifest_description +"</td>"
                +"</tr>"
                +"";
            })

            

            var table = ""
            +"<table class=\"table table-striped\" width=\"100%\">"
                +"<tr>"
                    +"<td>Tanggal</td>"
                    +"<td>Status Pengiriman</td>"
                +"</tr>"
                +manifest+
            +"</table>"
            "";
            var history_track = table.replace('NaN', '');
            $('.history-track').html(history_track);

            
        }
    });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});
</script>
@endsection