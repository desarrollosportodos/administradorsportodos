<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servicios\Apiservice;

/**
 * @group Gestion de los deportes
 * clase que permita la gestion de los diferentes  deportes  lista, crea , edita y elimina
 */
class CargapuntosController extends Controller
{
   /**
    * Funcion para mostrar el listado de deportes registrados en el sistema
    *
    * @return void
    */
   public function index()
   {
      $post = [];
      $listado = Apiservice::request("sportodos/puntoscargar", []);
      /*echo "<pre>";
      print_r($listado);*/
      return view('admin.cargapuntos.home', compact('listado'));
   }
   
   public function crear(Request $request)
   {
        $data = $request->all();
        $post = $data;
        if ($request->file("archivo")) {
            $post['archivo'] = curl_file_create($_FILES['archivo']['tmp_name'], $_FILES['archivo']['type'], $_FILES['archivo']['name']);
        }
        Apiservice::request("sportodos/puntoscargar/crear", $post, 1);
        return redirect('administrador/cargapuntos')->with("mensaje", "Tu archivo ha sido cargado con exito.");
   }
}
