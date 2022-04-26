 @extends('admin.layout.master')
 @section('title', trans('message.orderAdmin'))
 @section('content')
 <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h3 class="page-title">{{ trans('message.orderAdmin') }}</h3>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">{{ trans('message.home') }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ trans('message.orderAdmin') }}
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
                                    <th class="">{{ trans('message.nameOrder') }}</th>
                                    <th class="">{{ trans('message.email') }}</th>
                                    <th class="">{{ trans('message.phone') }}</th>
                                    <th class="">{{ trans('message.address') }}</th>
                                    <th class="">{{ trans('message.dateOder') }}</th>
                                    <th class="">{{ trans('message.totalOrder') }}</th>
                                    <th class="">{{ trans('message.statusOrder') }}</th>
                                    <th class="">{{ trans('message.note') }}</th>
                                    <th class="">{{ trans('message.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->user['name'] }}</td>
                                        <td>{{ $order->user['email'] }}</td>
                                        <td>{{ $order->user['phone'] }}</td>
                                        <td>{{ $order->user['address'] }}</td>
                                        <td>{{ $order->date_order }}</td>
                                        <td>
                                            {{ number_format($order->total) }}
                                            {{ trans('message.$') }}
                                        </td>
                                        <td>
                                            @if ($order->status == config('config.zero'))
                                                <button  class="btn btn-warning">
                                                    {{ trans('message.zero') }}
                                                </button>
                                            @elseif ($order->status == config('config.one'))
                                                <button class="btn btn-primary">
                                                    {{ trans('message.one') }}
                                                </button>
                                            @elseif ($order->status == config('config.two'))
                                                <button class="btn btn-info">
                                                    {{ trans('message.two') }}
                                                </button>
                                            @else
                                                <button class="btn btn-success">
                                                    {{ trans('message.three') }}
                                                </button>
                                            @endif
                                        </td>
                                        <td>{{ $order->note }}</td>
                                        <td>
                                            <a href="{{ route('order.edit', $order->id) }}" class="sidebar-link waves-effect waves-dark sidebar-link">
                                                <span class="fa fa-edit"> {{ trans('message.btnOrder') }}</span>
                                            </a>
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{ route('order.detail', $order->id ) }}"
                                                aria-expanded="false"><i class="mdi mdi-shopping"></i>
                                                <span class="hide-menu">
                                                    {{ trans('message.detailAdmin') }}
                                                </span>
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
