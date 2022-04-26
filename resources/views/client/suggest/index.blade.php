@extends('client.layout.master')
@section('title', trans('header.suggest'))
@section('content')
<div class="space60">&nbsp;</div>
<div class="container">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
        <div class="row user-infos cyruxx">
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-1 col-lg-offset-1">
                <div class="panel-body">
                        <div class="row">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="fname" class="col-md-3 text-right control-label col-form-label">
                                            {{ trans('message.nameProduct') }}
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                            <span class=" alert-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                                            {{ trans('message.priceProduct') }}
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="price" value="{{ old('price') }}" required>
                                            <span class=" alert-danger">{{ $errors->first('price') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                                            {{ trans('message.nameImage') }}
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="images" required >
                                            <span class=" alert-danger">{{ $errors->first('images') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                                            {{ trans('message.descriptionProduct') }}
                                        </label>
                                        <div class="col-sm-9">
                                            <textarea rows="4" class="form-control" name="description" required>
                                            </textarea>
                                            <span class=" alert-danger">{{ $errors->first('description') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">{{ trans('message.submitCreate') }}
                                    </button>
                                    <a class="btn btn-danger" href="{{ route('index') }}">{{ trans('message.cane') }}</a>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="space60">&nbsp;</div>
@endsection
