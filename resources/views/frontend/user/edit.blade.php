@extends('frontend.layouts.master')
@section('title','Update Profile - ')
@section('content')
  <!-- page content -->
      <div>
          @if(Session::has('success'))
              <div class="alert alert-success">
                  {{ Session::get('success') }}
              </div>
          @endif
          <div class="row">
              <div class="panel-body">
                  <h2>{!! trans('labels.user') !!}<small>{!! trans('labels.edit') !!}</small></h2>
                  <div class="clearfix"></div>
                  <form id="form-change-password" role="form" method="POST" action="{{route('user.update', $user->id) }}" novalidate class="form-horizontal">
                  {{csrf_field()}}
                  {{ method_field('PUT') }}
                  <div class="col-md-9">
                      <label for="name" class="col-md-4 control-label">{!! trans('labels.fullname') !!}</label>
                      <div class="col-md-8">
                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required="">
                              @if ($errors->has('name'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <label for="email" class="col-md-4 control-label">{!! trans('labels.email') !!}</label>
                      <div class="col-md-8">
                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}" disabled >
                          </div>
                      </div>
                    
                      <label for="sex" class="col-md-4 control-label">{!! trans('labels.sex') !!}</label>
                      <div class="col-md-8">
                          <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                              <label class="radio-inline"><input type="radio" name="sex" value="0" {{$user->sex == \App\Models\AdminUser::SEX_MALE ? 'checked' : '' }}>{!! trans('labels.male') !!}</label>
                              <label class="radio-inline"><input type="radio" name="sex" value="1" {{$user->sex == \App\Models\AdminUser::SEX_FEMALE ? 'checked' : '' }}>{!! trans('labels.female') !!}</label>
                          </div>
                      </div>

                      <label for="birthday" class="col-md-4 control-label">{!! trans('labels.birthday') !!}</label>
                      <div class="bootstrap-timepicker col-md-8">
                          <div class="form-group {{ $errors->has('birthday') ? ' has-error' : '' }}">
                              <div class="input-group">
                                  <input id= "timepicker2" type="text" class="form-control" name="birthday" value="{{$user->birthday}}">
                                  <div class="input-group-addon">
                                      <i class="fa fa-clock-o"></i>
                                  </div>
                              </div>
                               @if ($errors->has('birthday'))
                                  <span class="help-block">
                                       <strong>{{$errors->first('birthday')}}</strong>
                                  </span>
                              @endif
                          </div>
                      <div class="form-group">
                          <div class="col-sm-offset-3 col-sm-6">
                              <button type="submit" class="btn btn-primary">{!! trans('labels.update_account') !!}</button>
                              <button type="button" class="btn btn-success"><a style="color: #ffffff" href="{!! route('home') !!}">{{trans('labels.cancel')}}</a></button>
                          </div>
                      </div>
                  </form>
              </div>
          </div> 
      </div>
  <!-- /page content -->
@endsection
