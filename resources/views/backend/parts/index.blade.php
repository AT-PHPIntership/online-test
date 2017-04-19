@extends('backend.layouts.master')
@section('content')
<div class="row">
@if(Session::has('success'))
  <div class="alert alert-success">
      {{ Session::get('success') }}
  </div>
@endif
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">{{trans('parts.table')}}</h3>
        <div class="box-tools">
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>#</th>
            <th style="width:20%">{{trans('parts.title')}}</th>
            <th >{{trans('parts.description')}}</th>
            <th style="width:10%">{{trans('parts.number_answer')}}</th>
            <th style="width:10%">{{trans('parts.number_question')}}</th>
            <th style="width:8%">{{trans('backend.action')}}</th>
          </tr>
          @foreach($parts as $item)
          <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->description}}</td>
            <td>{{$item->number_answer}}</td>
            <td>{{$item->number_question}}</td>
            <td>
              <a href="{{route('admin.parts.edit',$item->id)}}">
              <button type="button" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-edit"></i>
              </button></a>
              <form action="{{route('admin.parts.destroy',$item->id)}}" enctype="multipart/form-data" method="POST">
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
          <li> </li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection