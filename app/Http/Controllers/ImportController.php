<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function importUser(Request $request)
    {

        Excel::import(new UsersImport, $request->file('file'));
        return response()->json([
            'message' => 'Imported successfully',
        ]);
    }
}
