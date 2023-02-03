<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.id', 'products.name', 'products.detail', 'products.price', 'products.category_id', 'products.quantity')
            ->get();
    }

    public function headings(): array
    {
        return ['ID', 'Tên Sản Phẩm', 'Mô Tả', 'Giá', 'Loại Bánh', 'Số Lượng'];
    }
}
