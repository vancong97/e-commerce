@extends('client.layout.master')
@section('title', trans('message.cart'))
@section('content')
<div class="space60">&nbsp;</div>
<div class="text-center">
    <h1>{{ trans('message.cart') }}</h1>
</div>
<div class="space60">&nbsp;</div>
<table class="table table-hover table-condensed">
    <thead>
        <tr>
            <th>{{ trans('message.imageProduct') }}</th>
            <th>{{ trans('message.nameProduct') }}</th>
            <th>{{ trans('message.priceProduct') }}</th>
            <th>{{ trans('message.qty') }}</th>
            <th>{{ trans('message.total') }}</th>
            <th>{{ trans('message.action') }}</th>
        </tr>
    </thead>
    <tbody>
        @php $total = config('config.zero') @endphp
            @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr>
                        <td data-th="Product">
                            <img src="{{ asset('storage/images/' . $details['image'])  }}"
                                class="img-responsive"/>
                        </td>
                        <td>{{ $details['name'] }}</td>
                        <td data-th="Price">{{ $details['price'] }} {{ trans('message.$') }}</td>
                        <td data-th="Quantity">
                            <input type="number"  min="1" max="100" value="{{ $details['quantity'] }}"
                                id="quantity-{{ $id }}" class="form-control quantity">
                        </td>
                        <td id="subtotal-{{ $id }}" data-th="Subtotal">
                            {{ $details['price'] * $details['quantity'] }}
                            {{ trans('message.$') }}
                        </td>
                        <td class="actions" data-th="">
                            <button class="btn btn-info btn-sm update-cart"
                                data-id="{{ $id }}"
                                data-url="{{ route('updatecart', $id) }}">
                                <i class="fa fa-refresh"></i>
                            </button>
                            <button class="btn btn-danger btn-sm remove-from-cart"
                                data-id="{{ $id }}"
                                data-url="{{ route('removecart', $id) }}">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @endif
    </tbody>
    <tfoot>
        <tr>
            <td>
                <a href="{{ route('index') }}" class="btn btn-warning">
                <i class="fa fa-angle-left"></i>
                    {{ trans('message.continiu') }}
                </a>
            </td>
            <td>

            </td>
            <td colspan="3" class="hidden-xs"></td>
            <strong>
                <td id="sumtotal" class="hidden-xs text-center">
                    @if (count((array)session('cart')) == config('config.zero'))
                        {{ trans('message.nocart') }}
                    @else
                        {{ trans('message.total') }}
                        {{ number_format($total) }}
                        {{ trans('message.$') }}
                    @endif
                </td>
            </strong>
        </tr>
    </tfoot>
</table>
    <div class="container">
    <div id="content">
        <form action="{{ route('checkout') }}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <div class="your-order-head">
                        <h5>{{ trans('message.checkout') }}</h5>
                    </div>
                    <div class="space20">&nbsp;</div>

                    <div class="form-block">
                        <label for="name">{{ trans('message.name') }}</label>
                        <span>{{ Auth::user()->name }} </span>
                    </div>

                    <div class="form-block">
                        <label for="email">{{ trans('message.email') }}</label>
                        <span>{{ Auth::user()->email }}</span>
                    </div>

                    <div class="form-block">
                        <label for="address">{{ trans('message.address') }}</label>
                        <span>{{ Auth::user()->address }}</span>
                    </div>

                    <div class="form-block">
                        <label for="phone">{{ trans('message.phone') }}</label>
                        <span>{{ Auth::user()->phone }}</span>
                    </div>

                    <div class="form-block">
                        <label for="notes">{{ trans('message.note') }}</label>
                        <textarea rows="4" cols="30" name="notes"></textarea>
                    </div>
                    <div class="center">
                        <div class="space10">&nbsp;</div>
                        <div class="text-center">
                            <button type="submit" class="beta-btn primary">
                                {{ trans('message.checkout') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
