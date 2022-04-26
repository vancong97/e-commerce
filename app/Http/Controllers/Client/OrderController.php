<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Order\OrderRepositoryInterface;

class OrderController extends Controller
{
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getHistoryOrder()
    {

        $historyorders = $this->orderRepository->getHistoryOrder();

        return view('client.historyorder.index', compact('historyorders'));
    }

    public function getHistoryOrderDetail($id)
    {
        $order = $this->orderRepository->find($id);
        $orderdetails = $order->orderDetails;

        return view('client.historyorder.orderdetail', compact('orderdetails'));
    }
}
