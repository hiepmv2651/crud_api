<?php

namespace App\Http\Controllers\Api;

use Stripe;
use Exception;
use Notification;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use App\Http\Controllers\Controller;
use App\Notifications\SendEmailNotification;

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

            $this->send_mail();

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

    public function send_mail()
    {
        $user = auth()->user();

        try {
            $list_cart = Cart::where('user_id', $user->id);
            $list_cart_get = $list_cart->get();

            $sum_cart = $list_cart->sum('price');
            $detail_order = '<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Mã
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tên Sản Phẩm
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ảnh
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Số Lượng
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Giá
                        </th>
                    </tr>
                </thead>
                <tbody>';

            foreach ($list_cart_get as $cart) {
                $detail_order .= '<tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <td class="px-6 py-4">
                    ' . $cart->id . '
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    ' . $cart->product->name . '
                </th>
                <td class="px-6 py-4">
                    <img class="w-10 h-10 rounded-full" src="http://127.0.0.1:8000/storage/' . $cart->product->image . '">
                </td>
                <td class="px-6 py-4">
                    ' . $cart->quantity . '
                </td>
                <td class="px-6 py-4">
                    ' . $cart->price . '
                </td>
            </tr>';
            };

            $details = [
                'greeting' => 'Xin chào, ', $user->name,
                'firstline' => 'Chúng tôi xin gửi lời cảm ơn Quý khách
            hàng đã tin tưởng và ủng hộ cửa hàng.',
                'body' => 'Quý khách vừa thanh toán đơn hàng có giá trị ' . $sum_cart . ' . Nếu quý khách muốn xuất hóa đơn, vui lòng bấm vào nút bên dưới.',
                'button' => 'Xuất hóa đơn',
                'url' => 'http://127.0.0.1:8000/api/exportPdfCart',
                'order' => Markdown::parse($detail_order),
                'lastline' => 'Xin chân thành cảm ơn!'
            ];
            $list_cart->delete();

            Notification::send($user, new SendEmailNotification($details));

            return response()->json(['message' => 'Email sent successfully']);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
