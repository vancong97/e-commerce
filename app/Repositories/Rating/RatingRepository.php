<?php
namespace App\Repositories\Rating;

use App\Repositories\EloquentRepository;
use DB;

class RatingRepository extends EloquentRepository implements RatingRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Rating::class;
    }

    public function getProductId($id)
    {
        return $this->model->where('product_id', $id)->get();
    }

    public function sumRating($id)
    {
        return  $this->model->select(DB::raw('count(rating)'))
                            ->where('product_id', $id)
                            ->sum('rating');
    }

    public function getWithUser($id)
    {
        return $this->model->with('user')->where('product_id', $id)->get();
    }
}
?>
