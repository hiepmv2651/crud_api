<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Http\Resources\CartCollection;
use App\Http\Requests\CartStoreRequest;
use App\Http\Requests\CartUpdateRequest;

class CartController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $carts = Cart::all();

        return new CartCollection($carts);
    }

    /**
     * @param \App\Http\Requests\CartStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CartStoreRequest $request)
    {
        $product_exist_id = Cart::where('product_id', $request->product_id)->where('user_id', auth()->user()->id)->get('id')->first();
        $product = Product::find($request->product_id);
        if ($product_exist_id) {
            $data = Cart::find($product_exist_id)->first();
            $data->quantity = $data->quantity + $request->quantity;
            if ($data->quantity > 20) {
                return response()->json([
                    'message' => 'You can not add more than 20 items',
                ]);
            }
            $data->price = $product->price * $data->quantity;
            $data->save();
            return new CartResource($data);
        } else {
            $validated = $request->validated();
            $validated['price'] = $product->price * $validated['quantity'];

            $cart = Cart::create($validated);

            return new CartResource($cart);
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Cart $cart)
    {
        return new CartResource($cart);
    }

    /**
     * @param \App\Http\Requests\CartUpdateRequest $request
     * @param \App\Models\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function update(CartUpdateRequest $request, Cart $cart)
    {
        $validated = $request->validated();

        $cart->update($validated);

        return new CartResource($cart);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Cart $cart)
    {
        $cart->delete();

        return response()->noContent();
    }

    public function editUserCart(Request $request, $id)
    {
        $data = Cart::find($id);
        $data->price = $data->price / $data->quantity * $request->quantity;
        $data->quantity = $request->quantity;
        $data->save();
        return response()->json([
            'message' => 'success',
        ]);
    }
}