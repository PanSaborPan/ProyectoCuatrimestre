<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\productos;
use App\Models\usuario;
use App\Models\proveedor;
use App\Models\ventas;
use App\Models\clientes;

class controlerwelcome extends Controller
{
    public function welco()
    {
        $productos = productos::all();
        $usuarios = usuario::all();
        $proveedor = proveedor::all();
        $ventas = ventas::all();
        $clientes = clientes::all();

        return view('welcome', compact('productos','usuarios','proveedor','ventas','clientes'));
    }
   
}
