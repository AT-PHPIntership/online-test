@extends('backend.layouts.master')
@section('content')
<div class="row">
@if(Session::has('success'))
  <div class="alert alert-success">
      {{ Session::get('success') }}
  </div>
@endif
<div class="col-md-2">
  <a href="{{route('admin.news.create')}}">
  <button type="button" class="btn btn-block btn-info btn-sm"> {{trans('backend.add')}}
  </button></a>
</div>
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">{{trans('news.table')}}</h3>
        <div class="box-tools">
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>#</th>
            <th style="width:25%">{{trans('news.title')}}</th>
            <th >{{trans('categories.category')}}</th>
            <th style="width:15%">{{trans('news.user')}}</th>
            <th style="width:8%">{{trans('backend.action')}}</th>
          </tr>
          @foreach($news as $item)
          <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->category->name}}</td>
            <td>{{$item->adminUser->name}}</td>
            <td>
              <a href="{{route('admin.news.edit',$item->id)}}">
              <button type="button" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-edit"></i>
              </button></a>
              <form action="{{route('admin.news.destroy',$item->id)}}" enctype="multipart/form-data" method="POST">
                 {{csrf_field()}}
                {{ method_field('DELETE') }}
                <button type="submit"  onclick="return confirmDelete('Are you want to delete this !!!')" class="btn btn-block btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
      <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
          <li> {{$news->render()}}</li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
