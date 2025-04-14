<?php

namespace App\Http\Controllers;

use App\Exports\ArticulosExports;
use App\Models\Ubicacion;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    // Vista con ambos formularios
    public function index()
    {
        return view('excel.export', [
            'ubicaciones' => Ubicacion::all()
        ]);
    }

    // Exportar reporte general
    public function exportGeneral()
    {
        return Excel::download(new ArticulosExports(), 'reporte_general.xlsx');
    }

    // Exportar filtrado por ubicación
    public function exportPorUbicacion(Request $request)
    {
        $ubicacionId = $request->input('ubicacion');
        return Excel::download(new ArticulosExports($ubicacionId), 'reporte_ubicacion.xlsx');
    }
}
