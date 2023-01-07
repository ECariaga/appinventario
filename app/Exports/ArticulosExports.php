<?php

namespace App\Exports;

use App\Models\Articulo;
use App\Models\Estado;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ArticulosExports implements FromView, ShouldAutoSize, WithStyles
{
   public function view():View{
    return view('exportArticulos',[
        'articulo'=> Articulo::all(),
        'estados'=> Estado::all()
    ]);
   }

   public function styles(Worksheet $sheet){

    $sheet->setTitle('Lista de Artículos');
    //Estilos el titulo de la tabla
    $sheet->getStyle('A1:G1')->applyFromArray([
        'font'=>[
            'bold'=> true,
            'name'=> 'Arial',
            
        ],
        'alignment'=>[
            'horizontal'=> 'center',
        ],
        'fill'=>[
            'fillType' => 'solid',
            'startColor' => [
                'argb' => '72A8F8'
            ],
        ],
    ]);
    //Estilos de elementos de la tabla
    $sheet->getStyle('A1:G' .$sheet->getHighestRow())->applyFromArray([
        'borders'=> [
            'allBorders' => [
                'borderStyle' => 'thin',
            ],
        ],
        'alignment'=>[
            'horizontal'=> 'center',
        ],
    ]);

    //Para aplicar en que fila va a aparecer el cursor
    $sheet->getStyle('A2')->applyFromArray([
        
    ]);

   }
}
