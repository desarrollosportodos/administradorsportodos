<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Servicios\Apiservice;

/**
 * @group Gestion de puntos de encuentro
 * clase que permita la gestion de los diferentes puntos de encuentro lista, crea , edita y elimina
 */
class IniciativasolicitudController extends Controller
{
   /**
    * Vista con el listado de puntos de encuentro en el sistema
    *
    * @return void
    */
   public function index()
   {
      $post = [];
      $listado = Apiservice::request("sportodos/iniciativas/solicitudes", $post);
      $asideactual = 7; 
      //print_r($listado);
      return view('admin.iniciativasolicitud.home', compact('asideactual','listado'));
   }

   /**
    * Vista con el detalle de un punto de encuentro
    *
    * @param [type] $id identificador del punto de encuentro en el sistema
    * @bodyParam  id int required identificador del punto de encuentro en el sistema
    * @return void
    */
   public function detalle($id)
   {
        $post = [];
        $data =  Apiservice::request("sportodos/iniciativas/detallesolicitud/".$id, $post);
        $asideactual = 7; 
        /*echo "<pre>";
        print_r($data);
        echo "</pre>";*/
        return view('admin.iniciativasolicitud.detalle', compact('data','asideactual'));
   }

   public function aprobar(Request $request, $id)
   {
      $response = Apiservice::request('sportodos/iniciativas/solicitudes/' . $id . '/aprobar', [
         'nota_revision' => $request->get('nota_revision', ''),
      ], 1);
      if (isset($response['id_iniciativa'])) {
         return redirect()->route('iniciativasolicitud')->with('mensaje', 'Solicitud aprobada y publicada como iniciativa.');
      }
      return redirect()->back()->with('error', $response['message'] ?? $response['error'] ?? 'No fue posible aprobar la solicitud.');
   }

   public function rechazar(Request $request, $id)
   {
      $response = Apiservice::request('sportodos/iniciativas/solicitudes/' . $id . '/rechazar', [
         'nota_revision' => $request->get('nota_revision', ''),
      ], 1);
      if (isset($response['mensaje'])) {
         return redirect()->route('iniciativasolicitud')->with('mensaje', 'Solicitud rechazada.');
      }
      return redirect()->back()->with('error', $response['message'] ?? $response['error'] ?? 'No fue posible rechazar la solicitud.');
   }

   /**
    * Funcion para llamar al servicio de actualizacion de punto de encuentro
    *
    * @param Request $request
    * @param [type] $id identificador del punto de encuentro en el sistema
    * @bodyParam  id int required identificador del punto de encuentro en el sistema
    * @return void
    */
   public function actualizar(Request $request, $id)
   {
      //$elemento = $this->getId($id);
      $data = $request->all();
      $post = $data;
      if ($request->file("foto")) {
         $post['foto'] = curl_file_create($_FILES['foto']['tmp_name'], $_FILES['foto']['type'], $_FILES['foto']['name']);
      }
      if ($request->file("portada")) {
   
         $post['portada'] = curl_file_create($_FILES['portada']['tmp_name'], $_FILES['portada']['type'], $_FILES['portada']['name']);
      }
      if (isset($data['imagenotras']) && count($data['imagenotras']) > 0) {
         $post['imagenotras'] = [];
         foreach ($data['imagenotras'] as $key => $imagen) {
            $post['imagenotras'][$key] = curl_file_create($_FILES['imagenotras']['tmp_name'][$key], $_FILES['imagenotras']['type'][$key], $_FILES['imagenotras']['name'][$key]);
         }
      }
      /*echo "<pre>";
      print_r($post);
      echo "</pre>";*/
      $data = Apiservice::request("sportodos/iniciativas/".$id."/edit", $post, 3);
      /*echo "<pre>";
      print_r($data);
      echo "</pre>";*/
      return redirect('administrador/iniciativas')->with("mensaje", "Tu iniciativa Actualizada con exito.");
   }

   /**
    * Funcion para eliminar un punto de encuentro
    *
    * @param Request $request
    * @param [type] $id identificador del punto de encuentro en el sistema
    * @bodyParam  id int required identificador del punto de encuentro en el sistema
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

      Apiservice::request("puntos/eliminar", $data);
      return redirect('administrador/puntos')->with("mensaje", "Tu Recurso ha sido Eliminado con exito.");
   }

   /**
    * Funcion para eliminar una imagen dentro de un punto de encuentro
    *
    * @param Request $reques
    * @return void
    */
   public function eliminarimagen(Request $reques)
   {
      $data = $reques->all();
      if (isset($data['imagen'])) {
         $image = str_replace("http://" . $_SERVER["HTTP_HOST"] . "/imagenes/", "", $data['imagen']);
         Storage::disk('public')->delete($image);
      }
      return response()->json([])->header('Access-Control-Allow-Origin', '*');
   }
   /**
    * Funcion para retornar la informacion de un puntro de encuentro
    * esta indformacion es traida por medio de un servicio
    *
    * @param [type] $id
    * @return void
    */
   public function getId($id)
   {
      $post = [];
      $data = Apiservice::request("sportodos/iniciativas/detalle/".$id, $post);
      return $data;
   }
   /**
    * Funcion para retornar la informacion de un puntro de encuentro
    * esta indformacion es traida por medio de un servicio
    *
    * @param [type] $id
    * @return void
    */
   public function getIdamplio($id)
   {

      $post = [];
      $data = Apiservice::request("sportodos/iniciativas/detalle/".$id, $post);
      return $data;
   }

   /**
    * Funcion para retornar la informacion de los deportes que se van a asignar a un punto de encuentro
    * esta indformacion es traida por medio de un servicio
    *
    * @return void
    */
   public function getDeportes()
   {
      $post = [];
      $post['redsocial'] = '49';
      $data = Apiservice::request("sportodos/deportes", $post);
      $deportes = (object)$data;
      return $deportes;
   }
/**
    * Funcion para retornar la informacion de los servicios que se van a asignar a un punto de encuentro
    * esta indformacion es traida por medio de un servicio
    *
    * @return void
    */
   public function getServicios()
   {
      $post = [];
      $post['redsocial'] = '49';
      $servicios = Apiservice::request("sportodos/servicios", $post);
      return $servicios;
   }
   /**
    * Funcion para retornar la informacion espacios asignados a un punto de encuentro
    * esta indformacion es traida por medio de un servicio
    *
    * @return void
    */
   public function getEspacios($punto)
   {
      $post = [];
      $post['punto_id'] = $punto;
      $espacios = Apiservice::request("sportodos/espacios/", $post);
      return $espacios;
   }
   /**
    * Funcion para retornar la informacion del pais que se va a asignar a un punto de encuentro
    * esta indformacion es traida por medio de un servicio
    *
    * @return void
    */
   public function getPaises()
   {
      $post = [];
      $post['redsocial'] = '49';
      $data = Apiservice::request("lugares/paises", $post);
      $paises = $data;
      return $paises;
   }

   /**
    * Funcion para retornar la informacion del pais que se va a asignar a un punto de encuentro
    * esta indformacion es traida por medio de un servicio
    *
    * @return void
    */
    public function getCiudades()
    {
       $post = [];
       $data = Apiservice::request("lugares/paises/co/ciudades", $post);
       return $data;
    }

   /**
    * Funcion para retornar la informacion de las categorias de que se va a asignar a una iniciativa
    * esta informacion es traida por medio de un servicio
    *
    * @return void
    */
    public function getCategorias()
    {
       $post = [];
       $data = Apiservice::request("sportodos/categoriasiniciativas", $post);
       return $data;
    }

}
