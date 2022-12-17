<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ArticulosExports;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function index(){
        return view('excel.export');
    }

    public function export(){
        return Excel::download(new ArticulosExports,'articulos.xlsx');
    }
}
