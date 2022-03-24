<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productos;
use Cart;

class CartController extends Controller
{

    public function index()
    {
        $productos = productos::all();

        return view('carrito.carrito', compact('productos'));
    }

    public function Add(request $request)
    {
        $productos = productos::all();
        $producto =  productos::find($request->id);
        Cart::add(
            $producto->id,
            $producto->Nombre_del_producto,
            $producto->Precio_unitario,
            $request->Cantidad,

        );
        return view('carrito.carrito', compact('productos'))->with('succes', "$producto->Nombre_del_producto !se ha agregado con exito al carrito de compra!");
    }

    public function removeItem(Request $request)
    {
        // $productos = productos::where('id', $request->id)->first();
        Cart::remove([
            'id' => $request->id,
        ]);
        return back()->with('success', "Producto eliminado con exito de su carrito");
    }

    public function clear()
    {
        Cart::clear();
        return back()->with('success', "El carrito de compra se cleareo");
    }

    public function Mostrarcarrito()
    {
        return view('carrito.Vercarrito');
    }
}
