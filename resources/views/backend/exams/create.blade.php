@extends('backend.layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{ trans('exams.add') }}</h3>
      </div>
       <form action="{!!route('admin.exams.store')!!}" enctype="multipart/form-data" method="POST">
      <form role="form" action="{{route('admin.exams.store')}}" method="POST">
      {{csrf_field()}}
        <div class="box-body">
          <div class="form-group col-md-6 {{ $errors->has('title') ? ' has-error' : '' }}">
            <label>{{ trans('exams.title') }}</label>
            <input type="text" class="form-control"  name="title" value="{{ old('title') }}">
            @if ($errors->has('name'))
              <span class="help-block">{{$errors->first('title')}}</span>
            @endif
          </div>
          <div class="form-group col-md-6 {{ $errors->has('audio') ? ' has-error' : '' }}">
            <label>{{ trans('exams.audio') }} </label>
            <input type="file" class="form-control"  name="audio">
            @if ($errors->has('audio'))
              <span class="help-block">{{$errors->first('audio')}}</span>
            @endif
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">{{trans('backend.submit')}}</button>
          <button type="button" class="btn  btn-danger"><a style="color: #fff" href="{{route('admin.exams.index')}}">{{trans('backend.cancel')}}</a></button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
