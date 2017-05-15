@extends('frontend.layouts.master')
@section('content')

<section id="news" class="container content-section text-center news">
    <div class="row">
        <audio  controls="" src="{{asset(config('constant.upload_file_audio').$exam->audio)}}" style="width: 100%" autoplay="">
        Your browser does not support the audio element.
        </audio>
        <h4 >Time  <span id="countdown" class="timer" style="color: red"></span></h4>
        <form method="POST" id="test" action="{{route('exams.listening.store',$exam->id)}}">
         {{csrf_field()}}
        <div class="part-1 col-md-8">
            <h2>{{trans('exams.part1')}}</h2>
            <?php  $i=0; ?>
            @foreach ($questionsPart1 as $questionPart1)
            <div class="row picture-part1" style="padding-top: 30px">
                <div class="col-md-2"> 
                <h5>{{trans('questions.question')}} {{++$i}}</h5>
                <input type="hidden" name="answers[{{$i}}][question]" value="{{$questionPart1->id}}">
                </div>
                <div class="col-md-4">
                    <img style="height: 250px;width: 250px" src="{{asset(config('constant.upload_questions_img').$questionPart1->questionImage->image)}}">
                </div>
                <div class="col-md-4">
                    <br><br>
                    @for($j = 0; $j < count($questionPart1->answers); $j++)
                    {{trans('questions.key'.$j)}} 
                   <input type="radio" name="answers[{{$i}}][correct]" value="{{$questionPart1->answers[$j]['is_correct']}}"><br><br>
                    @endfor
                </div>
            </div>
            @endforeach
        </div>
        <div class="part-2 col-md-4">
            <h2>{{trans('exams.part2')}}</h2>
            <?php $i = 10;?>
            @foreach ($questionsPart2 as $questionPart2)
                <div class="row row-part2">
                    <div class="col-md-5 col-md-offset-1">
                        <h5>Question {{++$i}}</h5>
                        <input type="hidden" name="answers[{{$i}}][question]" value="{{$questionPart2->id}}">
                    </div>
                    <div class="col-md-6">
                        @for($j = 0; $j < count($questionPart2->answers); $j++)
                         <input type="radio" name="answers[{{$i}}][correct]" value="{{$questionPart2->answers[$j]['is_correct']}}" class="answer-part2"> {{trans('questions.key'.$j)}} 
                        @endfor
                    </div>
                </div>
            @endforeach
        </div>
        <div class="part-3 col-md-6">
            <h2>{{trans('exams.part3')}}</h2>
            <?php $i = 40;?>
            @foreach ($questionsPart3 as $questionPart3)
                <div>
                    <h5>{{trans('questions.question')}} {{++$i}}: <span style="color: red;text-transform: none;">{{$questionPart3->content}}</span></h5>
                    <input type="hidden" name="answers[{{$i}}][question]" value="{{$questionPart3->id}}">
                    @for($j = 0; $j < count($questionPart3->answers); $j++)
                        <input type="radio" name="answers[{{$i}}][correct]" value="{{$questionPart3->answers[$j]['is_correct']}}"> {{trans('questions.key'.$j)}}.  {{$questionPart3->answers[$j]['content']}}<br><br>
                    @endfor
                </div>
            @endforeach
        </div>
        <div class="part-4 col-md-6">
            <h2>{{trans('exams.part4')}}</h2>
                <?php $i = 70;?>
            @foreach ($questionsPart4 as $questionPart4)
            <div>
                <h5>{{trans('questions.question')}} {{++$i}}: <span style="color: red;text-transform: none;">{{$questionPart4->content}}</span></h5>
                <input type="hidden" name="answers[{{$i}}][question]" value="{{$questionPart4->id}}">
                @for($j = 0; $j < count($questionPart4->answers); $j++)
                    <input type="radio" name="answers[{{$i}}][correct]" value="{{$questionPart4->answers[$j]['is_correct']}}"> {{trans('questions.key'.$j)}}.  {{$questionPart3->answers[$j]['content']}}<br><br>
                @endfor
            </div>
            @endforeach
        </div>
        <div class="row align-right col-md-12">
            <button class="btn btn-success next-question">{{trans('frontend.nextpart')}} <i class="fa fa-step-forward" aria-hidden="true"></i></button>
        </div>
        </form>
    </div>
</section>
@endsection