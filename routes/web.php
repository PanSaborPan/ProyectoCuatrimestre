<?php

use App\Http\Controllers\ProveedorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\controlerwelcome;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [LoginController::class, 'showloginform'])->name('home');

Route::get('/login', [LoginController::class, 'authLogin'])->name('login');

Route::get('/welcome', [controlerwelcome::class, 'welco']);




//Empieza modulo usuarios
Route::get('/Usuarios', [UsuarioController::class, 'index']);
Route::post('/Usuarios', [UsuarioController::class, 'create'])->name('users.create');
Route::get('/ModificarUsuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('users.edit');
Route::put('/ModificarUsuarios/{Usuarios}', [UsuarioController::class, 'update'])->name('users.update');
Route::get('/BorrarUsuarios/{id}', [UsuarioController::class, 'delete'])->name('users.delete');
//Ruta de Formulario Usuarios
Route::get('/Usuarios/FormularioUsuario', [UsuarioController::class, 'formulariousuario'])->name('user.forms');
//Acaba modulo usuario


//Empieza proveedor
Route::get('/Proveedor', [ProveedorController::class, 'index']);
Route::post('/Proveedor', [ProveedorController::class, 'create'])->name('proveedor.create');
Route::get('/ModificarProveedor/{id}/edit', [ProveedorController::class, 'edit'])->name('proveedor.edit');
Route::put('/ModificarProveedor/{Proveedor}', [ProveedorController::class, 'update'])->name('proveedor.update');
Route::get('/BorrarProveedor/{id}', [ProveedorController::class, 'delete'])->name('proveedor.delete');
//Ruta de Formulario Proveedores
Route::get('/Proveedor/FormularioProveedor', [ProveedorController::class, 'FormularioProveedor'])->name('proveedor.forms');
//Acaba proveedor

//Empieza clientes
Route::get('/Clientes', [ClientesController::class, 'index']);
Route::post('/Clientes', [ClientesController::class, 'create'])->name('cliente.create');
Route::get('/ModificarClientes/{id}/edit', [ClientesController::class, 'edit'])->name('cliente.edit');
Route::put('/ModificarClientes/{Cliente}', [ClientesController::class, 'update'])->name('cliente.update');
Route::get('/BorrarCliente/{id}', [ClientesController::class, 'delete'])->name('cliente.delete');
//Ruta de Formulario Clientes
Route::get('/Clientes/FormularioClientes', [ClientesController::class, 'formularioclientes'])->name('cliente.forms');
//Acaba clientes

//Empieza modulo ventas
Route::get('/Ventas', [VentasController::class, 'index']);
Route::post('/Ventas', [VentasController::class, 'create'])->name('ventas.create');
Route::get('/ModificarVentas/{id}/edit', [VentasController::class, 'edit'])->name('ventas.edit');
Route::put('/ModificarVentas/{id}', [VentasController::class, 'update'])->name('ventas.update');
Route::get('/BorrarVentas/{id}', [VentasController::class, 'delete'])->name('ventas.delete');
//Ruta de Formulario Ventas
Route::get('/Ventas/FormularioVentas', [VentasController::class, 'formularioventas'])->name('ventas.forms');
//Acaba modulo usuarios

//Empieza modulo productos
Route::get('/Productos', [ProductosController::class, 'index']);
Route::post('/Productos', [ProductosController::class, 'create'])->name('producto.create');
Route::get('/ModificarProductos/{id}/edit', [ProductosController::class, 'edit'])->name('producto.edit');
Route::put('/ModificarProductos/{id}', [ProductosController::class, 'update'])->name('producto.update');
Route::get('/BorrarProductos/{id}', [ProductosController::class, 'delete'])->name('producto.delete');
//Ruta de Formulario Productos
Route::get('/Productos/FormularioProductos', [ProductosController::class, 'formularioproductos'])->name('producto.forms');
//Acaba modulo productos