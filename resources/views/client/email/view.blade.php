@component('mail::panel')
Khách hàng: {{!! $orderdetails->first()->order->user['name'] }}
Email: {{ $orderdetails->first()->order->user['email'] }}
Số điện thoại: {{ $orderdetails->first()->order->user['phone'] }}
Địa chỉ: {{ $orderdetails->first()->order->user['address'] }}
Thanh toán:  {{ number_format($orderdetails->first()->order['total']) }}
Ghi chú: {{ $orderdetails->first()->order['note'] }}
@endcomponent
@component('mail::table')
| Tên sản phẩm | Giá sản phẩm | Ngày đặt | Trạng thái đơn hàng | Số lượng|
|:------------:|:----------:|:--------:|:-------------------:|:----------:|
@foreach($orderdetails as $orderdetail)
| {{ $orderdetail->product['name'] }} | {{ number_format($orderdetail->price) }} VNĐ|{{ $orderdetail->order['date_order'] }} |  @if ($orderdetail->order['status'] == 3) Hoàn tất
@endif| {{ $orderdetail->quantity }} |
@endforeach
@endcomponent
