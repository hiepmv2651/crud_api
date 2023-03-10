<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\CartResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartCollection;

class UserCartsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        $carts = $user
            ->carts()
            ->get();

        return new CartCollection($carts);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
        ]);

        $cart = $user->carts()->create($validated);

        return new CartResource($cart);
    }
}