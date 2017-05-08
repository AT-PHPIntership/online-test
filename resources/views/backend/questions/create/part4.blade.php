@extends('backend.layouts.master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{$exam->title}}/{{trans('questions.question')}}/{{trans('questions.part4')}}/{{trans('questions.create')}}</h3>
      </div>
      <form action="{{route('admin.questions.store.part4',$exam->id)}}" enctype="multipart/form-data" method="POST" >
        {{csrf_field()}}
        <div class="form-group col-md-12">
          <h4 class="box-title">{{trans('questions.part4')}} ( {{trans('questions.question.71.to.100')}})</h4>
          <table class="table no-margin" id="lists">
            <thead>
            <tr>
               <th style="width: 3%">#</th>
              <th style="width: 80%">{{trans('questions.question')}} & {{trans('questions.answer')}}</th>
              <th style="width: 8%">Correct Answer</th>
            </tr>
            </thead>
            <tbody id ="add_question">
              @for($i = 1; $i <= \App\Models\Question::NUMBER_QUESTION_PART_4; $i++ )
                <tr id="item">
                  <td>{{ $i }}</td>
                  <td>
                    <div class="row">
                      <div  class="form-group {{ $errors->has('question.'.$i.'.content') ? ' has-error' : '' }}">
                        <label class="col-md-2">{{trans('questions.question')}} : </label>
                        <input type="text" name="question[{{$i}}][content]" placeholder="Enter the question {{$i+70}}" class="col-md-9"  value="{{old('question.'.$i.'.content')}}">
                        @if ($errors->has('question.*.content'))
                          <span class="help-block col-md-10 col-md-offset-2 " > {{ $errors->first('question.'.$i.'.content') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-md-1">{{trans('questions.answer')}}</label>
                      <div class=" form-group col-md-10" >
                        @for($j = 0; $j < \App\Models\Answer::NUMBER_ANSWER_4; $j++)
                          <div class="col-md-6 {{ $errors->has('question.'.$i.'.answer.'.$j) ? ' has-error' : '' }}">
                            {{trans('questions.key'. $j)}} <input class="col-md-12"  type="text" name="question[{{$i}}][answer][{{$j}}]"  value="{{old('question.'.$i.'.answer.'.$j)}}"  placeholder="Answer {{trans('questions.key'. $j)}}">
                            @if ($errors->has('question.*.answer.*'))
                              <span class="help-block"> {{ $errors->first('question.'.$i.'.answer.'.$j) }}</span>
                            @endif
                          </div>
                        @endfor
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="form-group {{ $errors->has('question.'.$i.'.content') ? ' has-error' : '' }}">
                      <select name="question[{{$i}}][correct]">
                        <option value="">Choose</option>
                        @for($j = 0; $j < \App\Models\Answer::NUMBER_ANSWER_4; $j++)
                          <option value="{{ $j }}" {{ old('question.'.$i.'.correct').'' == $j.''?'selected':''}}>{{trans('questions.key'. $j)}}</option>
                        @endfor
                      </select>
                      @if ($errors->has('question.*.correct'))
                        <span class="help-block"> {{ $errors->first('question.'.$i.'.correct') }}</span>
                      @endif
                    </div>
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
