@extends('backend.layouts.master')
@section('content')
<!-- page content -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{!! trans('labels.part') !!}<small>{!! trans('labels.list') !!}</small></h2>
                    <div class="clearfix"></div>
                </div>
                @if (count($parts))
                <div class="x_content">
                    <table id="list_parts" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>{!! trans('labels.id') !!}</th>
                                <th>{!! trans('labels.title') !!}</th>
                                <th>{!! trans('labels.description') !!}</th>
                                <th>{!! trans('labels.created_at') !!}</th>
                                <th>{!! trans('labels.updated_at') !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($parts as $part)
                            <tr>
                                <td>{{ $part->id }}</td>
                                <td>{{ $part->title }}</td>
                                <td>{{ $part->description }}</td>
                                <td>{{ Carbon\Carbon::parse($part->created_at)->format('d-m-Y') }}</td>
                                <td>{{ Carbon\Carbon::parse($part->updated_at)->format('d-m-Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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