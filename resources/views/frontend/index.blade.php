@extends('frontend.layouts.master')
@section('content')
<section id="news" class="container content-section text-center news">
    <div class="row">
      <div class="col-lg-12 ">
        <h2>News</h2>
        <p>Tin tuc 1  <a href="#">Learn more...</a>.</p>
        <p>Tin tuc 2  <a href="#">Learn more...</a>.</p>
        <p>Tin tuc 3 <a href="#">Learn more...</a>.</p>
      </div>
    </div>
</section>
<!-- Part Section -->
<section id="download" class="content-section text-center">
  <div class="download-section">
    <div class="container">
      <div class="col-lg-8 col-lg-offset-2">
        <h2>{{ trans('frontend.listening&reading') }}</h2>
        <p>{{ trans('frontend.intro-exam') }}</p>
        <a href="" class="btn btn-default btn-lg"><i class="fa fa-file-audio-o" aria-hidden="true"></i> {{ trans('frontend.listening') }}</a>
        <a href="" class="btn btn-default btn-lg"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> {{ trans('frontend.reading') }}</a>
      </div>
    </div>
  </div>
</section>
<!-- Exam Section -->
<section id="contact" class="container content-section text-center">
  <div class="row">
    <div class="col-lg-12 ">
      <h2>{{trans('frontend.toeic') }}</h2>
      <ul class="list-inline banner-social-buttons">
        @foreach ($examsFinished as $exam)
          <li>
            <a href="{{route('exams.listening',$exam->id)}}" class="btn btn-default btn-lg"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i> <span class="network-name">{{$exam->title}}</span></a>
          </li> 
        @endforeach
        <li>
          <a href="" class="btn btn-default btn-lg"><i class="fa fa-list" aria-hidden="true"></i> <span class="network-name">{{trans('frontend.viewmore')}}</span></a>
        </li>
      </ul>
    </div>
  </div>
</section>
@endsection