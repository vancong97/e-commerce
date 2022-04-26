 @extends('admin.layout.master')
 @section('title', trans('message.productAdmin'))
 @section('content')
 <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h3 class="page-title">{{ trans('message.product') }}</h3>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">{{ trans('message.home') }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ trans('message.product') }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <a href="{{ route('product.create') }}">
                            {{ trans('message.createProduct') }}
                        </a>
                        <div class="">&nbsp</div>
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
                        <table class="table table-bordered">
                            <thead>
                                <tr class="btn-info">
                                    <th class="">{{ trans('message.nameProduct') }}</th>
                                    <th class="">{{ trans('message.imageProduct') }}</th>
                                    <th class="">{{ trans('message.descriptionProduct') }}</th>
                                    <th class="">{{ trans('message.priceProduct') }}</th>
                                    <th class="">{{ trans('message.statusProduct') }}</th>
                                    <th class="">{{ trans('message.groupProduct') }}</th>
                                    <th class="">{{ trans('message.groupMadein') }}</th>
                                    <th class=""> Tính chất</th>
                                    <th class="">{{ trans('message.action') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            @foreach ($product->images as $image)
                                                <img class="image" src="{{ asset('storage/images/' . $image->image) }}">
                                            @endforeach
                                        </td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ number_format($product->price) }}</td>
                                        <td>
                                            @if ($product->status == config('config.one'))
                                                {{ trans('message.trueProduct') }}
                                            @else {{ trans('message.falseProduct') }}
                                            @endif
                                        </td>
                                       {{--  <td>{{ $product->category['name'] }}</td>
                                        <td>{{ $product->madein['name'] }}</td> --}}
                                        {{-- <td>
                                            @for($i = 0; $i < count($product->properties); $i ++)
                                                @foreach ($product->properties[$i] as $key => $value)
                                                   <b>{{ $key }}</b>: {{ $value }}<br />
                                                @endforeach
                                            @endfor

                                        </td> --}}
                                        <td>
                                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">
                                                <span class="fa fa-edit"> {{ trans('message.btnEdit') }}</span>
                                            </a>
                                            <a data-id="{{ $product->id }}" data-url="{{ route('product.destroy', $product->id) }}"
                                                class=" delete btn btn-danger">
                                                <span class="fa fa-trash"></span>
                                                {{ trans('message.btnDelete') }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
