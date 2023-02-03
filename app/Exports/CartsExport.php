<?php

namespace App\Exports;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class CartsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->join('users', 'carts.user_id', '=', 'users.id')
            ->select('carts.id', 'products.name', 'users.phone', 'carts.quantity', 'carts.price')
            ->get();
        // return Cart::select('id', Product::select('name'), User::select('name'), 'quantity', 'price')->get();
    }

    public function headings(): array
    {
        return ['ID', 'Tên Sản Phẩm', 'Tên Khách Hàng', 'Số Lượng', 'Giá'];
    }
}