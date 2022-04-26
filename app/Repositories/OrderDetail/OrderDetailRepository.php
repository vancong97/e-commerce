<?php
namespace App\Repositories\OrderDetail;

use App\Repositories\EloquentRepository;

class OrderDetailRepository extends EloquentRepository implements OrderDetailRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\OrderDetail::class;
    }
}
?>
