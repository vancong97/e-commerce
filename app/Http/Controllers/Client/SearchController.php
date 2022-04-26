<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;

class SearchController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getSearch(Request $request)
    {
        $products = $this->productRepository->Search($request);

        return view('client.search.index', compact('products'));
    }
}
