@extends('backend.layouts.master')
@section('content')
	<div class="row">
  @if(Session::has('success'))
      <div class="alert alert-success">
          {{ Session::get('success') }}
      </div>
  @endif
  <div class="col-md-10 col-md-offset-1">
  <div>
  <button><a href="{{route('admin.categories.create')}}">{{trans('categories.add')}}</a></button>
  </div>
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">{{trans('categories.list')}}</h3>
      </div>
      <div class="box-body">
        <table class="table table-bordered">
          <tr>
            <th style="width: 5%">#</th>
            <th>{{trans('categories.title')}}</th>
            <th style="width: 15%">{{trans('backend.action')}}</th>
          </tr>
           @foreach($categories as $item)
          <tr>
            <td>{{$item->id}}</td>
            <td>{{ $item->name}}</td>
            <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-success">{{trans('backend.action')}}</button>
                  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    <li>
                      <form action="{!!route('admin.categories.destroy',$item->id)!!}" enctype="multipart/form-data" method="POST">
                        <input type="hidden" name="_token"  value="{!! csrf_token()!!}" onclick="return confirmDelete('Are you want to delete this !!!')"> 
                      {{ method_field('DELETE') }}
                      <input type="submit" name="" onclick="return confirmDelete('Are you want to delete this !!!')" value="{{trans('backend.delete')}}">
                    </form>
                    </li>
                    <li><a href="{{route('admin.categories.edit',$item->id)}}">{{trans('backend.edit')}}</a></li>
                  </ul>
                </div>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
      <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
        <li> {{$categories->render()}}</li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection