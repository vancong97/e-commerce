@extends('admin.layout.master')
@section('title', trans('message.editOrder'))
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form action="{{ route('order.update', $order->id) }}" class="form-horizontal" method="post">
                @method('PUT')
                {{ csrf_field() }}
                <div class="card-body">
                    <h4 class="card-title">{{ trans('message.editOrder')}} </h4>
                    <div class="">&nbsp</div>
                    <div class="">&nbsp</div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">
                            {{ trans('message.statusOrder') }}
                        </label>
                        <div class="col-md-9">
                            <select class="select2 form-control custom-select"
                                name="status" required>
                                <option value="{{ config('config.zero') }}"
                                    @if ($order->status == config('config.zero')) selected
                                    @endif >{{ trans('message.zero') }}
                                </option>
                                <option value="{{ config('config.one') }}"
                                    @if ($order->status == config('config.one')) selected
                                    @endif >{{ trans('message.one') }}
                                </option>
                                <option value="{{ config('config.two') }}"
                                    @if ($order->status == config('config.two')) selected
                                    @endif >{{ trans('message.two') }}
                                </option>
                                <option value="{{ config('config.three') }}"
                                    @if ($order->status == config('config.three')) selected
                                    @endif >{{ trans('message.three') }}
                                </option>
                            </select>
                            <span class=" alert-danger">{{ $errors->first('status') }}</span>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            {{ trans('message.btnOrder') }}
                        </button>
                        <a class="btn btn-danger" href="{{ route('order.index') }}">
                            {{ trans('message.cane') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
