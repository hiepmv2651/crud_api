<?php

namespace App\Http\Controllers;

use Notification;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use App\Notifications\SendEmailNotification;

class SendMailController extends Controller
{
    public function send_mail(Request $request)
    {
        $user = User::find(11);

        $list_cart = Cart::where('user_id', $user->id)->get();

        try {
            $detail_order = '<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
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
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Apple MacBook Pro 17"
                        </th>
                        <td class="px-6 py-4">
                            Sliver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>';
            $details = [
                'greeting' => 'Xin chào, ', $user->name,
                'firstline' => 'Chúng tôi xin gửi lời cảm ơn Quý khách
            hàng đã tin tưởng và ủng hộ cửa hàng.',
                'body' => 'Quý khách vừa thanh toán đơn hàng có giá trị ... . Nếu quý khách có bất kì câu hỏi nào
            về đơn hàng này, vui lòng liên hệ với chúng tôi bằng cách nhấn nút bên dưới để truy cập trang web.',
                'button' => 'Truy cập trang web',
                'url' => 'http://localhost:4200/',
                'order' => Markdown::parse($detail_order),
                'lastline' => 'Xin chân thành cảm ơn!'
            ];


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
