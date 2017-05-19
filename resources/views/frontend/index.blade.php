@extends('frontend.layouts.master')
@section('content')
<section id="news" class="container content-section news">
  <div class="row">
    <h2>{{trans('frontend.news')}}</h2>
     <ul class="nav nav-pills">
      <li class="filter" >
        <a href="/">{{trans('frontend.allcategories')}}</a>
      </li>
      @foreach ($categories as $category)
      <li class="filter" >
        <a href="{{route('categories.show', $category ->id)}}">{{$category -> name}}</a>
      </li>
      @endforeach
    </ul>
    @php   
    $i = 0;
    @endphp
    @foreach ($news as $element)
        <div class="col-lg-12 ">
         <p> {{++$i}}. {!!str_limit($element->title,'200')!!}<a href="{{route('news.detail',$element->id)}}"> >></a></p>
        </div>
    @endforeach
    <div class="box-footer clearfix">
      <ul class="pagination pagination-sm no-margin pull-right">
      <li> 
     {{$news -> render()}}
      </li>
      </ul>
    </div>
  </div>
</section>
<!-- Part Section -->
<section id="parts" class="content-section text-center">
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
<section id="exams" class="container content-section text-center">
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