 @extends('client.layout.master')
 @section('title', trans('header.historyorder'))
 @section('content')
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
                                    <th class="">{{ trans('message.detailAdmin') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($historyorders as $historyorder)
                                    <tr>
                                        <td>{{ $historyorder->user['name'] }}</td>
                                        <td>{{ $historyorder->user['email'] }}</td>
                                        <td>{{ $historyorder->user['phone'] }}</td>
                                        <td>{{ $historyorder->user['address'] }}</td>
                                        <td>{{ $historyorder->date_order }}</td>
                                        <td>
                                            {{ number_format($historyorder->total) }}
                                            {{ trans('message.$') }}
                                        </td>
                                        <td>
                                            @if ($historyorder->status == config('config.zero'))
                                                <button  class="btn btn-warning">
                                                    {{ trans('message.zero') }}
                                                </button>
                                            @elseif ($historyorder->status == config('config.one'))
                                                <button class="btn btn-primary">
                                                    {{ trans('message.one') }}
                                                </button>
                                            @elseif ($historyorder->status == config('config.two'))
                                                <button class="btn btn-info">
                                                    {{ trans('message.two') }}
                                                </button>
                                            @else
                                                <button class="btn btn-success">
                                                    {{ trans('message.three') }}
                                                </button>
                                            @endif
                                        </td>
                                        <td>{{ $historyorder->note }}</td>
                                        <td>
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{ route('history.order.detail', $historyorder->id) }}"
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
