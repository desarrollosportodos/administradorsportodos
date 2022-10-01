<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servicios\Apiservice;

/**
 * @group Gestion de los deportes
 * clase que permita la gestion de los diferentes  deportes  lista, crea , edita y elimina
 */
class DeportesController extends Controller
{
   /**
    * Funcion para mostrar el listado de deportes registrados en el sistema
    *
    * @return void
    */
   public function index()
   {
      $post = [];
      $listado = Apiservice::request("sportodos/deportes", [], 0);
      //echo "<pre>";
      //print_r($listado);
      return view('admin.deportes.home', compact('listado'));
   }
   /**
    * Formulario de creacion de un deporte
    *
    * @return void
    */
   public function nuevo()
   {
      return view('admin.deportes.crear');
   }
   /**
    * Funcion para crear un deporte y enviar la creacion a los servicios
    *
    * @param Request $request
    * @return void
    */
   public function crear(Request $request)
   {
      $data = $request->all();
      $data['red'] = 49;
      $post = $data;
      Apiservice::request("sportodos/deportes/crear", $post, 1);
      return redirect('administrador/deportes')->with("mensaje", "Tu deporte ha sido creado con exito.");
   }
   /**
    * Funcion para editar un deporte y consumir su servicio
    *
    * @param Request $request
    * @param [type] $id identificador del deporte a actualizar
    * @urlParam id identificador del deporte a actualizar
    * 
    * @return void
    */
   public function actualizar(Request $request, $id)
   {
      $data = $request->all();
      $post = $data;
      Apiservice::request("sportodos/deportes/" . $id . "/editar", $post, 3);
      return redirect('administrador/deportes')->with("mensaje", "Tu deporte ha sido Actualizado con exito.");
   }
   /**
    * Funcion para eliminar un deporte
    *
    * @param Request $request
    * @param [type] $id identificador del deporte a eliminar
    * @urlParam id identificador del deporte a eliminar
    * 
    * @return void
    */
   public function eliminar(Request $request, $id)
   {
      $data = $request->all();
      $post = [];
      Apiservice::request("sportodos/deportes/" . $id . "/eliminar", $post, 2);
      return redirect('administrador/deportes')->with("mensaje", "Tu deporte ha sido Eliminado con exito.");
   }
}
