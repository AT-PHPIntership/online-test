@extends('backend.layouts.master')
@section('content')

<div class="row">
@if(Session::has('success'))
  <div class="alert alert-success">
      {{ Session::get('success') }}
  </div>
@endif
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{$exam->title}}/{{trans('questions.question')}}/{{trans('questions.part6')}}/{{trans('questions.create')}}</h3>
      </div>
       <form action="{{route('admin.questions.store.part6',$exam->id)}}" enctype="multipart/form-data" method="POST">
        {{csrf_field()}}
        <div class="form-group col-md-12">
          @for($i = \App\Models\Question::NUMBER_QUESTION_START_PART_6; $i <=\App\Models\Question::NUMBER_QUESTION_END_PART_6; $i = $i + \App\Models\Question::NUMBER_QUESTION_GROUP_PART_6)
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">{{trans('part.content_question_group').$i}}{{trans('part.to').($i+\App\Models\Question::NUMBER_GROUP_PART_6)}}</h3>
                <div class="pull-right box-tools">
                  <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                </div>
              </div>
              <div class="box-body pad">
                <textarea class="textarea" name="group[{{$i}}][content]" placeholder="Entent content for group question" style="width: 100%; height: 200px; font-size: 14px;line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('group.'.$i.'.content')}}
                </textarea>
                @if ($errors->has('group.*.content'))
                  <span style= "color: red" class="text-center help-block">{{$errors->first('group.'.$i.'.content')}}</span>
                @endif
              </div>
              <div class="row">
               @for($j =1; $j <= \App\Models\Question::NUMBER_QUESTION_GROUP_PART_6; $j++)
                 <div class="col-md-6">
                   <h4 style ="padding-top: 30px" >{{trans('question.number')}} {{$j+\App\Models\Part::START_PART_6}} :</h4>
                   @for($k=0; $k < \App\Models\Answer::NUMBER_ANSWER_4; $k++)
                    <label>
                      <input  type="radio" name="group[{{$i}}][question][{{$j}}][correct]" value="{{$k}}" {{ old('group.'.$i.'.question.'.$j.'.correct').'' == $k.''?'checked':''}}>{{ trans('question.answer'.$k) }}
                      <input type="text" class="radio-inline" name="group[{{$i}}][question][{{$j}}][answer][{{$k}}]"  value="{{old('group.'.$i.'.question.'.$j.'.answer.'.$k)}}" style ="margin-right: 30px; margin-left: 15px;" placeholder="Enter Answer {{trans('question.answer'.$k) }}">
                      @if ($errors->has('group.*.question.*.answer.*'))
                        <span style= "color: red" class=" col-md-6 help-block">{{$errors->first('group.'.$i.'.question.'.$j.'.answer.'.$k)}}</span>
                      @endif
                    </label>
                   @endfor
                   @if ($errors->has('group.*.question.*.correct'))
                     <span style= "color: red" class="col-md-offset-2 help-block">{{$errors->first('group.'.$i.'.question.'.$j.'.correct')}}</span>
                   @endif
                 </div>
               @endfor
              </div>
            </div>
          @endfor
        </div>
        <div class="box-footer text-center">
          <a style="color: #ffffff" href=""><button style="width: 110px" type="button" class="btn  btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i>{{trans('part.previous_step')}}</button></a>
          <a style="color: #ffffff;" href="{{route('admin.exams.index')}}"><button style="width: 110px" type="button" class="btn btn-primary">{{trans('backend.cancel')}}</button></a>
          <a style="color: #ffffff" href=""><button style="width: 110px" type="submit" class="btn  btn-success">{{trans('part.finished')}}</button></a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection