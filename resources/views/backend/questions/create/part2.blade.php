@extends('backend.layouts.master')
@section('content')
<div class="row">
@if(Session::has('success'))
  <div class="alert alert-success">
      {{ Session::get('success') }}
  </div>
@endif
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3>{{trans('labels.exam').$exam->id}}</h3>
          <h5 class="box-title">{{ trans('exams.part2') }}</h5>
        </div>
        <form action="{!!route('admin.questions.store.part2',$exam->id)!!}" enctype="multipart/form-data" method="POST">
          {{csrf_field()}}
          <div class="box-body">
            <div class="row">
                  @for($i =1; $i <= \App\Models\Part::NUMBER_QUESTION_PART_2; $i++)
                    <div class="col-md-4" style="padding-left: 70px">
                      <h4 style ="padding-top: 30px" >{{trans('question.question')}}{{$i}}:</h4>
                      @for($j=0; $j < \App\Models\Answer::NUMBER_ANSWER_PART_2; $j++)
                        <label class="radio-inline">
                          <input  type="radio" name="question[{{$i}}][correct]" value="{{$j}}" {{ old('question.'.$i.'.correct').'' == $j.''?'checked':''}}>{{ trans('question.answer'.$j) }}
                        </label>
                      @endfor
                        @if ($errors->has('question.*.correct'))
                          <span class="help-block">{{$errors->first('question.'.$i.'.correct')}}</span>
                        @endif
                    </div>
                  @endfor
            </div>
          </div>
          <div class="box-footer text-center">
            <button type="button" class="btn btn-primary"><i class="fa fa-step-backward" aria-hidden="true"></i>{{trans('backend.previous')}}</button>
            <button type="button" style="width: 115.69px;" class="btn  btn-default"><a style="color: #000000;" href="{{route('admin.exams.index')}}">{{trans('backend.cancel')}}</a></button>
            <button type="submit" style="width: 115.69px;" class="btn btn-success">{{trans('backend.next')}}<i class="fa fa-step-forward" aria-hidden="true"></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
