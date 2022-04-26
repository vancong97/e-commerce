@component('mail::table')
| Khách hàng | Thanh toán | Ngày đặt | Trạng thái đơn hàng | Ghi chú |
|:------------:|:----------:|:--------:|:------------------:|:------:|
@foreach($orders as $order)
| {{ $order->user['name'] }} | {{ number_format($order->total) }} VNĐ | {{ $order->date_order }} |  @if ($order->status == 0) Đặt đơn @elseif ($order->status == 1) Đẵ xác nhận @elseif ($order->status == 2) Đã nhận giao @else Hoàn tất @endif| {{ $order->note }} |
@endforeach
@endcomponent
