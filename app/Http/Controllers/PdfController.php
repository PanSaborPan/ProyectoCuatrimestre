<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{
    public function PDF(Request $request)
    {
        $clientes = DB::table('clientes')
            ->where('Id_cliente', $request->ClientesList)
            ->get();

        $pdf = PDF::loadview('prueba', compact('clientes'));

        return $pdf->stream('prueba.pdf');
    }

    public function PDFcarrito(Request $request)
    {
        $clientes = DB::table('clientes')
            ->where('Id_cliente', $request->ClientesList)
            ->get();

        $pdf = PDF::loadview('prueba', compact('clientes'));


        return $pdf->stream('prueba.pdf');
    }
}
