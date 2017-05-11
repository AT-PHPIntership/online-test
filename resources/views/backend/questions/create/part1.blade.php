@extends('backend.layouts.master')
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{$exam->title}}/{{trans('questions.question')}}/{{trans('questions.part1')}}/{{trans('questions.create')}}</h3>
      </div>
       <form action="{{route('admin.questions.store.part1',$exam->id)}}" enctype="multipart/form-data" method="POST">
        {{csrf_field()}}
        <div class="form-group col-md-12">
          <h4 class="box-title">{{trans('questions.add_question_answer')}}</h4>
          @for($i = 1; $i <= \App\Models\Question::NUMBER_QUESTION_PART_1; $i++ )
          <div class="row" style="padding: 10px">
            <div class="col-md-2 col-md-offset-2">
              <em><strong>{{trans('question.question')}}{{ $i }}:</strong></em>
            </div>
            <div class="col-md-2">
              <em><strong>{{trans('questions.answer')}}:</strong></em>
              <select name="question[{{$i}}][correct]"> 
                @for($j = 0; $j < \App\Models\Answer::NUMBER_ANSWER_4; $j++)
                  <option value="{{ $j }}">{{trans('questions.key'. $j)}}</option>
                @endfor
              </select>
            </div>
            <div class="col-md-4">
                <input class="radio-inline" type="file" name="question[{{$i}}][image]" required="">
                @if ($errors->has('question.*.image'))
                  <span class="help-block"> {{ $errors->first('question.'.$i.'.image') }}</span>
                @endif
            </div>
          </div>
          @endfor
        </div>
        <div class="box-footer text-center">
          <a style="color: #ffffff;" href="{{route('admin.exams.index')}}"><button style="width: 91px" type="button" class="btn btn-primary">{{trans('backend.cancel')}}</button></a>
          <a style="color: #ffffff" href=""><button type="submit" class="btn  btn-success">{{trans('part.next_step')}}<i class="fa fa-step-forward" aria-hidden="true"></i></button></a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection