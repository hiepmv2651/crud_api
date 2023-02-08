<?php

namespace App\Exports;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class CartUserExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        return DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->join('users', 'carts.user_id', '=', 'users.id')
            ->where('user_id', $this->id)
            ->select('carts.id', 'products.name', 'carts.quantity', 'carts.price')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Mã',
            'Tên Sản Phẩm',
            'Số Lượng',
            'Giá',
        ];
    }
}
