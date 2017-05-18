@extends('frontend.layouts.master')
@section('title',$news->title)
@section('content')

<section id="news" class="container content-section text-center news" style="background-color: white;color: black">
 <h3>{{$news->title}}</h3>
 <div>{!!$news->content!!}</div>
</section>
@endsection
@section('script')
  <script type="text/javascript" src="{{asset('/frontend/js/main.js')}}"></script>
@endsection