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
                            <form method="post" action="{{ route('updateUser', $user->id) }}" enctype="multipart/form-data">
                                @method('PATCH')
                                {{ csrf_field() }}
                                <div class="col-md-3 col-lg-3 hidden-xs hidden-sm">
                                    <img class="imageindex" src="{{ asset('storage/images/' . $user->image) }}">
                                    <input type="file" name="images">
                                </div>
                                <div class=" col-md-9 col-lg-9 hidden-xs hidden-sm">
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <table class="table table-user-information">
                                        <tbody>
                                            <tr>
                                                <td>{{ trans('message.name') }}:</td>
                                                <td>
                                                    <input type="text" name="name" value="{{ $user->name }}" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ trans('message.email') }}:</td>
                                                <td>
                                                    <input type="email" name="email" value="{{ $user->email }}" disabled>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ trans('message.phone') }}:</td>
                                                <td>
                                                    <input type="text" name="phone" maxlength="10" value="{{ $user->phone }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ trans('message.address') }}</td>
                                                <td>
                                                    <input type="text" name="address" value="{{ $user->address }}">
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <a class="btn btn-sm btn-danger" href="{{ route('index') }}">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
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
