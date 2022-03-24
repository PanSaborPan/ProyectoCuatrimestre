<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpParser\Node\Expr\FuncCall;

class PdfController extends Controller
{
    public function PDF()
    {
        $pdf = PDF::loadview('prueba');
        return $pdf->stream('prueba.pdf');
    }

    public function PDFcarrito()
    {

        $pdf = PDF::loadview('prueba');
        return $pdf->stream('prueba.pdf');
    }
}
