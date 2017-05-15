<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('bower_components/AdminLTE/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
</head>
<body>
  <form action="{{route('exam.get.reading',$exam->id)}}" enctype="multipart/form-data" method="POST" >
    {{csrf_field()}}
    <div class="container">
      <div class="part6">
        <h4 class="text-center">{{$exam->title}} / {{trans('questions.part6')}}</h4>
        @foreach($summaries as $questionsPart6)
          <div>
            <div class="text-center">
              {!!$questionsPart6->summaryable->content!!}
            </div>
            @foreach($questionsPart6->questions as $question)
            {{-- {{dd($question)}} --}}
              <div class="col-md-3">
                {{trans('question.number')}}{{$question->id}} :
                @foreach($question->answers as $answer)
                  <div>
                    <input type="radio" name="question[{{$question->id}}][correct][{{$answer->id}}]">{{$answer->content}}
                  </div>
                @endforeach
              </div>
            @endforeach
          </div>
        @endforeach 
      </div>
      <div class="part7">
        <h4 class="text-center">{{$exam->title}} / {{trans('questions.part7')}}</h4>
      </div>
    </div>
  </form>
</body>
<!-- jQuery 2.2.3 -->
<script src="{{ asset('bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('bower_components/AdminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
</html>