 @extends('admin.layout.master')
 @section('title', trans('message.detailAdmin'))
 @section('content')
 <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h3 class="page-title">{{ trans('message.detailAdmin') }}</h3>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">{{ trans('message.home') }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ trans('message.detailAdmin') }}
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
                            <b>{{ trans('message.nameOrder') }}: </b>
                            <b>{{ $orderdetails->first()->order->user['name'] }}</b>
                            </br>
                            <b>{{ trans('message.email') }}: </b>
                            <b>{{ $orderdetails->first()->order->user['email'] }}</b>
                            </br>
                            <b>{{ trans('message.phone') }}: </b>
                            <b>{{ $orderdetails->first()->order->user['phone'] }}</b>
                            </br>
                            <b>{{ trans('message.address') }}: </b>
                            <b>{{ $orderdetails->first()->order->user['address'] }}</b>
                            </br>
                            <b>{{ trans('message.totalOrder') }}: </b>
                            <b>
                                {{ number_format($orderdetails->first()->order['total']) }}
                                {{ trans('message.$') }}
                            </b>
                            </br>
                            <b>{{ trans('message.note') }}: </b>
                            <b>{{ $orderdetails->first()->order['note'] }}</b>
                            <thead>
                                <tr class="btn-info">
                                    <th class="">{{ trans('message.nameProduct') }}</th>
                                    <th class="">{{ trans('message.imageProduct') }}</th>
                                    <th class="">{{ trans('message.dateOder') }}</th>
                                    <th class="">{{ trans('message.statusOrder') }}</th>
                                    <th class="">{{ trans('message.totalOrderDetail') }}</th>
                                    <th class="">{{ trans('message.quantity') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderdetails as $orderdetail)
                                    <tr>
                                        <td>{{ $orderdetail->product['name'] }}</td>
                                        <td><img class="image" src="{{ asset('storage/images/' . $orderdetail->product->images->first()->image) }}">
                                        </td>
                                        <td>{{ $orderdetail->order['date_order'] }}</td>
                                        <td>
                                            @if ($orderdetail->order['status'] == config('config.zero'))
                                                <button  class="btn btn-warning">
                                                    {{ trans('message.zero') }}
                                                </button>
                                            @elseif ($orderdetail->order['status'] == config('config.one'))
                                                <button class="btn btn-warning">
                                                    {{ trans('message.one') }}
                                                </button>
                                            @elseif ($orderdetail->order['status'] == config('config.two'))
                                                <button class="btn btn-warning">
                                                    {{ trans('message.two') }}
                                                </button>
                                            @else
                                                <button class="btn btn-success">
                                                    {{ trans('message.three') }}
                                                </button>
                                            @endif
                                        </td>
                                        <td>
                                            {{ number_format($orderdetail->price) }}
                                            {{ trans('message.$') }}
                                        </td>
                                        <td>{{ $orderdetail->quantity }}</td>
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
