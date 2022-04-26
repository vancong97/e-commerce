<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Order\OrderRepositoryInterface;
use Pusher\Pusher;
use Auth;
use DB;
use Illuminate\Support\Facades\View;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getOrderDetail($id)
    {
        $order = $this->orderRepository->find($id);
        $orderdetails = $order->orderDetails;
        DB::table('notifications')->where('data', $id)->update(['read_at'=> now()]);

        $data['notifications'] = DB::table('notifications')->where('read_at',null)->count();
        $data['notification'] = DB::table('notifications')->get();
        View::share($data);

        return view('admin.oderdetail.index', compact('orderdetails'));
    }
}
