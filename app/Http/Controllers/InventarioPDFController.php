<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class InventarioPDFController extends Controller
{
    public function pdf_view(){
        $fecha = date('d/m/Y');
        $items = Equipo::all();
        $pdf = PDF::loadView('pruebaparapdf', compact('items','fecha'));
        $pdf->setPaper('a4');

        return $pdf->stream();
    }
}
