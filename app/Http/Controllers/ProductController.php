<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $filters = $request->only(['q', 'itemsPerPage', 'sortBy']);
        return ProductResource::collection($this->productService->listProducts($filters));
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        return ProductResource::make($this->productService->createProduct($data));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $data = $request->validated();
        return ProductResource::make($this->productService->updateProduct($id, $data));
    }

    public function destroy($id)
    {
        $this->productService->deleteProduct($id);
        return response()->json(null, 204);
    }

    public function desktopData()
    {
        $productCount = Product::count();
        return response()->json(['productCount' => $productCount]);
    }


}
