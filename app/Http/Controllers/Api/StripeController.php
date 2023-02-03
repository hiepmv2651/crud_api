<?php

namespace App\Http\Controllers\Api;

use Stripe;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        try {
            $stripe = new \Stripe\StripeClient(
                env('STRIPE_SECRET')
            );
            $res = $stripe->tokens->create([
                'card' => [
                    'number' => $request->number,
                    'exp_month' => $request->exp_month,
                    'exp_year' => $request->exp_year,
                    'cvc' => $request->cvc,
                ],
            ]);

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $response = $stripe->charges->create([
                'amount' => $request->amount * 100,
                'currency' => 'usd',
                'source' => $res->id,
                'description' => $request->description,
            ]);
            return response()->json([
                'message' => 'success',
                'status' => 201
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Something went wrong',
                'status' => 500
            ]);
        }
    }
}