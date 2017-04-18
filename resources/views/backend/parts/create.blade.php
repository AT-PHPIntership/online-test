@extends('backend.layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{ trans('parts.add') }}</h3>
      </div>
      <form role="form" action="{{route('admin.parts.store')}}" method="POST">
      {{csrf_field()}}
        <div class="box-body">
          <div class="form-group col-md-12">
            <label>{{ trans('parts.title') }}</label>
            <input type="text" class="form-control"  name="title">
            <div class="form-group has-error">
	          <span class="help-block">{{$errors->first('title')}}</span>
	        </div>
          </div>
          <div class="form-group col-md-6">
            <label>{{trans('parts.number_answer')}} </label>
            <input type="text" class="form-control"  name="number_answer">
            <div class="form-group has-error">
	          <span class="help-block">{{$errors->first('number_answer')}}</span>
	        </div>
          </div>
          <div class="form-group col-md-6">
            <label>{{ trans('parts.number_question') }} </label>
            <input type="text" class="form-control"  name="number_question">
            <div class="form-group has-error">
	          <span class="help-block">{{$errors->first('number_question')}}</span>
	        </div>
          </div>
          <div class="form-group">
          	<label>{{trans('parts.description')}}</label>
            <div class="box box-info ">
              <div class="box-header">
                <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="box-body pad">
                <textarea id="editor1" name="description" rows="10" cols="80" placeholder="This is my textarea to be replaced with CKEditor.">
                </textarea>
              </div>
            </div>
             <div class="form-group has-error">
	          <span class="help-block">{{$errors->first('description')}}</span>
	        </div>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">{{trans('backend.submit')}}</button>
          <button type="button" class="btn  btn-danger"><a href="">{{trans('backend.cancel')}}</a></button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection