<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }

    public function store(StoreProductRequest $request)
    {

        $request->validated();

        $url = '';
        if($request->file('image')){
            $url = $this->storeFile($request->image,'product');
        }

        $data = [
            'name'=>$request->name,
            'SKU' => 'sku' .mt_rand(1000, 9999),
            'price' => mt_rand(1000, 9999),
            'stock_quantity' => mt_rand(1, 1000),
            'image' => $url,
        ];

        $product = Product::create($data);

        $product->categories()->sync($request->categories);
        return ProductResource::make($product);
    }


}
