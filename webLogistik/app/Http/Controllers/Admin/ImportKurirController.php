<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Imports\KurirImport;
use Maatwebsite\Excel\Facades\Excel;


class ImportKurirController extends Controller
{
    public function importKurir(Request $request) 
    {
        Excel::import(new KurirImport, $request->file("file"));
        
        return redirect('admin/kurir')->with('success', 'berhasil Bertambah!');
    }
}
