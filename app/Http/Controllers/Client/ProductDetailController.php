<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Rating\RatingRepositoryInterface;
use App\Repositories\Comment\CommentRepositoryInterface;
use DB;

class ProductDetailController extends Controller
{
    private $ratingRepository;
    private $productRepository;
    private $commentRepository;

    public function __construct(
        RatingRepositoryInterface $ratingRepository,
        ProductRepositoryInterface $productRepository,
        CommentRepositoryInterface $commentRepository
    )
    {
        $this->ratingRepository = $ratingRepository;
        $this->productRepository = $productRepository;
        $this->commentRepository = $commentRepository;
    }

    public function getProductDetail($id)
    {
        $product = $this->productRepository->getProductDetail($id);
        $productSimilars = $this->productRepository->getproductSimilar();
        $rate = count($this->ratingRepository->getProductId($id));
        $sumrate = $this->ratingRepository->sumRating($id);
        if ($rate == config('config.zero')) {
            $tbrate = config('config.zero');
        } else {
            $tbrate = (int)($sumrate / $rate);
        }
        $rates = $this->ratingRepository->getWithUser($id);
        $comments = $this->commentRepository->getWithUser($id);
        //dd($comments);

        return view('client.product.detail', compact('product', 'productSimilars', 'tbrate', 'rates', 'comments'));
    }
}
