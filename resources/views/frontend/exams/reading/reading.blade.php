@extends('frontend.layouts.master')
@section('title','Test Reading - ')
@section('content')
<section id="exams" class="container content-section">
  <form action="{{route('exam.reading',$exam->id)}}" enctype="multipart/form-data" method="POST" >
    {{csrf_field()}}
    <div class="container">
    <div class="scroll-to-fixed">
        <h4><span id="countdown-reading" class="timer" style="color: red"></span></h4>
        </div>
      <div class="part5">
          <h2 class="text-center">{{trans('exams.part5')}}</h2>
        <?php  $question_start_part_5 = \App\Models\Part::START_PART_5; ?>
        @foreach($questionsPart5 as $questionPart5)
          <div class="part5 col-md-10 col-md-offset-2">
            <div class="content">
              <strong>{{trans('question.number')}}{{++$question_start_part_5}}: </strong> <span style ="color: red;"><strong>{{$questionPart5->content}}</strong></span>
              <input type="hidden" name="answers[{{$question_start_part_5}}][question]" value="{{$questionPart5->id}}">
            </div>
            @for($i = 0; $i < count($questionPart5->answers); $i++)
              <div class="answer">
                <input type="radio" name="answers[{{$question_start_part_5}}][correct]" value="{{$questionPart5->answers[$i]['is_correct']}}"><span style="padding-left: 10px;">{{trans('question.answer'.$i)}}. {{$questionPart5->answers[$i]['content']}}</span>
              </div>
            @endfor 
          </div>
        @endforeach
      </div>
      <div class="part6">
        <h2 class="text-center">{{trans('exams.part6')}}</h2>
        <?php  $question_start_part_6 = \App\Models\Part::START_PART_6; ?>
        <div>
        @foreach($summariesPart6 as $questionsPart6)
          <div class="text-content">
            {!!$questionsPart6->summaryable->content!!}
          </div>
          @foreach($questionsPart6->questions as $questionPart6)
            <div class="col-md-3">
              <div class="content">
                <strong>{{trans('question.number')}}{{++$question_start_part_6}}: </strong>
                <input type="hidden" name="answers[{{$question_start_part_6}}][question]" value="{{$questionPart6->id}}" >
              </div>
              @for($i = 0; $i < count($questionPart6->answers); $i++)
                <div class="answer">
                  <input type="radio" name="answers[{{$question_start_part_6}}][correct]" value="{{$questionPart6->answers[$i]['is_correct']}}"><span style="padding-left: 10px">{{trans('question.answer'.$i)}}. {{$questionPart6->answers[$i]['content']}}</span>
                </div>
              @endfor
            </div>
          @endforeach
        @endforeach 
        </div>
      </div>
      <div class="part7">
        <h2 class="text-center" style="padding-top: 230px">{{trans('exams.part7')}}</h2>
        <?php  $question_start_part_7 = \App\Models\Part::START_PART_7; ?>
        @foreach($summariesPart7 as $questionsPart7)
          <div>
            <div class="text-center">
              <img class="image" style="width: 800px; height: 500px;padding-top: 50px" src="{{ asset(config('constant.upload_questions_img').$questionsPart7->summaryable->image)}}" alt="">
            </div>
            @foreach($questionsPart7->questions as $questionPart7)
              <div class="col-md-6">
                <div class="content">
                  <strong>{{trans('question.number')}}{{++$question_start_part_7}}:</strong><span style ="color: red;"> {{$questionPart7->content}}</span>
                  <input type="hidden" name="answers[{{$question_start_part_7}}][question]" value="{{$questionPart7->id}}" >
                </div>
                @for($i = 0; $i < count($questionPart7->answers); $i++)
                  <div class="answer">
                    <input type="radio" name="answers[{{$question_start_part_7}}][correct]" value="{{$questionPart7->answers[$i]['is_correct']}}"><span style="padding-left: 10px">{{trans('question.answer'.$i)}}. {{$questionPart7->answers[$i]['content']}}</span>
                  </div>
                @endfor
              </div>
            @endforeach
          </div>
        @endforeach
      </div>
    </div>
    <div class="text-center">
      <a href=""><button type="submit" class="btn  btn-success end-test "><i class="fa fa-flag-checkered" aria-hidden="true"></i>{{trans('exams.exam_finish')}}<i class="fa fa-flag-checkered" aria-hidden="true"></i></button></a>
    </div>
  </form>
</section>
@endsection
@section('script')
  <script type="text/javascript" src="{{asset('frontend/js/timereading.js')}}"></script>
@endsection
