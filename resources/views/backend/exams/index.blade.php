@extends('backend.layouts.master')
@section('content')
<div class="row">
@if(Session::has('success'))
  <div class="alert alert-success">
      {{ Session::get('success') }}
  </div>
@endif
  <div class="col-xs-10 col-xs-offset-1">
  <div>
  <button><a href="{{route('admin.exams.create')}}">{{trans('exams.add')}}</a></button>
  </div>
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
              <a href="{{route('admin.exams.edit',$exam->id)}}">
                <button type="button" class="btn btn-block btn-info btn-sm">
                  <i class="fa fa-fw fa-edit"></i>
                </button>
              </a>
              <form action="{{route('admin.exams.destroy',$exam->id)}}" enctype="multipart/form-data" method="POST">
                 {{csrf_field()}}
                {{ method_field('DELETE') }}
                <button type="submit"  onclick="return confirmDelete('Are you want to delete this !!!')" class="btn btn-block btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
               @if($exam->is_finished == \App\Models\Exam::NOT_FINISHED)
                <a href="{{route('create.part2',$exam->id)}}">
                <button type="button" class="btn btn-block btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i></button>
                </a>
                @else
                <a href="">
                  <button type="button" class="btn btn-block btn-success btn-sm">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                  </button>
                </a>
                @endif
              </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
      <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
         <li> {{$exams->render()}}</li> 
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
