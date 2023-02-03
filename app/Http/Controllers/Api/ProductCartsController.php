<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\CartResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartCollection;

class ProductCartsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Product $product)
    {
        $carts = $product
            ->carts()
            ->get();

        return new CartCollection($carts);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $validated = $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'quantity' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
        ]);

        $cart = $product->carts()->create($validated);

        return new CartResource($cart);
    }
}