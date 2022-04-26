 @extends('admin.layout.master')
 @section('title', trans('message.suggestAdmin'))
 @section('content')
 <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h3 class="page-title">{{ trans('message.suggestAdmin') }}</h3>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">{{ trans('message.home') }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ trans('message.suggestAdmin') }}
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
                                    <th class="">{{ trans('message.nameUser') }}</th>
                                    <th class="">{{ trans('message.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suggests as $suggest)
                                    <tr>
                                        <td>{{ $suggest->name }}</td>
                                        <td>
                                            <img class="image" src="{{ asset('storage/images/' . $suggest->image) }}">
                                        </td>
                                        <td>{{ $suggest->description }}</td>
                                        <td>{{ number_format($suggest->price) }}</td>
                                        <td>{{ $suggest->user['name'] }}</td>
                                        <td>
                                            <a href="{{ route('suggest-admin.edit', $suggest->id) }}" class="btn btn-warning">
                                                <span class="fa fa-edit"> {{ trans('message.btnEdit') }}</span>
                                            </a>
                                            <a data-id="{{ $suggest->id }}" data-url="{{ route('suggest-admin.destroy', $suggest->id) }}"
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
                    <div class="row">{{ $suggests->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
