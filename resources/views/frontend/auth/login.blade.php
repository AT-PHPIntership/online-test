@extends('frontend.auth.layouts.master')

@section('content')
<div class="container">
    <div class="row"  style="margin-top: 120px;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center" style="background: #3097d1; color: #ffffff"><strong>{!! trans('labels.login') !!}</strong></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{!! trans('labels.email') !!}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">{!! trans('labels.password') !!}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {!! trans('labels.remember') !!}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center">
                                <button type="submit" class="btn btn-success">
                                    {!! trans('labels.login') !!}
                                </button>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {!! trans('labels.forgot_pass') !!}
                                </a>
                                <a class="btn btn-link" href="{{ route('home') }}">
                                    <span class="light">{!! trans('labels.back_home') !!}</span>
                                </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
