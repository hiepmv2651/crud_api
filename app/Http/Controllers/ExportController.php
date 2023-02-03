<?php

namespace App\Http\Controllers;

use App\Exports\CartsExport;
use App\Exports\CategoriesExport;
use App\Exports\ProductsExport;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportUser()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
        // return
        //     [
        //         'message' => 'Exported successfully',
        //     ];
    }

    public function exportCart()
    {
        // return Excel::download(new CartsExport, 'cart.html', \Maatwebsite\Excel\Excel::HTML);
        return Excel::download(new CartsExport, 'carts.xlsx');
    }

    public function exportProduct()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function exportCategory()
    {
        return Excel::download(new CategoriesExport, 'categories.xlsx');
    }
}