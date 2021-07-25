<?php

namespace App\Http\Controllers;

use App\Models\AsignacionEquipo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class EquiposAsignadosPDFController extends Controller
{
    //
    public function pdf_view(){
        $fecha = date('d/m/Y');
        $items=AsignacionEquipo::all();
        $pdf = PDF::loadView('equiposasignados', compact('items','fecha'));
        $pdf->setPaper('a4');

        return $pdf->stream();
    }
}
