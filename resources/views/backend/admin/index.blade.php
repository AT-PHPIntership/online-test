@extends('backend.layouts.master')
@section('content')
<!-- page content -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{!! trans('labels.admin_user') !!}<small>{!! trans('labels.list') !!}</small></h2>
                    <button class="btn btn-primary"><i class="fa fa-plus"></i>{!! trans('labels.create') !!}</button>
                    <div class="clearfix"></div>
                </div>
                @if (count($adminUsers))
                <div class="x_content">
                    <table id="list_users" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>{!! trans('labels.id') !!}</th>
                                <th>{!! trans('labels.fullname') !!}</th>
                                <th>{!! trans('labels.email') !!}</th>
                                <th>{!! trans('labels.sex') !!}</th>
                                <th>{!! trans('labels.birthday') !!}</th>
                                <th class="text-center">{!! trans('labels.action') !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($adminUsers as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->sex_label}}</td>
                                <td>{{ Carbon\Carbon::parse($user->birthday)->format('d-m-Y') }}</td>
                                <td class="text-center">
                                    <a href="{{route('admin.admin-user.edit',$user->id)}}" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i>{!! trans('labels.bt_edit') !!}</a>
                                    <form action="{!!route('admin.admin-user.destroy',$user->id)!!}" enctype="multipart/form-data" method="POST">
                                        <input type="hidden" name="_token"  value="{!! csrf_token()!!}"> 
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-xs" name="" onclick="return confirmDelete('Are you want to delete this !!!')"><i class="fa fa-remove"></i>{!! trans('labels.delete') !!}</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$adminUsers->render()}}  
                </div>
                @else
                    <br>
                    <div class="alert alert-info">
                        {!! trans('labels.no_data') !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
<!-- /page content -->
@endsection