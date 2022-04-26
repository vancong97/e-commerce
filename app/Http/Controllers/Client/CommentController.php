<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Comment\CommentRepositoryInterface;
use Auth;

class CommentController extends Controller
{
    private $productRepository;
    private $commentRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        CommentRepositoryInterface $commentRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->commentRepository = $commentRepository;
    }
    public function postComment(Request $request, $id) {
        $product = $this->productRepository->find($id);

        $data = [
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
            'content' => $request['content'],
        ];

        $this->commentRepository->create($data);

        return redirect()->back();
    }
}
