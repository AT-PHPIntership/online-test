@extends('backend.layouts.master')
@section('content')
<!-- page content -->
    <div class="container">
        @if(Session::has('errors'))
            <div class="alert alert-success">
                {{ Session::get('errors') }}
            </div>
        @endif
        <div class="row">
            <div class="x_title">
                <h2>{!! trans('labels.admin_user') !!}<small>{!! trans('labels.edit') !!}</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <form id="form-change-password" role="form" method="POST" action="{!! route('admin.admin-user.update', $adminUser->id) !!}" novalidate class="form-horizontal">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                {{ method_field('PUT') }}
                <div class="col-md-9">
                    <div>
                        <span>{!! trans('labels.update_information') !!}</span>
                    </div>
                  
                    <label for="name" class="col-md-4 control-label">{!! trans('labels.fullname') !!}</label>
                    <div class="col-md-8">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input id="name" type="text" class="form-control" name="name" value="{{$adminUser->name}}">
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
                            <input id="email" type="email" class="form-control" name="email" value="{{$adminUser->email}}" disabled >

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                  
                    <label for="sex" class="col-md-4 control-label">{!! trans('labels.sex') !!}</label>
                    <div class="col-md-8">
                        <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                            <label class="radio-inline"><input type="radio" name="sex" value="0" {{$adminUser->sex == \App\Models\AdminUser::SEX_MALE ? 'checked' : '' }}>{!! trans('labels.male') !!}</label>
                            <label class="radio-inline"><input type="radio" name="sex" value="1" {{$adminUser->sex == \App\Models\AdminUser::SEX_FEMALE ? 'checked' : '' }}>{!! trans('labels.female') !!}</label>

                            @if ($errors->has('sex'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('sex') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <label for="birthday" class="col-md-4 control-label">{!! trans('labels.birthday') !!}</label>
                    <div class="bootstrap-timepicker col-md-8">
                        <div class="form-group {{ $errors->has('birthday') ? ' has-error' : '' }}">
                            <div class="input-group">
                                <input id= "timepicker2" type="text" class="form-control" name="birthday" value="{{$adminUser->birthday}}">
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
                    <div class="form-group{{ $errors->has('old') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Old Password</label>
                    
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="old">
                    
                            @if ($errors->has('old'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('old') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>
                
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password">
                
                            @if ($errors->has('password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    {{-- <div>
                        <span>{!! trans('labels.update_password') !!}</span>
                    </div>

                    <label for="oldPassword" class="col-sm-4 control-label">{!! trans('labels.old_password') !!}</label>
                    <div class="col-sm-8">
                        <div class="form-group {{ $errors->has('oldPassword') ? ' has-error' : '' }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                            <input type="password" class="form-control"  name="old_password" placeholder="Old Password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('oldPassword') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <label for="newPassword" class="col-sm-4 control-label">{!! trans('labels.new_password') !!}</label>
                    <div class="col-sm-8">
                        <div class="form-group{{ $errors->has('newPassword') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" name="new_password" placeholder="New Password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('newPassword') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <label for="password_confirmation" class="col-sm-4 control-label">{!! trans('labels.repassword') !!}</label>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <input type="password" class="form-control" id="password_confirmation" name="new_password_confirmation" placeholder="Re-enter Password">
                        </div>
                    </div>
                    </div> --}}
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-6">
                            <button type="submit" class="btn btn-primary">{!! trans('labels.update_account') !!}</button>
                            <button type="submit" class="btn btn-default"><a href="{!! route('admin.admin-user.index') !!}">{{trans('labels.cancel')}}</a></button>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
    </div>
<!-- /page content -->
@endsection

<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Change Password</div>
                <div class="panel-body">
                @if (Session::has('success'))
                    <div class="alert alert-success">{!! Session::get('success') !!}</div>
                @endif
                @if (Session::has('failure'))
                    <div class="alert alert-danger">{!! Session::get('failure') !!}</div>
                @endif
                <form action="" method="post" role="form" class="form-horizontal">
                    {{csrf_field()}}
 
                        <div class="form-group{{ $errors->has('old') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Old Password</label>
 
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="old">
 
                                @if ($errors->has('old'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('old') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>
 
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">
 
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
 
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
 
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
 
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
 
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary form-control">Submit</button>
                                </div>
                        </div>
                </form>
                </div>
 
            </div>
        </div>
    </div>
</div> -->