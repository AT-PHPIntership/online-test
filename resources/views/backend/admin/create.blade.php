@extends('backend.layouts.master')
@section('content')
<!-- page content -->
    <div class="container">
        <div class="row">
            <div class="x_title">
                <h2>{!! trans('labels.admin_user') !!}<small>{!! trans('labels.add') !!}</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{!! route('admin.admin-user.store') !!}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">{!! trans('labels.fullname') !!}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">{!! trans('labels.email') !!}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">{!! trans('labels.sex') !!}</label>

                        <div class="col-md-6">
                            <label class="radio-inline"><input type="radio" name="sex" value="0" checked="checked">{!! trans('labels.male') !!}</label>
                            <label class="radio-inline"><input type="radio" name="sex" value="1">{!! trans('labels.female') !!}</label>

                            @if ($errors->has('sex'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('sex') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('birthday') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">{!! trans('labels.birthday') !!}</label>

                        <div class="bootstrap-timepicker col-md-6">
                                <div class="input-group">
                                    <input id= "timepicker2" type="text" class="form-control" name="birthday">
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
                    </div>        

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">{!! trans('labels.password') !!}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" >

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">{!! trans('labels.repassword') !!}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                {!! trans('labels.add_account') !!}
                            </button>
                            <button type="button" class="btn  btn-warning"><a href="{!! route('admin.admin-user.index') !!}">{{trans('labels.cancel')}}</a></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- /page content -->
@endsection