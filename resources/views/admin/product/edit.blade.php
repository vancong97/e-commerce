@extends('admin.layout.master')
@section('title', trans('message.editProduct'))
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <a data-id="{{ $product->id }}" data-url="{{ route('product.edit', $product->id) }}"
                class=" edit_properties btn-primary">
                {{ trans('Add') }}
            </a>
            <form action="{{ route('product.update', $product->id) }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                @method('PUT')
                {{ csrf_field() }}
                <div class="card-body">
                    <h4 class="card-title">{{ trans('message.editProduct')}} </h4>
                    <div class="">&nbsp</div>
                    <div class="">&nbsp</div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                            {{ trans('message.nameProduct') }}
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                            <span class=" alert-danger">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                            {{ trans('message.nameImage') }}
                        </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="images" >
                                @foreach ($image as $imag)
                                    <img class="image" src="{{ asset('storage/images/' . $imag->image) }}">
                                @endforeach
                            <span class=" alert-danger">{{ $errors->first('images') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                            {{ trans('message.priceProduct') }}
                        </label>
                        @if($product->category_id == 7)
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                            <span class=" alert-danger">{{ $errors->first('price') }}</span>
                        </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                            {{ trans('message.statusProduct') }}
                        </label>
                        <div class="col-md-9">
                            <select class="select2 form-control custom-select" name="status" required>
                                <option value="{{ config('config.zero') }}"
                                    @if ($product->status == config('config.zero')) selected
                                    @endif >{{ trans('message.falseProduct') }}
                                </option>
                                <option value="{{ config('config.one') }}"
                                    @if ($product->status == config('config.one')) selected
                                    @endif >{{ trans('message.trueProduct') }}
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
                            <input type="text" class="form-control" name="description" value="{{ $product->description }}">
                            <span class=" alert-danger">{{ $errors->first('description') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                            {{ trans('message.groupProduct') }}
                        </label>
                        <div class="col-md-9">
                            <select class="select2 form-control custom-select" name="category" required>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}"
                                        @if ($product->category_id == $categorie->id) selected
                                        @endif >{{ $categorie->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class=" alert-danger">{{ $errors->first('category') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="properties">Properties</label>
                        <div class="row">
                            <div class="col-md-2">
                                Key:
                            </div>
                            <div class="col-md-4">
                                Value:
                            </div>
                        </div>
                        <div id="round">
                            @for($i = 0; $i < count($properties); $i ++)
                                @foreach ($properties[$i] as $key => $value)
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="text" name="properties[{{ $i }}][key]" class="form-control" value="{{ $key }}">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="properties[{{ $i }}][value]" class="form-contro" value="{{ $value }}">
                                        </div>
                                    </div>
                                @endforeach
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            {{ trans('message.submitEditCategory') }}
                        </button>
                        <a class="btn btn-danger" href="{{ route('product.index') }}">
                            {{ trans('message.cane') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
