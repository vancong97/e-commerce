<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepositoryInterface;
use Session;

class CartController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getCart()
    {
        return view('client.cart.checkcart');
    }

    public function addToCart(Request $request, $id)
    {

        $product = $this->productRepository->find($id);
        if(!$product) {
            abort(config('config.error'));
        }
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                $id => [
                    'name' => $product->name,
                    'quantity' => config('config.one'),
                    'price' => $product->price,
                    'image' => $product->images->first()->image
                ]
            ];
            session()->put('cart', $cart);

            return redirect()->back();
        }
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);

            return redirect()->back();
        }
        $cart[$id] = [
            'name' => $product->name,
            'quantity' => config('config.one'),
            'price' => $product->price,
            'image' => $product->images->first()->image
        ];
        session()->put('cart', $cart);

        return redirect()->back();
    }
    public function update(Request $request)
    {
        $cart = Session::get('cart');
        $qty = $request->get('qty');
        $id = $request->get('id');
        $cart[$id]['quantity'] = $qty;
        Session()->put('cart', $cart);
        $qty = Session::get('cart')[$id]['quantity'];
        $price = Session::get('cart')[$id]['price'];
        $total = $qty * $price;
        $sumtotal = config('config.zero') ;
        foreach (session('cart') as $id => $details) {
            $sumtotal += $details['price'] * $details['quantity'];
        }

        return response()->json([
            'total' => $total,
            'qty' => $qty,
            'sumtotal' => $sumtotal,
        ]);
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
        }
    }

    public function addCart(Request $request, $id)
    {
        $product = $this->productRepository->getWith('images')->find($id);
        $id = $request->get('id');
        $qty = $request->get('qty');
        if(!$product) {
            abort(config('config.error'));
        }
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                $id => [
                    'name' => $product->name,
                    'quantity' => $qty,
                    'price' => $product->price,
                    'image' => $product->images->first()->image
                ]
            ];
            session()->put('cart', $cart);

            return redirect()->back();
        }
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $qty;
            session()->put('cart', $cart);

            return redirect()->back();
        }
        $cart[$id] = [
            'name' => $product->name,
            'quantity' => $qty,
            'price' => $product->price,
            'image' => $product->images->first()->image
        ];
        session()->put('cart', $cart);

        return redirect()->back();
    }

}
