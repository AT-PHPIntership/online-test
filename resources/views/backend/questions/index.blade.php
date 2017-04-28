@extends('backend.layouts.master')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Question Table</h3>
        <div class="box-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

            <div class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tbody><tr>
            <th>ID</th>
            <th>Question</th>
            <th>Part</th>
            <th>Exams</th>
          </tr>
          @foreach($questions as $question)
          <tr>
            <td>{{$question->id}}</td>
            <td>{{$question->content}}</td>
            <td>{{$question->part->title}}</td>
            <td>{{$question->exam->title}}</td>
          </tr>
          @endforeach
        </tbody></table>
      </div>
      <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
        <li> {{$questions->render()}}</li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection