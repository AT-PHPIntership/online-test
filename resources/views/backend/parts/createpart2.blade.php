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
          <h3>{{$exam->title}}</h3>
          <h5 class="box-title">{{ trans('exams.part2') }}</h5>
        </div>
        <form action="{!!route('store.part2',$exam->id)!!}" enctype="multipart/form-data" method="POST">
          {{csrf_field()}}
          <div class="box-body">
          <div class="col-md-4 text-center">
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.01') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs1" value="A">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs1" value="B">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs1" value="C">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.02') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs2" value="A">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs2">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs2">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.03') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs3">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs3">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs3">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.04') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs4">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs4">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs4">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.05') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs5">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs5">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs5">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.06') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs6">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs6">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs6">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.07') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs7">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs7">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs7">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.08') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs8">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs8">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs8">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.09') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs9">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs9">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs9">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.10') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs10">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs10">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs10">{{ trans('answer.c') }}
              </label>
            </div>
          </div>
          {{-- <div class="col-md-4 text-center">
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.11') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs11" value="">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs11" value="">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs11" value="">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.12') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs12">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs12">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs12">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.13') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs13">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs13">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs13">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.14') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs14">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs14">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs14">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.15') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs15">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs15">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs15">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.16') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs16">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs16">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs16">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.17') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs17">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs17">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs17">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.18') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs18">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs18">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs18">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.19') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs19">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs19">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs19">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.20') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs20">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs20">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs20">{{ trans('answer.c') }}
              </label>
            </div>
          </div>
          <div class="col-md-4 text-center">
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.21') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs21" value="">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs21" value="">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs21" value="">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.22') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs22">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs22">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs22">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.23') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs23">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs23">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs23">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.24') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs24">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs24">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs24">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.25') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs25">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs25">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs25">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.26') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs26">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs26">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs26">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.27') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs27">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs27">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs27">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.28') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs28">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs28">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs28">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.29') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs29">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs29">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs29">{{ trans('answer.c') }}
              </label>
            </div>
            <div class="row">
              <label class="radio-inline">
                {{ trans('question.30') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs30">{{ trans('answer.a') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs30">{{ trans('answer.b') }}
              </label>
              <label class="radio-inline">
                <input type="radio" name="qs30">{{ trans('answer.c') }}
              </label>
            </div>
          </div> --}}
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
