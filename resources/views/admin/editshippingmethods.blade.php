@extends('admin.layout')
@section('content')
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>{{ trans('labels.FreeShipping') }}</h1>
    <ol class="breadcrumb">
      <li><a href="{{ URL::to('admin/shippingmethods')}}"><i class="fa fa-bars"></i> {{ trans('labels.Shipping Method') }}</a></li>
      <li class="active">{{ trans('labels.FreeShipping') }}</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content"> 
    <!-- Info boxes --> 
    
    <!-- /.row -->

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">{{ trans('labels.FreeShipping') }}</h3>
          </div>
          
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
              		<div class="box box-info">
                    <br>                       
                        @if (count($errors) > 0)
                              @if($errors->any())
                                <div class="alert alert-success alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  {{$errors->first()}}
                                </div>
                              @endif
                          @endif
                        <!--<div class="box-header with-border">
                          <h3 class="box-title">Edit category</h3>
                        </div>-->
                        <!-- /.box-header -->
                        <!-- form start -->                        
                         <div class="box-body">
                         
                            {!! Form::open(array('url' =>'admin/updateShipping', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                              
                            <div class="form-group">
                                <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Name') }}</label>
                                <div class="col-sm-10 col-md-4">
                                  <input type="text" name="name" class="form-control field-validate" value="{{ $result['shipping_methods']->name }}">
                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.ShippingmethodName') }}.</span>          
                                    <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Slug') }}</label>
                                <div class="col-sm-10 col-md-4">
                                  <input type="text" name="slug" class="form-control field-validate" value="{{ $result['shipping_methods']->slug }}">
                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.ShippingmethodName') }} slug.</span>          
                                    <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                                </div>
                            </div>

                            <input type="hidden" name="shipping_methods_id" value="{{ $result['shipping_methods']->shipping_methods_id }}">
                                
                                
                              <!-- /.box-body -->
                              <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary">{{ trans('labels.Update') }}</button>
                                <a href="{{ URL::to('admin/shippingmethods')}}" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
                              </div>
                              <!-- /.box-footer -->
                            {!! Form::close() !!}
                        </div>
                  </div>
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
    
    <!-- Main row --> 
    
    <!-- /.row --> 
  </section>
  <!-- /.content --> 
</div>
@endsection 