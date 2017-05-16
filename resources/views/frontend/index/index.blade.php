@extends('frontend.layouts.master')
@section('content')
<section id="news" class="container content-section text-center news">
    <div class="row">
      <div class="col-lg-12 ">
        <h2>News</h2>
        <p>Khi dự thi TOEIC, một trong những điều kiện tiên quyết để dành được tối đa điểm số đó là hiểu rõ về <span>cấu trúc đề thi TOEIC,</span> <a href="#">Learn more...</a>.</p>
        <p>Nếu nắm rõ cấu trúc của bài thi (đề thi), bạn sẽ có chiến lược làm bài phù hợp, tiết kiệm được thời gian và dành trọn số điểm của từng phần.</p>
        <p>Vậy một bài thi TOEIC gồm bao nhiêu phần? Mỗi phần có bao nhiêu câu? Mỗi câu được tính bao nhiêu điểm? Thời gian làm bài được tính như thế nào? <a href="news.html">Learn more...</a> </p>
      </div>
    </div>
</section>
<!-- Part Section -->
<section id="download" class="content-section text-center">
  <div class="download-section">
    <div class="container">
      <div class="col-lg-8 col-lg-offset-2">
        <h2>The TOEIC Listening and Reading test</h2>
        <p>The Listening and Reading test takes 2.5 hours and has two sections:</p>
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
      <p>The Test of English for International Communication is produced by ETS® (Educational Testing Service).
        TOEIC test questions are based on real-life work settings in an international environment (meetings, travel, telephone conversations, etc). </p>
      <ul class="list-inline banner-social-buttons">
        @foreach ($exams as $exam)
          <li>
            <a href="" class="btn btn-default btn-lg"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i> <span class="network-name">{{$exam->title}}</span></a>
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