<?php

namespace App\Exports;

use App\Models\Articulo;
use App\Models\Estado;
use App\Models\Ubicacion;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ArticulosExports implements FromView, ShouldAutoSize, WithStyles
{
    protected $ubicacionId;

    public function __construct($ubicacionId = null)
    {
        $this->ubicacionId = $ubicacionId;
    }

    public function view(): View
    {
        $articulos = Articulo::with('estado', 'ubicacion');

        if ($this->ubicacionId) {
            $articulos = $articulos->where('id_ubicacion', $this->ubicacionId);
        }

        return view('exportArticulos', [
            'articulo' => $articulos->get(),
            'estados' => Estado::all(),
            'ubicaciones' => Ubicacion::all(),
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->setTitle('Lista de Artículos');
        $sheet->getStyle('A1:G1')->applyFromArray([
            'font' => [
                'bold' => true,
                'name' => 'Arial',
            ],
            'alignment' => [
                'horizontal' => 'center',
            ],
            'fill' => [
                'fillType' => 'solid',
                'startColor' => [
                    'argb' => '72A8F8'
                ],
            ],
        ]);

        $sheet->getStyle('A1:G' . $sheet->getHighestRow())->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => 'thin',
                ],
            ],
            'alignment' => [
                'horizontal' => 'center',
            ],
        ]);
    }
}
