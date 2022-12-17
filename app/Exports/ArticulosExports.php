<?php

namespace App\Exports;

use App\Models\Articulo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ArticulosExports implements FromView
{
   public function view():View{
    return view('exportArticulos',[
        'articulo'=> Articulo::all()
    ]);
   }
}
