@extends('backend.layouts.master')
@section('content')
<div class="row">
@if(Session::has('success'))
  <div class="alert alert-success">
      {{ Session::get('success') }}
  </div>
@endif
  <div class="col-xs-10 col-xs-offset-1">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">{{trans('exams.table')}}</h3>
        <div class="box-tools">
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>#</th>
            <th style="width:25%">{{trans('exams.title')}}</th>
            <th >{{trans('exams.audio')}}</th>
            <th style="width:15%">{{trans('exams.count_test')}}</th>
            <th style="width:8%">{{trans('backend.action')}}</th>
          </tr>
          @foreach($exams as $exam)
          <tr>
            <td>{{$exam->id}}</td>
            <td>{{$exam->title}}</td>
            <td>
              <audio controls>
                <source src="{{asset(config('constant.upload_file_audio').$exam->audio)}}" type="audio/mpeg">
              Your browser does not support the audio element.
              </audio>

            </td>
            <td>{{$exam->count_test}}</td>
            <td>
              <a href="">
              <button type="button" class="btn btn-block btn-info btn-sm">
                <i class="fa fa-fw fa-edit"></i>
              </button></a>
              <form action="" enctype="multipart/form-data" method="POST">
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