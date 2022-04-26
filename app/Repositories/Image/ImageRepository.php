<?php
namespace App\Repositories\Image;

use App\Repositories\EloquentRepository;

class ImageRepository extends EloquentRepository implements ImageRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Image::class;
    }

    public function getImageID($product_id)
    {
        return $this->model->where('product_id', $product_id)->first();
    }
}
?>
