@extends('backend.layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{trans('news.news')}}</h3>
      </div>
       <form action="{!!route('admin.news.store')!!}" enctype="multipart/form-data" method="POST">
        {{csrf_field()}}
        <div class="box-body">
          <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
            <label>{{trans('news.title')}} </label>
            <input type="text" class="form-control" name="title" placeholder="Enter title">
            @if($errors->first('title'))
            <span class="help-block">{{$errors->first('title')}}</span>
            @endif
          </div>
          <div class="form-group  {{ $errors->has('category_id') ? ' has-error' : '' }}" >
            <label>{{trans('admin.category')}}</label>
            <select class="form-control select2" name="category_id" style="width: 100%;">
              <option value="">-- Choose --</option>
              @foreach($categories as $item)
              <option value="{{$item->id}}">{{$item->name}}</option>
              @endforeach
            </select>
            @if($errors->first('category_id'))
            <span class="help-block">{{$errors->first('category_id')}}</span>
            @endif
          </div>
          <div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
            <label>{{trans('news.content')}}</label>
            <div class="box box-info ">
              <div class="box-header">
                <small>{{trans('news.advanced')}}</small>
                <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="box-body pad">
                <textarea class="textarea" name="content" rows="10" cols="220" >
                </textarea>
              </div>
            </div>
            @if($errors->first('content'))
              <span class="help-block">{{$errors->first('content')}}</span>
            @endif
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">{{trans('admin.add')}}</button>
          <a href="{{route('admin.news.index')}}"><button type="button" class="btn  btn-danger">{{trans('admin.cancel')}}</button></a>
         
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="{{asset('bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
@endsection
