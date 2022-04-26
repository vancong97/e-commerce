<?php
namespace App\Repositories\Product;

interface ProductRepositoryInterface
{
    public function getProductCategory($id);

    public function Search($request);

    public function getIndex();

    public function getProductDetail($id);

    public function getproductSimilar();

    public function getProductByIdCategoryAndMade($dataProduct);
}
?>
