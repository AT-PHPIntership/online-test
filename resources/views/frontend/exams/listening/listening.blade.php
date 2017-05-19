@extends('frontend.layouts.master')
@section('title','Test Listening - ')
@section('content')

<section id="exams" class="container content-section">
    <div class="row">
        <audio  controls="" src="{{asset(config('constant.upload_file_audio').$exam->audio)}}" style="width: 100%" autoplay="">
        Your browser does not support the audio element.
        </audio>
        <div class="scroll-to-fixed">
        <h4><span id="countdown" class="timer" style="color: red"></span></h4>
        </div>
        <form method="POST" id="test" action="{{route('exams.storeListening',$exam->id)}}">
         {{csrf_field()}}
        <div class="part-1 col-md-12">
            <h2 class="text-center">{{trans('exams.part1')}}</h2>
            <?php  $i=0; ?>
            @foreach ($exam->questionsPart1 as $questionPart1)
                <div class="picture-part1 col-md-6" style="padding-top: 30px">
                    <div>
                        <img style="height: 400px;width: 100%" src="{{asset(config('constant.upload_questions_img').$questionPart1->questionImage->image)}}">
                    </div>
                    <div>
                        <h5 class="text-center" style="padding-top: 20px; color: #339933;">{{trans('questions.question')}} {{++$i}}: 
                        <input type="hidden" name="answers[{{$i}}][question]" value="{{$questionPart1->id}}">
                        @for($j = 0; $j < count($questionPart1->answers); $j++)
                        <span style="padding-left: 20px">{{trans('questions.key'.$j)}} 
                        <input class="radio-inline" type="radio" name="answers[{{$i}}][correct]" value="{{$questionPart1->answers[$j]['is_correct']}}"></span>
                        @endfor
                        </h5>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="part-2 col-md-12">
            <h2 class="text-center">{{trans('exams.part2')}}</h2>
            <?php $i = 10;?>
            @foreach ($exam->questionsPart2 as $questionPart2)
                <div class="row-part2 col-md-4">
                    <div>
                        <h5 style="padding-top: 20px;">{{trans('questions.question')}} {{++$i}}: 
                        <input type="hidden" name="answers[{{$i}}][question]" value="{{$questionPart2->id}}">
                        @for($j = 0; $j < count($questionPart2->answers); $j++)
                            <span style="padding-left: 20px">{{trans('questions.key'.$j)}} 
                            <input class="radio-inline" type="radio" name="answers[{{$i}}][correct]" value="{{$questionPart2->answers[$j]['is_correct']}}" class="answer-part2">
                        @endfor
                        </h5>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="part-3 col-md-12">
            <h2 class="text-center">{{trans('exams.part3')}}</h2>
            <?php $i = 40;?>
            @foreach ($exam->questionsPart3 as $questionPart3)
                <div class="col-md-9 col-md-offset-3">
                    <h5 style="text-align: left;">{{trans('questions.question')}} {{++$i}}: <span style="color: red;text-transform: none;">{{$questionPart3->content}}</span></h5>
                    <input type="hidden" name="answers[{{$i}}][question]" value="{{$questionPart3->id}}">
                    @for($j = 0; $j < count($questionPart3->answers); $j++)
                        <input type="radio" name="answers[{{$i}}][correct]" value="{{$questionPart3->answers[$j]['is_correct']}}"> {{trans('questions.key'.$j)}}.  {{$questionPart3->answers[$j]['content']}}<br><br>
                    @endfor
                </div>
            @endforeach
        </div>
        <div class="part-4 col-md-12">
            <h2 class="text-center">{{trans('exams.part4')}}</h2>
                <?php $i = 70;?>
            @foreach ($exam->questionsPart4 as $questionPart4)
            <div class="col-md-9 col-md-offset-3">
                <h5 style="text-align: left;">{{trans('questions.question')}} {{++$i}}: <span style="color: red;text-transform: none;">{{$questionPart4->content}}</span></h5>
                <input type="hidden" name="answers[{{$i}}][question]" value="{{$questionPart4->id}}">
                @for($j = 0; $j < count($questionPart4->answers); $j++)
                    <input type="radio" name="answers[{{$i}}][correct]" value="{{$questionPart4->answers[$j]['is_correct']}}"> {{trans('questions.key'.$j)}}.  {{$questionPart3->answers[$j]['content']}}<br><br>
                @endfor
            </div>
            @endforeach
        </div>
        <div class="row align-right col-md-12 text-center">
            <button class="btn btn-success next-question">{{trans('frontend.nextpart')}} <i class="fa fa-step-forward" aria-hidden="true"></i></button>
        </div>
        </form>
    </div>
</section>
@endsection
@section('script')
  <script type="text/javascript" src="{{asset('/frontend/js/main.js')}}"></script>
@endsection