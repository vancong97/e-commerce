@extends('admin.layout.master')
@section('title', trans('message.createCategory'))
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form action="{{ route('category.store') }}" class="form-horizontal" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                    <h4 class="card-title">{{ trans('message.createCategory')}} </h4>
                    <div class="">&nbsp</div>
                    <div class="">&nbsp</div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                            {{ trans('message.nameCategory') }}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            <span class=" alert-danger">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                            {{ trans('message.descriptionCategory') }}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="description"
                                value="{{ old('description') }}">
                            <span class=" alert-danger">{{ $errors->first('description') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                            {{ trans('message.groupCategory') }}
                        </label>
                        <div class="col-md-9">
                            <select class="select2 form-control custom-select" name="parent"
                                value="{{old('parent')}}" required>
                                <option selected disabled>{{ trans('message.actionCategory') }}</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                @endforeach
                            </select>
                            <span class=" alert-danger">{{ $errors->first('parent') }}</span>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">{{ trans('message.submitCreate') }}</button>
                        <a class="btn btn-danger" href="{{ route('category.index') }}">{{ trans('message.cane') }}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
