<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;

class CategoryProductsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Category $category)
    {
        $products = $category
            ->products()
            ->get();

        return new ProductCollection($products);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'detail' => ['required', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $product = $category->products()->create($validated);

        return new ProductResource($product);
    }
}