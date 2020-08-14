<?php

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
Auth::routes(['register' => false]);
Route::redirect('/', 'login', 301);

Route::middleware(['auth'])->group(function () {
	Route::get('/home', 'HomeController@index')->name('home.index');

	/* Trabajadores*/
	Route::resource('/trabajadores', 'TrabajadorController');
	Route::resource('/users', 'UserController');

	/* Proveedor & insumos asignados */	
	Route::resource('/proveedores', 'ProveedorController');
	Route::resource('/planta', 'PlantaController');
	Route::resource('/asignacion', 'ProveedorInsumoController');
	/* Pedido Proveedor  */					
	Route::resource('/pedidos', 'PedidoController');

	/* Categoria & Producto  */					
	Route::resource('/categorias', 'CategoriaController');
	Route::resource('/productos', 'ProductoController');
	Route::get('/productos_disponibles','ProductoController@getDisponibles')
			  ->name('productos.getDisponibles');

	/** Insumos */
	Route::resource('/insumos', 'InsumoController');
	Route::get('/insumos_disponibles','InsumoController@getDisponibles')
			  ->name('insumos.getDisponibles');

    /** Revisar Pedidos */
	Route::resource('/revisarPedidos', 'RevisarPedidosController');
	Route::post('/approve_pedido', 'RevisarPedidosController@approvePedido')
			->name('revisarPedidos.approvePedido');
	Route::post('/reject_pedido', 'RevisarPedidosController@rejectPedido')
			->name('revisarPedidos.rejectPedido');
			
	/** RevisarStock */
	Route::resource('/revisarStock', 'RevisarStockController');

	 /** Seguir Pedidos */
	 Route::resource('/seguirPedidos', 'SeguirPedidosController');
});
