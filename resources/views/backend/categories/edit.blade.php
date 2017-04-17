@extends('backend.layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{trans('categories.edit')}}</h3>
      </div>
        <form action="{!!route('admin.categories.update',$category->id)!!}" enctype="multipart/form-data" method="POST">
          {{csrf_field()}}
        {{ method_field('PUT') }}
        <div class="box-body">
          <div class="form-group ">
            <label>{{trans('categories.old')}}</label>
            <input type="email" class="form-control"  value="{{$category->name}}" disabled="">
          </div>
          <div class="form-group ">
            <label>{{trans('categories.news')}}</label>
            <input type="text" class="form-control"  name="name" placeholder="Enter news title category">
          </div>
          <div class="form-group has-error"> 
            <span class="help-block">{{$errors->first('name')}}</span>
          </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">{{trans('backend.submit')}}</button>
            <a href="{{route('admin.categories.index')}}"><button type="button" class="btn  btn-danger">{{trans('backend.cancel')}}</button></a>

          </div>
      </form>
    </div>
  </div>
</div>
@endsection