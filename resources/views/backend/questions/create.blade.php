@extends('backend.layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{trans('questions.question')}}</h3>
      </div>
       <form action="{{route('admin.questions.store')}}" enctype="multipart/form-data" method="POST">
        {{csrf_field()}}
        <div class="box-body">
          <div class="form-group col-md-6 {{ $errors->has('exam_id') ? ' has-error' : '' }}" >
            <label>Exam</label>
            <select class="form-control select2" name="exam_id" style="width: 100%;" required="">
              <option value="">-- Choose --</option>
              @foreach($exams as $exam)
              <option value="{{$exam->id}}">{{$exam->title}}</option>
              @endforeach
            </select>
            @if ($errors->has('exam_id'))
              <span class="help-block">{{$errors->first('exam_id')}}</span>
            @endif
          </div>
        </div>
        <div class="box-body">
          <div class="box-header with-border">
            <h3 class="box-title">Part 1</h3>
          </div>
        </div>
        <div class="form-group col-md-12">
          <h3 class="box-title">{{trans('questions.add')}}</h3>
            <table class="table no-margin" id="lists">
              <thead>
              <tr>
                <th style="width: 2%">#</th>
                <th style="width: 50%">{{trans('questions.question')}}</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody id ="add_question">
              <tr id="item">
                <td style="width: 2%"><input type="text" name="" class="question_id" value="1"></td>
                <td>
                <input type="text" class="form-control" name="content[]" placeholder="Enter the question" required="">
                @if ($errors->has('content'))
                  <span class="help-block">{{$errors->first('content')}}</span>
                @endif
                </td>
                <td>
                <input type="file" name="image[]" required="">
                </td>
                <td><a class="delete_question"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
              </tr>
              </tbody>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><a id="add" class="add_to_question"><i class="fa fa-plus" aria-hidden="true"></i></a></td>
              </tr>
            </table>
        </div>
        <div class="box-footer col-md-offset-5">
          <button type="button" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></button>
          <a href=""><button type="submit" class="btn  btn-danger"><i class="fa fa-step-forward" aria-hidden="true"></i></button></a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection