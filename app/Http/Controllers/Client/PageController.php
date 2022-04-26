<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Madein\MadeinRepositoryInterface;

class PageController extends Controller
{
    private $productRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository,
        MadeinRepositoryInterface $madeinRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->madeinRepository = $madeinRepository;
    }

    public function getIndex()
    {
        $products = $this->productRepository->getIndex();
        $categories = $this->categoryRepository->getAll();
        $madeins = $this->madeinRepository->getAll();
        return view('client.page.index', compact('products','categories','madeins'));
    }

    public function getAbout()
    {
        return view('client.page.about');
    }

    public function getContact()
    {
        return view('client.page.contact');
    }

    public function postSearch(Request $request) {
        $dataProduct =  $request->only([
            'category',
            'madein',
        ]);
        $products =  $this->productRepository->getProductByIdCategoryAndMade($dataProduct);
        // dd($products);
        $categories = $this->categoryRepository->getAll();
        $madeins = $this->madeinRepository->getAll();
        return view('client.page.index', compact('products','categories','madeins'));
    }
}
