<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('bower_components/AdminLTE/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
</head>
<body>
  <form action="{{route('exam.reading',$exam->id)}}" enctype="multipart/form-data" method="POST" >
    {{csrf_field()}}
    <div class="container">
    <div class="scroll-to-fixed">
        <h4><span id="countdown-reading" class="timer" style="color: red"></span></h4>
        </div>
      <div class="part5">
        <h4 class="text-center">{{$exam->title}} / {{trans('questions.part5')}}</h4>
        <?php  $question_start_part_5 = \App\Models\Part::START_PART_5; ?>
        @foreach($questionsPart5 as $questionPart5)
          <div class="col-md-3">
            <div class="content">
              <strong>{{trans('question.number')}}{{++$question_start_part_5}}: </strong>{{$questionPart5->content}}
              <input type="hidden" name="answers[{{$question_start_part_5}}][question]" value="{{$questionPart5->id}}">
            </div>
            @for($i = 0; $i < count($questionPart5->answers); $i++)
              <div class="answer">
                <input type="radio" name="answers[{{$question_start_part_5}}][correct]" value="{{$questionPart5->answers[$i]['is_correct']}}"><span style="padding-left: 10px">{{trans('question.answer'.$i)}}. {{$questionPart5->answers[$i]['content']}}</span>
              </div>
            @endfor 
          </div>
        @endforeach
      </div>
      <div class="part6">
        <h4 class="text-center">{{$exam->title}} / {{trans('questions.part6')}}</h4>
        <?php  $question_start_part_6 = \App\Models\Part::START_PART_6; ?>
        @foreach($summariesPart6 as $questionsPart6)
          <div class="text-center content">
            {!!$questionsPart6->summaryable->content!!}
          </div>
          @foreach($questionsPart6->questions as $questionPart6)
            <div class="col-md-3">
              <div class="content">
                <strong>{{trans('question.number')}}{{++$question_start_part_6}}: </strong>{{trans('question.enter_answer')}}
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
      <div class="part7">
        <h4 class="text-center">{{$exam->title}} / {{trans('questions.part7')}}</h4>
        <?php  $question_start_part_7 = \App\Models\Part::START_PART_7; ?>
        @foreach($summariesPart7 as $questionsPart7)
          <div>
            <div class="text-center content">
              <img class="image" src="{{ asset(config('constant.upload_questions_img').$questionsPart7->summaryable->image)}}" alt="">
            </div>
            @foreach($questionsPart7->questions as $questionPart7)
              <div class="col-md-3">
                <div class="content">
                  <strong>{{trans('question.number')}}{{++$question_start_part_7}}:</strong> {{$questionPart7->content}}
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
</body>
<!-- jQuery 2.2.3 -->
<script src="{{ asset('bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('bower_components/AdminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src={{asset('frontend/js/timereading.js')}}></script>
</html>