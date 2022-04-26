@extends('client.layout.master')
@section('title', trans('message.user'))
@section('content')
<div class="space60">&nbsp;</div>
<div class="container">
 <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
        <div class="row user-infos cyruxx">
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
                <div class="y-5">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ trans('message.user') }}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="col-md-3 col-lg-3 hidden-xs hidden-sm">
                                    <img class="imageindex" src="{{ asset('storage/images/' . $user->image) }}">
                                </div>
                                <div class=" col-md-9 col-lg-9 hidden-xs hidden-sm">
                                    <strong>{{ $user->name }}</strong><br>
                                    <table class="table table-user-information">
                                        <tbody>
                                            <tr>
                                                <td>{{ trans('message.email') }}:</td>
                                                <td>{{ $user->email }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ trans('message.phone') }}:</td>
                                                <td>{{ $user->phone }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ trans('message.address') }}</td>
                                                <td>{{ $user->address }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    <a class="btn btn-sm btn-warning" href="{{ route('edituser', $user->id) }}"
                                        data-toggle="tooltip"
                                        data-original-title="Edit this user">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" href="{{ route('index') }}">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="space60">&nbsp;</div
@endsection
