@extends('admin.layout')
@section('content')
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>  {{ trans('labels.ShippingMethods') }} <small>{{ trans('labels.ShippingMethods') }}...</small> </h1>
    <ol class="breadcrumb">
      <li><a href="{{ URL::to('admin/dashboard/this_month')}}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
      <li class="active"> {{ trans('labels.ShippingMethods') }}</li>
    </ol>
  </section>
  
  <!--  content -->
  <section class="content"> 
    <!-- Info boxes --> 
    
    <!-- /.row -->

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> {{ trans('labels.ShippingMethods') }} </h3>
            <div class="box-tools pull-right">
            	<a href="{{ URL::to('admin/addshippingmethods')}}" type="button" class="btn btn-block btn-primary">Add New Shipping Method</a>
            </div>
          </div>
          
          <!-- /.box-header -->
          <div class="box-body">              		
          @if (count($errors) > 0)
              @if($errors->any())
            <div class="row">
              <div class="col-xs-12">
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  {{$errors->first()}}
                </div>
              </div>
            </div>
              @endif
          @endif
          
          <div class="row default-div hidden">
              <div class="col-xs-12">
                <div class="alert alert-success alert-dismissible" role="alert">
                  <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                  {{ trans('labels.ShippingMethodsChangedMessage') }}
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-xs-12">
                <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
                  <thead>
                    <tr>
                      <th style="text-align: center;">{{ trans('labels.ShippingTitle') }}</th>
                      <th style="text-align: center;">Slug</th>
                      <th style="text-align: center;">{{ trans('labels.Status') }}</th>
                      <th style="text-align: center;">{{ trans('labels.Action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($result['shipping_methods'] as $key=>$shipping_methods)
                        <tr>
                            <td>
                                 {{ $shipping_methods->name }}
                            </td>
                            <td>{{ $shipping_methods->slug }}</td>
                            <td>
                                @if($shipping_methods->status==0)
                                    <span class="label label-warning">
                                      {{ trans('labels.InActive') }}
                                    </span>
                                @else
                                    <a href="{{ URL::to("admin/shippingmethods")}}?id={{ $shipping_methods->shipping_methods_id}}&active=no" class="method-status">
                                      {{ trans('labels.InActive') }}
                                    </a>
                                @endif
                                &nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;
                                @if($shipping_methods->status==1)
                                    <span class="label label-success">
                                      {{ trans('labels.Active') }}
                                    </span>
                                @else
                                    <a href="{{ URL::to("admin/shippingmethods")}}?id={{ $shipping_methods->shipping_methods_id}}&active=yes" class="method-status">
                                        {{ trans('labels.Active') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                              <a href="{{ URL::to("admin/editshippingmethods/$shipping_methods->shipping_methods_id") }}" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                              <a class="badge alert-danger" data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Delete') }}" id="deleteCustomerFrom" customers_id="{{ $shipping_methods->shipping_methods_id }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.box-body --> 
        </div>
        <!-- /.box --> 
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 

    <div class="modal fade" id="deleteCustomerModal" tabindex="-1" role="dialog" aria-labelledby="deleteCustomerModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="deleteCustomerModalLabel">Delete Shipping Method</h4>
        </div>
        {!! Form::open(array('url' =>'admin/deleteshippingmethods', 'name'=>'deleteCustomer', 'id'=>'deleteCustomer', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
            {!! Form::hidden('action',  'delete', array('class'=>'form-control')) !!}
            {!! Form::hidden('shipping_methods_id',  '', array('class'=>'form-control', 'id'=>'customers_id')) !!}
        <div class="modal-body">						
          <p>Are you sure you want to delete this delete shipping method?</p>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Close') }}</button>
        <button type="submit" class="btn btn-primary">Delete Shipping Method</button>
        </div>
        {!! Form::close() !!}
      </div>
      </div>
    </div>
      
      <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content notificationContent">
  
      </div>
      </div>
    </div>
    
  </section>
  <!-- /.content --> 
</div>
@endsection 