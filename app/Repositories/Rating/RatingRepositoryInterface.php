<?php
namespace App\Repositories\Rating;

interface RatingRepositoryInterface
{
    public function getProductId($id);

    public function sumRating($id);

    public function getWithUser($id);
}
?>
