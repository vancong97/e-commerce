<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Product\ProductAddRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductEditRequest;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Image\ImageRepositoryInterface;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $productRepository;
    private $categoryRepository;
    private $imageRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository,
        ImageRepositoryInterface $imageRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->imageRepository = $imageRepository;
    }

    public function index()
    {
        $products = $this->productRepository->getWith(['images', 'category', 'madein']);

        for ($i=0; $i < count($products) ; $i++) {
            $products[$i]->properties = json_decode($products[$i]->properties);
        }
        //dd($products);
        return view('admin.product.index', compact('products'));

        // return $request->id  > 0 ? update() : create()

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categoris'] = $this->categoryRepository->getAll();

        return view('admin.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductAddRequest $request)
    {

        // $dataOnly = [
        //     1 => [
        //         'thong tin chung',
        //         'thong tin cn',
        //     ],
        //     2 => [
        //         'thong tin chung',
        //         'thong tin nhan vien',
        //     ],
        //     3 => [
        //         'thong tin chung',
        //         'thong tin truong phong',
        //     ]
        // ]

        // $data = $request->only[$dataOnly[$request->object]]
        //dd($request->all());

        $data = $request->only([
            'name',
            'price',
            'status',
            'description',
        ]);

        $data['category_id'] = $request->get('category');
        $properties = $request->get('properties');

        for ($i=0; $i < count($properties); $i++) {
            $properties[$i] = [$properties[$i]['key'] => $properties[$i]['value']];
        }

        $data['properties'] = json_encode($properties);
        //dd($properties);

        $product = $this->productRepository->create($data);

        if ($request->hasFile('images')) {
            $filename = $request->images->getClientOriginalName();
            $data = [
                'image' => $filename,
                'product_id' => $product->id
            ];
            $request->images->storeAs('public/images', $filename);

            // $request->id ? $this->imageRepository->update($data)
            $this->imageRepository->create($data);
        }

        return redirect()->route('product.index')->with('success', trans('message.createSuccess'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $addNew = $request['addNew'] ?? false;

        $product = $this->productRepository->find($id);

        $properties = json_decode($product->properties);
        //dd(count($properties));

        $categories = $this->categoryRepository->getAll();
        $image = $product->images;

        if ($addNew) {
            $properties[] = ['Vòng ' .count($properties) => ""];
            return $properties;

        } else {

            return view('admin.product.edit', compact('product', 'categories', 'image', 'properties'));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only([
            'name',
            'price',
            'status',
            'description',
        ]);
        $data['category_id'] = $request->get('category');
        $properties = $request->get('properties');

        for ($i=0; $i < count($properties); $i++) {
            $properties[$i] = [$properties[$i]['key'] => $properties[$i]['value']];
        }

        $data['properties'] = json_encode($properties);
        //dd($data);

        $product = $this->productRepository->update($data, $id);

        $image = $this->imageRepository->getImageID($id);
        $id_image = $image->id;
        if ($request->hasFile('images')) {
            $filename = $request->images->getClientOriginalName();
            $data = [
                'image' => $filename,
                'product_id' => $product->id,
            ];
            $request->images->storeAs('public/images', $filename);
        }
        $this->imageRepository->update($data, $id_image);

        return redirect()->route('product.index')->with('success', trans('message.updateSuccess'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->delete($id);

        return response()->json(true);
    }
}
