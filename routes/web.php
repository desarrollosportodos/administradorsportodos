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

Route::get('administrador/login', 'Admin\LoginController@index')->name('login');
Route::any('administrador/login2', 'Admin\LoginController@login')->name('login2');
Route::get('','Admin\HomeController@index')->name('home')->middleware("admin");
Route::group(['prefix' => 'administrador','namespace'=>'Admin','middleware'=>['admin'] ], function(){ 
    Route::get('logout', 'LoginController@logout')->name('logout');

    Route::get('', 'HomeController@index')->name('home-administracion');
    Route::get('parametrizacion', 'ParametrizacionController@index')->name('parametrizacion-administracion');


    Route::get('puntos', 'PuntosController@index')->name('puntos');
    Route::get('puntos/listado', 'PuntosController@listado')->name('puntoslistado');
    Route::get('puntos/listadocajas', 'PuntosController@listadocajas')->name('puntoslistadocajas');
    Route::get('puntos/nuevo', 'PuntosController@nuevo')->name('puntos-nuevo');
    Route::post('puntos/crear', 'PuntosController@crear')->name('puntos-crear');
    Route::get('puntos/editar/{id}', 'PuntosController@editar')->name('puntos-editar');
    Route::post('puntos/actualizar/{id}', 'PuntosController@actualizar')->name('puntos-actualizar');
    Route::post('puntos/eliminar/{id}', 'PuntosController@eliminar')->name('puntos-eliminar');
    Route::get('puntos/detalle/{id}', 'PuntosController@detalle')->name('puntos-detalle');
    Route::any('puntos/eliminarimagen', 'PuntosController@eliminarimagen')->name('puntos-eliminarimagen');


    Route::get('espacio/nuevo', 'EspacioController@nuevo')->name('espacio-nuevo');
    Route::post('espacio/crear', 'EspacioController@crear')->name('espacio-crear');
    Route::get('espacio/editar/{id}', 'EspacioController@editar')->name('espacio-editar');
    Route::post('espacio/actualizar/{id}', 'EspacioController@actualizar')->name('espacio-actualizar');
    Route::get('espacio/detalle/{id}', 'EspacioController@detalle')->name('espacio-detalle');

    Route::get('deportes', 'DeportesController@index')->name('deportes');
    Route::get('deportes/nuevo', 'DeportesController@nuevo')->name('deportes-nuevo');
    Route::post('deportes/crear', 'DeportesController@crear')->name('deportes-crear');
    Route::get('deportes/editar/{id}', 'DeportesController@editar')->name('deportes-editar');
    Route::post('deportes/actualizar/{id}', 'DeportesController@actualizar')->name('deportes-actualizar');
    Route::post('deportes/eliminar/{id}', 'DeportesController@eliminar')->name('deportes-eliminar');


    Route::get('servicios', 'ServiciosController@index')->name('servicios');
    Route::get('servicios/nuevo', 'ServiciosController@nuevo')->name('servicios-nuevo');
    Route::post('servicios/crear', 'ServiciosController@crear')->name('servicios-crear');
    Route::get('servicios/editar/{id}', 'ServiciosController@editar')->name('servicios-editar');
    Route::post('servicios/actualizar/{id}', 'ServiciosController@actualizar')->name('servicios-actualizar');
    Route::post('servicios/eliminar/{id}', 'ServiciosController@eliminar')->name('servicios-eliminar');
    
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

    Route::get('categoriainiciativas', 'CategoriainiciativaController@index')->name('categoriainiciativas');
    Route::get('categoriainiciativas/nuevo', 'CategoriainiciativaController@nuevo')->name('categoriainiciativas-nuevo');
    Route::post('categoriainiciativas/crear', 'CategoriainiciativaController@crear')->name('categoriainiciativas-crear');
    Route::get('categoriainiciativas/editar/{id}', 'CategoriainiciativaController@editar')->name('categoriainiciativas-editar');
    Route::post('categoriainiciativas/actualizar/{id}', 'CategoriainiciativaController@actualizar')->name('categoriainiciativas-actualizar');
    Route::post('categoriainiciativas/eliminar/{id}', 'CategoriainiciativaController@eliminar')->name('categoriainiciativas-eliminar');

    Route::get('iniciativas', 'IniciativaController@index')->name('iniciativas');
    Route::get('iniciativas/nuevo', 'IniciativaController@nuevo')->name('iniciativas-nuevo');
    Route::post('iniciativas/crear', 'IniciativaController@crear')->name('iniciativas-crear');
    Route::get('iniciativas/editar/{id}', 'IniciativaController@editar')->name('iniciativas-editar');
    Route::post('iniciativas/actualizar/{id}', 'IniciativaController@actualizar')->name('iniciativas-actualizar');
    Route::post('iniciativas/eliminar/{id}', 'IniciativaController@eliminar')->name('iniciativas-eliminar');
    

    Route::get('ciudades', 'CiudadesController@index')->name('listdociudades');
    Route::get('zonas', 'CiudadesController@zonas')->name('listdozonas');

    Route::get('usuarios', 'UsuariosController@index')->name('usuarios');
    Route::get('usuarios/nuevo', 'UsuariosController@nuevo')->name('usuarios-nuevo');
    Route::post('usuarios/crear', 'UsuariosController@crear')->name('usuarios-crear');
    Route::get('usuarios/editar/{id}', 'UsuariosController@editar')->name('usuarios-editar');
    Route::post('usuarios/actualizar/{id}', 'UsuariosController@actualizar')->name('usuarios-actualizar');
    Route::post('usuarios/eliminar/{id}', 'UsuariosController@eliminar')->name('usuarios-eliminar');

}); 

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});