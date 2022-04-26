@extends('admin.layout.master')
@section('title', trans('message.user'))
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form action="{{ route('user.update', $user->id) }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                @method('PUT')
                {{ csrf_field() }}
                <div class="card-body">
                    <h4 class="card-title">{{ trans('message.user')}} </h4>
                    <div class="">&nbsp</div>
                    <div class="">&nbsp</div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                            {{ trans('message.nameUser') }}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            <span class=" alert-danger">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                            {{ trans('message.email') }}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                            <span class=" alert-danger">{{ $errors->first('email') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                            {{ trans('message.phone') }}
                        </label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control" maxlength="10" name="phone" value="{{ $user->phone }}">
                            <span class=" alert-danger">{{ $errors->first('phone') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                            {{ trans('message.address') }}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                            <span class=" alert-danger">{{ $errors->first('address') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                            {{ trans('message.imageUser') }}
                        </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="images" >
                            <img class="image" src="{{ asset('storage/images/' . $user->image) }}">
                            <span class=" alert-danger">{{ $errors->first('images') }}</span>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">{{ trans('message.submitEditCategory') }}</button>
                        <a class="btn btn-danger" href="{{ route('user.index') }}">
                            {{ trans('message.cane') }}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
