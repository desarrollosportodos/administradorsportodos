<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Servicios\Togroow;

/**
 * @group Gestion de Espacios deportivos
 * clase que permita la gestion de los diferentes espacios deportivos lista, crea , edita y elimina
 */
class EspacioController extends Controller
{
   /**
    * Formulario para crear un espacio deportivo
    *
    * @param Request $request data enviada para crear el espacio deportivo
    * @return void
    */
   public function nuevo(Request $request)
   {
      $data = $request->all();
      $deportes = $this->getDeportes();
      $post = [];
      $punto = Togroow::request("sportodos/puntos/" . $data['punto'] . "/detalle", $post);
      return view('admin.espacio.crear', compact('deportes', 'punto'));
   }

   /**
    * Funcion que llama al servicio de creacion de espacio y crea el espacio deportivo en el sistema
    *
    * @param Request $request datos del espacio que se van a crear
    * @return void
    */
   public function crear(Request $request)
   {
      $data = $request->all();
      $post = $data;
      if ($request->file("imagen")) {
         $post['foto'] = curl_file_create($_FILES['imagen']['tmp_name'], $_FILES['imagen']['type'], $_FILES['imagen']['name']);
      }
      $punto = $data['punto'];

      $res = Togroow::request("sportodos/espacios/crear", $post, 1);
      return redirect('/administrador/puntos/detalle/'.$punto)->with("mensaje","Tu espacio ha sido creado con exito.");
   }

   /**
    * Formulario de edicion de un espacio deportivo en especifico
    *
    * @param [type] $id identificador del espacio deportivo en el sistema
    * @bodyParam  id int required identificador del espacio deportivo en el sistema
    * @return void
    */
   public function editar($id)
   {
      $data = $this->getId($id);
      $deportes = $this->getDeportes();
      return view('admin.espacio.editar', compact('deportes', 'data'));
   }

   /**
    * Vista del detalle de un  espacio deportivo especifico
    *
    * @param [type] $id identificador del espacio deportivo en el sistema
    * @bodyParam  id int required identificador del espacio deportivo en el sistema
    * @return void
    */
   public function detalle($id)
   {
      $data = $this->getIdamplio($id);
      return view('admin.espacio.detalle', compact('data'));
   }
   /**
    * Funcion que llama al servicio de edicios de espacio y edita el espacio deportivo en el sistema
    * @param Request $request atos enviador para editar el espacio deportivo
    * @param [type] $id identificador del espacio deportivo en el sistema
    * @bodyParam  id int required identificador del espacio deportivo en el sistema
    * @return void
    */
   public function actualizar(Request $request, $id)
   {
      //$elemento = $this->getId($id); 
      $data = $request->all();
      $post = $data;
      if ($request->file("imagen")) {
         $post['foto'] = curl_file_create($_FILES['imagen']['tmp_name'], $_FILES['imagen']['type'], $_FILES['imagen']['name']);
      }
      $punto = $data['punto'];
      $res = Togroow::request("sportodos/espacios/" . $id . "/editar", $post, 3);
      return redirect('/administrador/puntos/detalle/' . $punto)->with("mensaje", "Tu espacio ha sido editado con exito.");
   }

   /**
    * Funcion para eliminar un espacio deportivo en especifico
    *
    * @param Request $request
    * @param [type] $id identificador del espacio deportivo en el sistema
    * @bodyParam  id int required identificador del espacio deportivo en el sistema
    * @return void
    */
   public function eliminar(Request $request, $id)
   {
      $elemento = $this->getId($id);
      if (isset($elemento['imagen'])) {
         $image = str_replace("http://" . $_SERVER["HTTP_HOST"] . "/imagenes/", "", $elemento['imagen']);
         Storage::disk('public')->delete($image);
      }
      $data = $request->all();

      Sportodos::request("espacio/eliminar", $data);
      return redirect('administrador/espacio')->with("mensaje", "Tu Recurso ha sido Eliminado con exito.");
   }

   /**
    * Funcion para retornar la informacion de un espacio deportivo en especifico
    *
    * @param [type] $id identificador del espacio deportivo en el sistema
    * @bodyParam  id int required identificador del espacio deportivo en el sistema
    * @return void
    */
   public function getId($id)
   {
      $post = [];
      $data =  Togroow::request("sportodos/espacios/" . $id . "/detalle", $post);
      return $data;
   }
   /**
    * Funcion para retornar la informacion de un espacio deportivo en especifico
    *
    * @param [type] $id identificador del espacio deportivo en el sistema
    * @bodyParam  id int required identificador del espacio deportivo en el sistema
    * @return void
    */
   public function getIdamplio($id)
   {
      $post = [];
      $data =  Togroow::request("sportodos/espacios/" . $id . "/detalle", $post);
      return $data;
   }

   /**
    * Funcion para retornar los deportes que se pueden asignar a un espacio deportivo
    *
    * @return void
    */
   public function getDeportes()
   {
      $post = [];
      $post['redsocial'] = '49';
      $data = Togroow::request("sportodos/deportes", $post);
      $deportes = (object)$data;
      return $deportes;
   }
}
