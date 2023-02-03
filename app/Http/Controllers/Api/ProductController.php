<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ProductCollection;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::all();

        return new ProductCollection($products);
    }

    /**
     * @param \App\Http\Requests\ProductStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $validated = $request->validated();
        // if ($request->hasFile('image')) {
        //     $validated['image'] = $request->file('image')->store('images', 'public');
        // }

        $product = Product::create($validated);

        return new ProductResource($product);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * @param \App\Http\Requests\ProductUpdateRequest $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $validated = $request->validated();

        // if ($request->hasFile('image')) {
        //     if ($product->image) {
        //         Storage::delete($product->image);
        //     }

        //     $validated['image'] = $request->file('image')->store('images', 'public');
        // }

        $product->update($validated);

        return new ProductResource($product);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        // if ($product->image) {
        //     Storage::delete($product->image);
        // }

        $product->delete();

        return response()->noContent();
    }
}