 @extends('admin.layout.master')
 @section('title', trans('message.userAdmin'))
 @section('content')
 <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h3 class="page-title">{{ trans('message.userAdmin') }}</h3>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">{{ trans('message.home') }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ trans('message.userAdmin') }}
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
                                    <th class="">{{ trans('message.nameUser') }}</th>
                                    <th class="">{{ trans('message.imageUser') }}</th>
                                    <th class="">{{ trans('message.email') }}</th>
                                    <th class="">{{ trans('message.phone') }}</th>
                                    <th class="">{{ trans('message.address') }}</th>
                                    @if(Auth::user()->can('edit-user') || Auth::user()->can('remove-user')) 
                                    <th class="">{{ trans('message.action') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            <img class="image" src="{{ asset('storage/images/' . $user->image) }}">
                                            <iframe src="{{ asset('storage/images/' . $user->image) }}"></iframe>
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>
                                            @can('edit-user')
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">
                                                <span class="fa fa-edit"> {{ trans('message.btnEdit') }}</span>
                                            </a>
                                            @endcan
                                            @can('remove-user')
                                            <a data-id="{{ $user->id }}" data-url="{{ route('user.destroy', $user->id) }}"
                                                class=" delete btn btn-danger">
                                                <span class="fa fa-trash"></span>
                                                {{ trans('message.btnDelete') }}
                                            </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">{{ $users->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
