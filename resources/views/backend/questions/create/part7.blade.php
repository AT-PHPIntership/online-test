@extends('backend.layouts.master')
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{$exam->title}}/{{trans('questions.question')}}/{{trans('questions.part7')}}/{{trans('questions.create')}}</h3>
      </div>
      <form action="{{route('admin.questions.store.part7',$exam->id)}}" enctype="multipart/form-data" method="POST">
        {{csrf_field()}}
        <div >
          <table id="item-img">
            <thead class="add-image">
            <tr>
              <th style="width: 3%">#</th>
              <th style="width: 20%">{{trans('questions.picture')}}</th>
              <th>{{trans('questions.question')}}</th>
              <th></th>
            </tr>
            </thead>
            <tbody class ="add_question">
              @for($i =1; $i<= \App\Models\Question::NUMBER_GROUP_IMAGE; $i++)
              <tr class="group-question">
                <td>{{$i}}</td>
                <td>
                  <div class="form-group {{ $errors->has('questions.'.$i.'.image') ? ' has-error' : '' }}">
                    <input type="file" name="questions[{{$i}}][image]">
                    @if ($errors->has('questions.*.image'))
                      <span class="help-block"> {{ $errors->first('questions.'.$i.'.image') }}</span>
                    @endif
                  </div>
                </td>
                <td>
                 @for($k = 1; $k<= \App\Models\Question::NUMBER_GROUP_QUESTION; $k++)
                  <div class="row">
                    <div  class="form-group question-first {{ $errors->has('questions.'.$i.'.content.question.'.$k) ? ' has-error' : '' }}">
                      <label class="col-md-2">{{trans('questions.question')}} {{$k}}: </label>
                      <input type="text" name="questions[{{$i}}][content][question][{{$k}}]" placeholder="Enter the question " class="col-md-9" value="{{old('questions.'.$i.'.content.question.'.$k)}}">
                      @if ($errors->has('questions.*.content.question.*'))
                        <span class="help-block"> {{ $errors->first('questions.'.$i.'.content.question.'.$k) }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-md-1">{{trans('questions.answer')}}</label>
                    <div class=" form-group col-md-10 " >
                      @for($j = 0; $j < \App\Models\Answer::NUMBER_ANSWER_4; $j++)
                        <div class="col-md-6 {{$errors->has('questions.'.$i.'.content.answer.'.$k.'.'.$j)? ' has-error' : ''}}">
                          {{trans('questions.key'. $j)}}
                          <input class="col-md-12"  type="text" name="questions[{{$i}}][content][answer][{{$k}}][{{$j}}]"  value="{{old('questions.'.$i.'.content.answer.'.$k.'.'.$j)}}" placeholder="Answer {{trans('questions.key'. $j)}}">
                          @if ($errors->has('questions.*.content.answer.*.*'))
                            <span class="help-block"> {{ $errors->first('questions.'.$i.'.content.answer.'.$k.'.'.$j) }}</span>
                          @endif
                        </div>
                      @endfor
                    </div>
                  </div>
                  <div class="form-group correct-answer ">
                  <label>{{trans('questions.correct')}}</label>
                    <select name="questions[{{$i}}][content][correct][{{$k}}]">
                      <option value="">Choose</option>
                      @for($j = 0; $j < \App\Models\Answer::NUMBER_ANSWER_4; $j++)
                        <option value="{{$j}}" {{ old('questions.'.$i.'.content.correct.'.$k).'' == $j.''?'selected':''}}>{{trans('questions.key'.$j)}}</option>
                      @endfor
                    </select>
                    @if ($errors->has('questions.*.content.correct.*'))
                      <span class="help-block"> {{ $errors->first('questions.'.$i.'.content.correct.'.$k) }}</span>
                    @endif
                  </div>
                   @endfor
                </td>
              </tr>
              @endfor
            </tbody>
          </table>
        </div>
        <div class="box-footer col-md-offset-5">
          <a href="{{route('admin.exams.index')}}"><button type="button" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
          <a href=""><button type="submit" class="btn  btn-danger"><i class="fa fa-step-forward" aria-hidden="true"></i></button></a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
