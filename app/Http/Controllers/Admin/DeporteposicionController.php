<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servicios\Togroow;

/**
 * @group Gestion de las posiciones deportivas
 * clase que permita la gestion posiciones deportivas  lista, crea , edita y elimina
 */
class DeporteposicionController extends Controller
{
   /**
    * Funcion que retorna el listado de posiciones cargadas en el sistema
    *
    * @return void
    */
   public function index()
   {
      $post = [];
      $post['redsocial'] = '49';
      $deportes = $this->getDeportes();
      $listado = Togroow::request("sportodos/deporteposicion", $post);
      /*echo "<pre>";
        print_r($listado);*/
      return view('admin.deporteposicion.home', compact('listado', 'deportes'));
   }
   /**
    * Formulario para crear una nueva posicion deportiva
    *
    * @return void
    */
   public function nuevo()
   {
      return view('admin.deporteposicion.crear');
   }
   /**
    * Funcion para crear una posicion deportiva  por medio del servicio
    *
    * @param Request $request
    * @return void
    */
   public function crear(Request $request)
   {
      $data = $request->all();
      $data['red'] = 49;
      $post = $data;
      Togroow::request("sportodos/deporteposicion/crear", $post, 1);
      return redirect('administrador/deporteposicion')->with("mensaje", "Tu tipo de Espacio ha sido creado con exito.");
   }

   /**
    * Funcion para actualizar una posicion deportiva y enviarla al servicio
    *
    * @param Request $request
    * @param [type] $id identificador de la de la posicion a editar
    * @urlParam id identificador de la de la posicion a editar
    * @return void
    */
   public function actualizar(Request $request, $id)
   {
      $data = $request->all();
      $post = $data;
      Togroow::request("sportodos/deporteposicion/" . $id . "/editar", $post, 3);
      return redirect('administrador/deporteposicion')->with("mensaje", "Tu tipo de Recurso ha sido Actualizado con exito.");
   }

   /**
    * Funcion para elimianr una posicion deportiva
    *
    * @param Request $request
    * @param [type] $id identificador de la de la posicion a eliminar
    * @urlParam id identificador de la de la posicion a eliminar
    * @return void
    */
   public function eliminar(Request $request, $id)
   {
      $data = $request->all();
      $post = $data;
      Togroow::request("sportodos/deporteposicion/" . $id . "/eliminar", $post, 2);
      return redirect('administrador/deporteposicion')->with("mensaje", "Tu tipo de Recurso ha sido Actualizado con exito.");
   }

   /**
    * Funcion para retornar el listadod e deportes que pueden tener posisciones deportivas
    *
    * @return void
    */
   public function getDeportes()
   {
      $post = [];
      $post['redsocial'] = '49';
      $datos = Togroow::request("sportodos/deportes", $post);;
      $deportes = [];
      foreach ($datos as  $value) {
         $deportes[$value['id']] = $value['nombre'];
      }
      return $deportes;
   }
}
