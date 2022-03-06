<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clientes;
use App\Models\Usuario;
use App\Models\productos;
use App\Models\proveedor;
use App\Models\Ventas;

class controlerwelcome extends Controller
{
    public function welco()
    {
        $clientes = clientes::all();
        $productos = productos::all();
        $proveedor = proveedor::all();
        $usuarios = Usuario::all();
        $ventas = Ventas::all();
        return view('welcome', compact('clientes', 'productos', 'proveedor', 'usuarios', 'ventas'));
    }
}
