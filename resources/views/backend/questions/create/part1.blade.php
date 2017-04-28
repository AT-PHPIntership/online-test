@extends('backend.layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{$exam->title}}/{{trans('questions.question')}}/{{trans('questions.part1')}}/{{trans('questions.create')}}</h3>
      </div>
       <form action="{{route('admin.exam.store.part1',$exam->id)}}" enctype="multipart/form-data" method="POST">
        {{csrf_field()}}
        <div class="form-group col-md-12">
          <h4 class="box-title">{{trans('questions.add_question_answer')}}</h4>
            <table class="table no-margin" id="lists">
              <thead>
              <tr>
                <th style="width: 3%">#</th>
                <th style="width: 60%">{{trans('questions.answer')}}</th>
                <th style="width: 30%">{{trans('questions.picture')}}</th>
              </tr>
              </thead>
              <tbody id ="add_question">
              @for($i = 0; $i < \App\Models\Part::NUMBER_QUESTION_PART_1; $i++ )
                <tr id="item">
                  <td>{{$i}}</td>
                  <td>
                    <div class="form-group">
                    <input type="text" name="question[{{$i}}][content][]" value="{{trans('questions.keyA')}}" readonly=""> 
                    <input type="text" name="question[{{$i}}][content][]" value="{{trans('questions.keyB')}}" readonly=""> 
                    <input type="text" name="question[{{$i}}][content][]" value="{{trans('questions.keyC')}}" readonly=""> 
                    <input type="text" name="question[{{$i}}][content][]" value="{{trans('questions.keyD')}}" readonly=""> 
                    <select name="question[{{$i}}][is_correct]"> 
                      <option value="0">{{trans('questions.keyA')}}</option>
                      <option value="1">{{trans('questions.keyB')}}</option>
                      <option value="2">{{trans('questions.keyC')}}</option>
                      <option value="3">{{trans('questions.keyD')}}</option>
                    </select>
                    </div>
                   </td>
                   <td>
                    <input type="file" name="question[{{$i}}][image]" required="">
                    @if ($errors->has('image'))
                      <span class="help-block">{{$errors->first('image')}}</span>
                    @endif
                  </td>
                </tr>
              @endfor
              </tbody>
            </table>
        </div>
        <div class="box-footer col-md-offset-5">
          <a href="{{route('admin.exams.index')}}"><button type="button" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
          <a href="{{}}"><button type="submit" class="btn  btn-danger"><i class="fa fa-step-forward" aria-hidden="true"></i></button></a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection