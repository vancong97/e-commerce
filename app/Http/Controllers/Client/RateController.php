<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Rating\RatingRepositoryInterface;
use Auth;

class RateController extends Controller
{
    private $ratingRepository;
    private $productRepository;

    public function __construct(
        RatingRepositoryInterface $ratingRepository,
        ProductRepositoryInterface $productRepository
    )
    {
        $this->ratingRepository = $ratingRepository;
        $this->productRepository = $productRepository;
    }

    public function postRate(Request $request, $id)
    {
        $product = $this->productRepository->find($id);

        $data = [
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
            'rating' => $request['rating'],
        ];

        $this->ratingRepository->create($data);

        return redirect()->back();
    }
}
