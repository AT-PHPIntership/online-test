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
          <div class="form-group col-md-12  @if($errors->first('title')) has-error @endif">
            <label>{{ trans('parts.title') }}</label>
            <input type="text" class="form-control"  name="title">
            @if($errors->first('title'))
  	          <span class="help-block">{{$errors->first('title')}}</span>
            @endif
          </div>
          <div class="form-group col-md-6 @if($errors->first('number_answer')) has-error @endif"">
            <label>{{trans('parts.number_answer')}} </label>
            <input type="text" class="form-control"  name="number_answer">
            @if($errors->first('title'))
	          <span class="help-block">{{$errors->first('number_answer')}}</span>
            @endif
          </div>
          <div class="form-group col-md-6 @if($errors->first('number_question')) has-error @endif">
            <label>{{ trans('parts.number_question') }} </label>
            <input type="text" class="form-control"  name="number_question">
            @if($errors->first('number_question')) 
	          <span class="help-block">{{$errors->first('number_question')}}</span>
            @endif
          </div>
          <div class="form-group @if($errors->first('description')) has-error @endif">
          	<label>{{trans('parts.description')}}</label>
            <div class="box box-info ">
              <div class="box-header">
                <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="box-body pad">
                <textarea class="textarea" name="description" rows="10" cols="200" >
                </textarea>
              </div>
            </div>
            @if($errors->first('description')) 
	          <span class="help-block">{{$errors->first('description')}}</span>
            @endif
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">{{trans('backend.submit')}}</button>
          <a href="{{route('admin.parts.index')}}"><button type="button" class="btn  btn-danger">{{trans('backend.cancel')}}</button></a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection