@extends('backend.layouts.master')
@section('content')
<!-- page content -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{!! trans('labels.user') !!}<small>{!! trans('labels.show') !!}</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content col-md-6 col-md-offset-3">
                    <div class="box box-warning">
                      <div class="box-body">
                        <form role="form">
                          <div class="form-group">
                            <label>{!! trans('labels.fullname') !!}</label>
                            <input type="text" class="form-control" placeholder="{{$user->name}}" disabled>
                          </div>
                          <div class="form-group">
                            <label>{!! trans('labels.email') !!}</label>
                            <input type="text" class="form-control" placeholder="{{$user->email}}" disabled>
                          </div>
                          <div class="form-group">
                            <label>{!! trans('labels.sex') !!}</label>
                            <input type="text" class="form-control" placeholder="{{$user->sex_label}}" disabled>
                          </div>
                          <div class="form-group">
                            <label>{!! trans('labels.birthday') !!}</label>
                            <input type="text" class="form-control" placeholder="{{ Carbon\Carbon::parse($user->birthday)->format('d-m-Y') }}" disabled>
                          </div>
                          <div class="form-group">
                            <label>{!! trans('labels.created_at') !!}</label>
                            <input type="text" class="form-control" placeholder="{{ Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}" disabled>
                          </div><div class="form-group">
                            <label>{!! trans('labels.updated_at') !!}</label>
                            <input type="text" class="form-control" placeholder="{{ Carbon\Carbon::parse($user->updated_at)->format('d-m-Y') }}" disabled>
                          </div>
                          <div class="text-center">
                          <a href="{{route('admin.user.index')}}" class="btn btn-default"><i class="fa fa-backward"></i>{!! trans('labels.back') !!}</a>
                          </div>
                        </form>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection