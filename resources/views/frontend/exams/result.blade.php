@extends('frontend.layouts.master')
@section('title',' Resuilt Test - ')
@section('content')

<section id="exams" class="container content-section text-center">
	<h4>{{trans('frontend.yourresult')}} </h4>
	<p>{{trans('frontend.exam')}} : {{$exam->title}}</p>
    <div>
        <div class="col-md-6 col-md-offset-3">
          <table class="table table-bordered">
            <thead>
                <tr>
                  <th>{{trans('frontend.correctlistening')}}</th>
                  <th>{{trans('frontend.point')}} </th>
                  <th>{{trans('frontend.correctreading')}} </th>
                  <th>{{trans('frontend.point')}}  </th>
                  <th>{{trans('frontend.sumpoint')}} </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <td>{{$correctListening}}/100</td>
                <td>{{getListeningScore($correctListening)}}</td>
                  <td>{{$correctReading}}/100</td>
                  <td>{{getListeningScore($correctReading)}}</td>
                  <td>{{getListeningScore($correctReading)+getListeningScore($correctListening)}}</td>
                </tr>
              </tbody>
            </table>
        </div>
    	<div class="col-md-12">
    		<p>{{trans('frontend.bangdiem')}}</p>
    		<img src="{{asset('frontend/images/thang_diem.png')}}" style="height: 800px;width: 550px;">
    	</div>
        <div class="col-md-12">
            <a href="{{ route('home') }}">
                <button type="button" class="btn btn-primary"><span class="light">{!! trans('labels.back_home') !!}</span></button>
            </a>
        </div>
    	
    </div>
</section>
@endsection