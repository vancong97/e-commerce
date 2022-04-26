<?php
namespace App\Repositories\Order;

use App\Repositories\EloquentRepository;
use Auth;

class OrderRepository extends EloquentRepository implements OrderRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Order::class;
    }

    public function getHistoryOrder()
    {
        $id_user = Auth::user()->id;
        return $this->model->with('user')->where('user_id', '=', $id_user)->orderBy('id', 'desc')->get();
    }
}
?>
