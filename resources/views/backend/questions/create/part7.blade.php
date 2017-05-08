@extends('backend.layouts.master')
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{$exam->title}}/{{trans('questions.question')}}/{{trans('questions.part7')}}/{{trans('questions.create')}}</h3>
      </div>
       <form action="{{route('admin.questions.store.part1',$exam->id)}}" enctype="multipart/form-data" method="POST">
        {{csrf_field()}}
        <div class="form-group col-md-12">
          <a href="#" class="add-img">ADD</a>
        </div>
        <div class="box-footer col-md-offset-5">
          <a href="{{route('admin.exams.index')}}"><button type="button" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></button></a>
          <a href=""><button type="submit" class="btn  btn-danger"><i class="fa fa-step-forward" aria-hidden="true"></i></button></a>
        </div>
      </form>
      <table hidden="">
        <tr id="template-add-question">
          <td colspan="2"></td>
          <td>
            <div class="row">
              <div  class="form-group">
                <label class="col-md-2">{{trans('questions.question')}} : </label>
                <input type="text" name="question[][content]" placeholder="Enter the question " class="col-md-9" value="">
              </div>
            </div>
            <div class="row">
              <label class="col-md-1">{{trans('questions.answer')}}</label>
              <div class=" form-group col-md-10" >
                @for($j = 0; $j < \App\Models\Answer::NUMBER_ANSWER_4; $j++)
                  <div class="col-md-6">
                    {{trans('questions.key'. $j)}} <input class="col-md-12"  type="text" name=""  value=""  placeholder="Answer {{trans('questions.key'. $j)}}">
                   
                  </div>
                @endfor
              </div>
            </div>
            <div></div>
          </td>
          <td>
            <div class="form-group ">
              <select name="question[][correct]">
                <option value="">Choose</option>
                @for($j = 0; $j < \App\Models\Answer::NUMBER_ANSWER_4; $j++)
                  <option value="" ></option>
                @endfor
              </select>
            </div>
           </td>
        </tr>
      </table>
      <div hidden="">
        <table id="item-img">
          <thead class="add-image">
          <tr>
            <th style="width: 3%">#</th>
            <th style="width: 30%">{{trans('questions.picture')}}</th>
            <th>Question</th>
            <th>Correct</th>
            <th></th>
          </tr>
          </thead>
          <tbody class ="add_question">
            <tr >
              <td>1</td>
              <td>
                <div class="form-group">
                  <input type="file" name="question[image]" required="">
                </div>
              </td>
              <td>
                <div class="row">
                  <div  class="form-group">
                    <label class="col-md-2">{{trans('questions.question')}} : </label>
                    <input type="text" name="question[][content]" placeholder="Enter the question " class="col-md-9" value="">
                  </div>
                </div>
                <div class="row">
                  <label class="col-md-1">{{trans('questions.answer')}}</label>
                  <div class=" form-group col-md-10" >
                    @for($j = 0; $j < \App\Models\Answer::NUMBER_ANSWER_4; $j++)
                      <div class="col-md-6">
                        {{trans('questions.key'. $j)}} <input class="col-md-12"  type="text" name=""  value=""  placeholder="Answer {{trans('questions.key'. $j)}}">
                      </div>
                    @endfor
                  </div>
                </div>
              </td>
              <td>
                <div class="form-group ">
                  <select name="question[][correct]">
                    <option value="">Choose</option>
                    @for($j = 0; $j < \App\Models\Answer::NUMBER_ANSWER_4; $j++)
                      <option value="" >{{trans('questions.key'.$j)}}</option>
                    @endfor
                  </select>
                </div>
              </td>
              <td><a href="#" class="btn-add">add-ahihi</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection