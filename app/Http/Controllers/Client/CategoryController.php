<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Models\Category;

class CategoryController extends Controller
{
    private $categoryRepository;
    private $productRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        ProductRepositoryInterface $productRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function getCategory($id)
    {
        //$categories = $this->categoryRepository->getAll();
        $categories = Category::with('children')->get();
        $products = $this->productRepository->getProductCategory($id);
        $category = $this->categoryRepository->getCategories($id);

        return view('client.page.category', compact('categories', 'category', 'products'));
    }
}
