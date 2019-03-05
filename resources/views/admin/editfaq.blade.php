@extends('admin.layout')
@section('content')
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1> Edit FAQ <small>Edit FAQ...</small> </h1>
    <ol class="breadcrumb">
       <li><a href="{{ URL::to('admin/dashboard/this_month') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
      <li><a href="{{ URL::to('admin/faq')}}"><i class="fa fa-bars"></i> Listing All Frequently Ask Questions</a></li>
      <li class="active">Edit FAQ</li>
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
            <h3 class="box-title">{{ trans('labels.EditMainCategories') }} </h3>
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
                         
                            {!! Form::open(array('url' =>'admin/updatefaq', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                              
                                {!! Form::hidden('faq_id',  $result['editFAQ'][0]->faq_id , array('class'=>'form-control', 'id'=>'id')) !!}
                                
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Category') }}</label>
                                  <div class="col-sm-10 col-md-4">
                                      <select class="form-control" name="faq_category_id">
                                          @foreach ($result['categories'] as $categories)
                                          <option 
                                          @if($categories->faq_category_id == $result['editFAQ'][0]->faq_category_id)
                                            selected
                                          @endif 
                                            value="{{$categories->faq_category_id}}">{{$categories->faq_category_name}}</option>
                                          @endforeach
                                      </select>
                                      <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.ChooseMainCategory') }}</span>
                                  
                                  </div>
                                </div>
                                
                                @foreach($result['description'] as $description_data)
                                    <div class="form-group">
                                      <label for="name" class="col-sm-2 col-md-3 control-label">Question ({{ $description_data['language_name'] }})</label>
                                      <div class="col-sm-10 col-md-4">
                                        <input type="text" name="question_<?=$description_data['languages_id']?>" class="form-control field-validate" value="{{$description_data['question']}}">
                                      <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">Question ({{ $description_data['language_name'] }}).</span>          
                                        <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="name" class="col-sm-2 col-md-3 control-label">Answer ({{ $description_data['language_name'] }})</label>
                                      <div class="col-sm-10 col-md-6">
                                        <textarea id="editor<?=$description_data['languages_id']?>" name="answer_<?=$description_data['languages_id']?>" class="form-control field-validate" rows="15">{{$description_data['answer']}}</textarea>
                                      <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">Answer ({{ $description_data['language_name'] }}).</span>          
                                        <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                                      </div>
                                    </div>
                                 
                                @endforeach
                                
                              <!-- /.box-body -->
                              <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary">{{ trans('labels.Update') }}</button>
                                <a href="{{ URL::to('admin/faq')}}" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
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

<script src="{!! asset('resources/views/admin/plugins/jQuery/jQuery-2.2.0.min.js') !!}"></script>
<script type="text/javascript">
		$(function () {
			
			//for multiple languages
			@foreach($result['languages'] as $languages)
				// Replace the <textarea id="editor1"> with a CKEditor
				// instance, using default configuration.
				CKEDITOR.replace('editor{{$description_data['languages_id']}}');
			
			@endforeach
			
			//bootstrap WYSIHTML5 - text editor
			$(".textarea").wysihtml5();
			
    });
</script>
@endsection 