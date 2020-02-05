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

Route::get('/', function () {
    Redirect::intended('/administrador');
});
Route::get('administrador/login', 'Admin\LoginController@index')->name('login');
Route::get('administrador/login2', 'Admin\LoginController@login')->name('login2');
Route::group(['prefix' => 'administrador','namespace'=>'Admin','middleware'=>['admin'] ], function(){ 
    Route::get('logout', 'LoginController@logout')->name('logout');
    Route::get('', 'HomeController@index')->name('home-administracion');

    Route::get('clientes', 'ClientesController@index')->name('clientes');
    Route::get('clientes/nuevo', 'ClientesController@nuevo')->name('nuevo-cliente');
    Route::any('clientes/crear', 'ClientesController@nuevocliente')->name('crearcliente');
    Route::any('clientes/detalle/{id}', 'ClientesController@detalle')->name('detallecliente');
    Route::any('clientes/editar/{id}', 'ClientesController@editar')->name('editar-cliente');


    Route::get('recursos/gestion', 'RecursosController@index')->name('gestion-recursos');
    Route::get('recursos/gestion/nuevo', 'RecursosController@nuevo')->name('gestion-recursos-nuevo');
    Route::post('recursos/gestion/crear', 'RecursosController@crear')->name('gestion-recursos-crear');
    Route::get('recursos/gestion/editar/{id}', 'RecursosController@editar')->name('gestion-recursos-editar');
    Route::post('recursos/gestion/actualizar/{id}', 'RecursosController@actualizar')->name('gestion-recursos-actualizar');
    Route::post('recursos/gestion/eliminar/{id}', 'RecursosController@eliminar')->name('gestion-recursos-eliminar');

    Route::get('recursos/tipos', 'TiposrecursosController@index')->name('tipos-recursos');
    Route::get('recursos/tipos/nuevo', 'TiposrecursosController@nuevo')->name('tipos-recursos-nuevo');
    Route::post('recursos/tipos/crear', 'TiposrecursosController@crear')->name('tipos-recursos-crear');
    Route::post('recursos/tipos/actualizar/{id}', 'TiposrecursosController@actualizar')->name('tipos-recursos-actualizar');
    Route::post('recursos/tipos/eliminar/{id}', 'TiposrecursosController@eliminar')->name('tipos-recursos-eliminar');

    Route::get('recursos/gestion/salas', 'CalendariorecursosController@index')->name('calendario-recursos');
    Route::post('recursos/gestion/salas/reservar/{id}', 'CalendariorecursosController@reservar')->name('calendario-reservas-recursos');

    Route::get('espacios', 'EspaciosController@index')->name('espacios');
    Route::get('espacios/nuevo', 'EspaciosController@nuevo')->name('espacios-nuevo');
    Route::post('espacios/crear', 'EspaciosController@crear')->name('espacios-crear');
    Route::get('espacios/editar/{id}', 'EspaciosController@editar')->name('espacios-editar');
    Route::post('espacios/actualizar/{id}', 'EspaciosController@actualizar')->name('espacios-actualizar');
    Route::post('espacios/eliminar/{id}', 'EspaciosController@eliminar')->name('espacios-eliminar');

    Route::get('deportes', 'DeportesController@index')->name('deportes');
    Route::get('deportes/nuevo', 'DeportesController@nuevo')->name('deportes-nuevo');
    Route::post('deportes/crear', 'DeportesController@crear')->name('deportes-crear');
    Route::get('deportes/editar/{id}', 'DeportesController@editar')->name('deportes-editar');
    Route::post('deportes/actualizar/{id}', 'DeportesController@actualizar')->name('deportes-actualizar');
    Route::post('deportes/eliminar/{id}', 'DeportesController@eliminar')->name('deportes-eliminar');


    Route::get('espaciosservicios', 'EspaciosserviciosController@index')->name('espaciosservicios');
    Route::get('espaciosservicios/nuevo', 'EspaciosserviciosController@nuevo')->name('espaciosservicios-nuevo');
    Route::post('espaciosservicios/crear', 'EspaciosserviciosController@crear')->name('espaciosservicios-crear');
    Route::get('espaciosservicios/editar/{id}', 'EspaciosserviciosController@editar')->name('espaciosservicios-editar');
    Route::post('espaciosservicios/actualizar/{id}', 'EspaciosserviciosController@actualizar')->name('espaciosservicios-actualizar');
    Route::post('espaciosservicios/eliminar/{id}', 'EspaciosserviciosController@eliminar')->name('espaciosservicios-eliminar');
    
    Route::get('espaciostipos', 'EspaciostipoController@index')->name('espaciostipos');
    Route::get('espaciostipos/nuevo', 'EspaciostipoController@nuevo')->name('espaciostipos-nuevo');
    Route::post('espaciostipos/crear', 'EspaciostipoController@crear')->name('espaciostipos-crear');
    Route::get('espaciostipos/editar/{id}', 'EspaciostipoController@editar')->name('espaciostipos-editar');
    Route::post('espaciostipos/actualizar/{id}', 'EspaciostipoController@actualizar')->name('espaciostipos-actualizar');
    Route::post('espaciostipos/eliminar/{id}', 'EspaciostipoController@eliminar')->name('espaciostipos-eliminar');

    Route::get('deporteposicion', 'DeporteposicionController@index')->name('deporteposicion');
    Route::get('deporteposicion/nuevo', 'DeporteposicionController@nuevo')->name('deporteposicion-nuevo');
    Route::post('deporteposicion/crear', 'DeporteposicionController@crear')->name('deporteposicion-crear');
    Route::get('deporteposicion/editar/{id}', 'DeporteposicionController@editar')->name('deporteposicion-editar');
    Route::post('deporteposicion/actualizar/{id}', 'DeporteposicionController@actualizar')->name('deporteposicion-actualizar');
    Route::post('deporteposicion/eliminar/{id}', 'DeporteposicionController@eliminar')->name('deporteposicion-eliminar');

    Route::get('deportebarrera', 'DeportebarreraController@index')->name('deportebarrera');
    Route::get('deportebarrera/nuevo', 'DeportebarreraController@nuevo')->name('deportebarrera-nuevo');
    Route::post('deportebarrera/crear', 'DeportebarreraController@crear')->name('deportebarrera-crear');
    Route::get('deportebarrera/editar/{id}', 'DeportebarreraController@editar')->name('deportebarrera-editar');
    Route::post('deportebarrera/actualizar/{id}', 'DeportebarreraController@actualizar')->name('deportebarrera-actualizar');
    Route::post('deportebarrera/eliminar/{id}', 'DeportebarreraController@eliminar')->name('deportebarrera-eliminar');
    

    Route::get('ciudades', 'CiudadesController@index')->name('listdociudades');
    Route::get('zonas', 'CiudadesController@zonas')->name('listdozonas');

}); 
