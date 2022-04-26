@extends('admin.layout.master')
@section('title', trans('message.dashboardAdmin'))
@section('content')
<div class="page-container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                            <select id="chart" name="chart" class="form-control">
                                <option disabled>{{ trans('message.year') }}</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year->year }}" selected="selected">{{ $year->year }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="card-body">
                            <div class="m-t-10">
                                <canvas id="bar-chart-grouped"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
