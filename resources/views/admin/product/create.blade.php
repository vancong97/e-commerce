@extends('admin.layout.master')
@section('title', trans('message.createProduct'))
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form action="{{ route('product.store') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <h4 class="card-title">{{ trans('message.createProduct') }} </h4>
                    <div class="">&nbsp</div>
                    <div class="">&nbsp</div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                            {{ trans('message.nameProduct') }}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            <span class=" alert-danger">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                            {{ trans('message.nameImage') }}
                        </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="images" >
                            <span class=" alert-danger">{{ $errors->first('images') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                            {{ trans('message.priceProduct') }}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                            <span class=" alert-danger">{{ $errors->first('price') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                            {{ trans('message.statusProduct') }}
                        </label>
                        <div class="col-md-9">
                            <select class="select2 form-control custom-select" name="status" required>
                                <option selected disabled>{{ trans('message.actionStatus') }}
                                </option>
                                <option value="{{ config('config.zero') }}">
                                    {{ trans('message.falseProduct') }}
                                </option>
                                <option value="{{ config('config.one') }}">
                                    {{ trans('message.trueProduct') }}
                                </option>
                            </select>
                            <span class=" alert-danger">{{ $errors->first('status') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                            {{ trans('message.descriptionProduct') }}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                            <span class=" alert-danger">{{ $errors->first('description') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                            {{ trans('message.groupProduct') }}
                        </label>
                        <div class="col-md-9">
                            <select class="select2 form-control custom-select" name="category" required>
                                <option selected disabled>{{ trans('message.actionProduct') }}</option>
                                    @foreach ($categoris as $cate)
                                        <option value="{{ $cate->id }}" >{{ $cate->name }}
                                        </option>
                                    @endforeach
                            </select>
                            <span class=" alert-danger">{{ $errors->first('category') }}</span>
                        </div>
                    </div>
                    {{--  <div class="form-group">
                        <label for="properties">Properties</label>
                        <div class="row">
                            <div class="col-md-2">
                                Key:
                            </div>
                            <div class="col-md-4">
                                Value:
                            </div>
                        </div>
                        @for ($i=0; $i <= 2; $i++)
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="text" name="properties[{{ $i }}][key]" class="form-control" value="{{ old('properties['.$i.'][key]') }}">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="properties[{{ $i }}][value]" class="form-control" value="{{ old('properties['.$i.'][value]') }}">
                                </div>
                            </div>
                        @endfor
                    </div> --}}
                </div>
                <div class="">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">{{ trans('message.submitCreate') }}</button>
                        <a class="btn btn-danger" href="{{ route('product.index') }}">{{ trans('message.cane') }}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
