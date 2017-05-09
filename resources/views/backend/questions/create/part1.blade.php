@extends('backend.layouts.master')
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3>{{trans('labels.exam').$exam->id}}</h3>
        <h5 class="box-title">{{ trans('exams.part1') }}</h5>
      </div>
       <form action="{{route('admin.questions.store.part1',$exam->id)}}" enctype="multipart/form-data" method="POST">
        {{csrf_field()}}
        <div class="form-group col-md-12">
          <h4 class="box-title">{{trans('questions.add_question_answer')}}</h4>
            <table class="table no-margin" id="lists">
              <thead>
              <tr>
                <th style="width: 3%">#</th>
                <th style="width: 40%">{{trans('questions.answer')}}</th>
                <th style="width: 30%">{{trans('questions.picture')}}</th>
              </tr>
              </thead>
              <tbody id ="add_question">
              @for($i = 1; $i <= \App\Models\Question::NUMBER_QUESTION_PART_1; $i++ )
                <tr id="item">
                  <td>{{ $i }}</td>
                  <td>
                    <div class="form-group">
                      <select name="question[{{$i}}][correct]"> 
                        @for($j = 0; $j < \App\Models\Answer::NUMBER_ANSWER_4; $j++)
                          <option value="{{ $j }}">{{trans('questions.key'. $j)}}</option>
                        @endfor
                      </select>
                    </div>
                   </td>
                   <td>
                     <div class="form-group {{ $errors->has('question.'.$i.'.image') ? ' has-error' : '' }}">
                    <input type="file" name="question[{{$i}}][image]" required="">
                    @if ($errors->has('question.*.image'))
                      <span class="help-block"> {{ $errors->first('question.'.$i.'.image') }}</span>
                    @endif
                    </div>
                  </td>
                </tr>
              @endfor
              </tbody>
            </table>
        </div>
        <div class="box-footer text-center">
          <button type="button" style="width: 92px;" class="btn  btn-default"><a style="color: #000000;" href="{{route('admin.exams.index')}}">{{trans('backend.cancel')}}</a></button>
          <button type="submit" class="btn btn-success">{{trans('backend.next')}}<i class="fa fa-step-forward" aria-hidden="true"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection