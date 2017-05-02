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
          <h5 class="box-title">{{ trans('exams.part3') }}</h5>
        </div>
        <form action="{!!route('store.part3',$exam->id)!!}" enctype="multipart/form-data" method="POST">
          {{csrf_field()}}
          <div class="box-body">
            <div class="row">
              @for($i =1; $i <= \App\Models\Part::NUMBER_QUESTION_PART_3; $i++)
                <div class="col-md-6">
                  <h4 style ="padding-top: 30px" >{{trans('question.number')}}{{$i}}{{trans('question.:')}}
                  <input type="text" class="form-control radio-inline part3" name="question[{{$i}}][content]" style ="width: 332px;" placeholder="Enter content question {{$i}}" value="{{old('question.'.$i.'.content')}}">
                  @if ($errors->has('question.*.content'))
                    <span class="help-block">{{$errors->first('question.'.$i.'.content')}}</span>
                  @endif
                  </h4>

                  @for($j=0; $j < \App\Models\Answer::NUMBER_ANSWER_PART_3; $j++)
                    <label>
                      <input  type="radio" name="question[{{$i}}][correct]" value="{{$j}}" {{ old('question.'.$i.'.correct').'' == $j.''?'checked':''}}>{{ trans('question.answer'.$j) }}
                      <input type="text" class="radio-inline" name="question[{{$i}}][answer][{{$j}}]"  value="{{old('question.'.$i.'.answer.'.$j)}}" style ="margin-right: 30px; margin-left: 15px;" placeholder="Enter Answer {{trans('question.answer'.$j) }}">
                      @if ($errors->has('question.*.answer.*'))
                        <span class="help-block">{{$errors->first('question.'.$i.'.answer.'.$j)}}</span>
                      @endif
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
            <button type="submit" class="btn btn-primary">{{trans('backend.submit')}}</button>
            <button type="button" class="btn  btn-default"><a style="color: #000000" href="{{route('admin.exams.index')}}">{{trans('backend.cancel')}}</a></button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
