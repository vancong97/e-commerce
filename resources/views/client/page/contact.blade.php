@extends('client.layout.master')
@section('title', trans('header.contact'))
@section('content')
    <div class="beta-map">
        <div class="abs-fullwidth beta-map wow flipInX">
            <iframe src="{{ config('config.googlemap') }}" ></iframe>
        </div>
    </div>
@endsection
