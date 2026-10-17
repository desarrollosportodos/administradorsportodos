<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servicios\Apiservice;
/**
 * @group Gestion de las barreras deportivas
 * clase que permita la gestion de las barreras deportivas  lista, crea , edita y elimina
 */
class CategoriainiciativaController extends Controller
{
   /**
    * Funcion que muestra el listado de barreras y permite ve las acciones que se le pueden hacer a cada una de ellas
    *
    * @return void
    */
   public function index()
   {
      $post = [];
      $listado =  Apiservice::request("sportodos/categoriasiniciativas", $post);
      return view('admin.categoriainiciativa.home', compact('listado'));
   }

   /**
    * Funcion que muestra el formulario de creacion de una barrera
    *
    * @return void
    */
   public function nuevo()
   {
      return view('admin.categoriainiciativa.crear');
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
      $post = $data;
        if ($request->file("imagen")) {
            $post['imagen'] = curl_file_create($_FILES['imagen']['tmp_name'], $_FILES['imagen']['type'], $_FILES['imagen']['name']);
        }
      Apiservice::request("sportodos/categoriasiniciativas/create", $post, 1);
      return redirect('administrador/categoriainiciativas')->with("mensaje", "Tu Categoria ha sido creada con exito.");
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
        if ($request->file("imagen")) {
            $post['imagen'] = curl_file_create($_FILES['imagen']['tmp_name'], $_FILES['imagen']['type'], $_FILES['imagen']['name']);
        }
      // El servicio expone POST para que Laravel reciba correctamente el
      // multipart/form-data cuando se cambia la imagen.
      $response = Apiservice::request("sportodos/categoriasiniciativas/" . $id . "/edit", $post, 1);
      if (isset($response['error']) || isset($response['_status'])) {
         return redirect('administrador/categoriainiciativas')->with('error', $response['message'] ?? $response['error'] ?? 'No fue posible actualizar la categoría.');
      }
      return redirect('administrador/categoriainiciativas')->with("mensaje", "Tu tipo de Recurso ha sido Actualizado con exito.");
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
      Apiservice::request("sportodos/categoriainiciativas/" . $id . "/eliminar", $post, 2);
      return redirect('administrador/categoriainiciativas')->with("mensaje", "Tu tipo de Recurso ha sido Actualizado con exito.");
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
