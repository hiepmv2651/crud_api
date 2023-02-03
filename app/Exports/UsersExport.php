<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return User::all();
        return User::select('id', 'name', 'email', 'address', 'phone', 'gender')->get();
    }

    public function headings(): array
    {
        return ['ID', 'Tên', 'Email', 'Địa Chỉ', 'SĐT', 'Giới Tính'];
    }
}