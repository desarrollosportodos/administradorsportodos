<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servicios\Togroow;
/**
 * @group Gestion de las barreras deportivas
 * clase que permita la gestion de las barreras deportivas  lista, crea , edita y elimina
 */
class DeportebarreraController extends Controller
{
   /**
    * Funcion que muestra el listado de barreras y permite ve las acciones que se le pueden hacer a cada una de ellas
    *
    * @return void
    */
   public function index()
   {
      $post = [];
      $post['redsocial'] = '49';
      $listado =  Togroow::request("sportodos/deportebarrera", $post);
      $tipos = $this->getTipos();
      return view('admin.deportebarrera.home', compact('listado', 'tipos'));
   }

   /**
    * Funcion que muestra el formulario de creacion de una barrera
    *
    * @return void
    */
   public function nuevo()
   {
      return view('admin.deportebarrera.crear');
   }
   /**
    * Funcion que crea  la barrera deportiva enviando los datos de la barrera al servicio
    *
    * @param Request $request
    * @return void
    */
   public function crear(Request $request)
   {
      $data = $request->all();
      $data['red'] = 49;
      $post = $data;
      Togroow::request("sportodos/deportebarrera/crear", $post, 1);
      return redirect('administrador/deportebarrera')->with("mensaje", "Tu Barrera ha sido creado con exito.");
   }

   /**
    * Funcion que edita una barrera deportiva enviando los datos de la barrera al servicio
    *
    * @param Request $request
    * @param [type] $id identificador de la barrera a editar
    * @urlParam id identificador de la barrera a editar
    * @return void
    */
   public function actualizar(Request $request, $id)
   {
      $data = $request->all();
      $post = $data;
      Togroow::request("sportodos/deportebarrera/" . $id . "/editar", $post, 3);
      return redirect('administrador/deportebarrera')->with("mensaje", "Tu tipo de Recurso ha sido Actualizado con exito.");
   }

   /**
    * Funcion para eliminar una barrera esta funcion hace el llamado al servicio de eliminacion
    *
    * @param Request $request
    * @param [type] $id identificador de la barrera a eliminar
    * @urlParam id identificador de la barrera a eliminar
    * @return void
    */
   public function eliminar(Request $request, $id)
   {
      $data = $request->all();
      $post = $data;
      Togroow::request("sportodos/deportebarrera/" . $id . "/eliminar", $post, 2);
      return redirect('administrador/deportebarrera')->with("mensaje", "Tu tipo de Recurso ha sido Actualizado con exito.");
   }

   /**
    * Funcion que retorna el listado de tipos de barrera deportiva
    *
    * @return void
    */
   public function getTipos()
   {
      $tipos = [];
      $tipos[1] = "Fisico";
      $tipos[2] = "Ambiental";
      return $tipos;
   }
}
