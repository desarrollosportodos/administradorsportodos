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
class PuntosController extends Controller
{
   /**
    * Vista con el listado de puntos de encuentro en el sistema
    *
    * @return void
    */
   public function index()
   {
      $post = [];
      $post['redsocial'] = '49';
      $asideactual = 3;
      $deportes = $this->getDeportes();
      $paises = $this->getPaises();
      $servicios = $this->getServicios();
      return view('admin.puntos.home', compact('asideactual','deportes','servicios','paises'));
   }
   /**
    * Vista con el listado de puntos de encuentro en el sistema en formato de tabla
    *
    * @return void
    */
   public function listado(Request $request)
   {
      $data = $request->all();
      $post = [];
      $post['redsocial'] = '49';
      if(isset($data['nombre'])){
         $post['name'] = $data['nombre'];
      }
      if(isset($data['ciudad_id'])){
         $post['city'] = $data['ciudad_id'];
      }
      if(isset($data['zona_id'])){
         $post['zone'] = $data['zona_id'];
      }
      if(isset($data['servicio'])){
         $post['service'] = $data['servicio'];
      }
      if(isset($data['deporte'])){
         $post['sport'] = $data['deporte'];
      }
     
      $listado = Apiservice::request("sportodos/puntos/all", $post);
      $asideactual = 3;
      return view('admin.puntos.listado', compact('listado','asideactual'));
   }
   /**
    * Vista con el listado de puntos de encuentro en el sistema en formato de cajas
    *
    * @return void
    */
   public function listadocajas(Request $request)
   {
      $data = $request->all();
      $post = [];
      $post['redsocial'] = '49';
      if(isset($data['nombre'])){
         $post['name'] = $data['nombre'];
      }
      if(isset($data['ciudad_id'])){
         $post['city'] = $data['ciudad_id'];
      }
      if(isset($data['zona_id'])){
         $post['zone'] = $data['zona_id'];
      }
      if(isset($data['servicio'])){
         $post['service'] = $data['servicio'];
      }
      if(isset($data['deporte'])){
         $post['sport'] = $data['deporte'];
      }
      $listado = Apiservice::request("sportodos/puntos/all", $post);
      //$deportes = $this->getDeportes();
      $asideactual = 3;
      return view('admin.puntos.cajas', compact('listado', 'asideactual'));
   }

   /**
    * Formulario para crear un nuevo punto de encuentro
    *
    * @return void
    */
   public function nuevo()
   {
      $deportes = $this->getDeportes();
      $paises = $this->getPaises();
      $servicios = $this->getServicios();
      $asideactual = 3;
      return view('admin.puntos.crear', compact('deportes', 'paises', 'servicios', 'asideactual'));
   }

   /**
    * Funcion que llama al servicio de creacion de punto de encuentro
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
      if ($request->file("portada")) {
         $post['portada'] = curl_file_create($_FILES['portada']['tmp_name'], $_FILES['portada']['type'], $_FILES['portada']['name']);
      }
      if (isset($data['imagenotras']) && count($data['imagenotras']) > 0) {
         $post['imagenotras'] = [];
         foreach ($data['imagenotras'] as $key => $imagen) {
            $post['imagenotras'][$key] = curl_file_create($_FILES['imagenotras']['tmp_name'][$key], $_FILES['imagenotras']['type'][$key], $_FILES['imagenotras']['name'][$key]);
         }
      }
      $res = Apiservice::request("sportodos/puntos/crear", $post, 1);
      if (isset($res['id_punto'])) {
         return redirect('administrador/puntos/detalle/' . $res['id_punto'])->with("mensaje", "Tu tipo de Recurso ha sido creado con exito.");
      } else {
         return redirect('administrador/puntos/')->with("mensaje", "Tu punto no pudo ser creado");
      }
   }

   /**
    * Formulario de edicion de un pinto de encuentro en especifico
    *
    * @param [type] $id identificador del punto de encuentro en el sistema
    * @bodyParam  id int required identificador del punto de encuentro en el sistema
    * @return void
    */
   public function editar($id)
   {
      $data = $this->getId($id);
      $deportes = $this->getDeportes();
      $paises = $this->getPaises();
      $servicios = $this->getServicios();
      $asideactual = 3;
      return view('admin.puntos.editar', compact('deportes', 'data', 'paises', 'servicios', 'asideactual'));
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
      $data = $this->getIdamplio($id); 
      $deportes = $this->getDeportes();
      $paises = $this->getPaises();
      $servicios = $this->getServicios();
      $asideactual = 3;
      $espacios = $this->getEspacios($id);
      /*echo "<pre>";
      print_r($data);
      echo "</pre>";*/
      return view('admin.puntos.detalle', compact('deportes', 'data', 'paises', 'servicios', 'asideactual', 'espacios'));
   }

   /** Listado de propuestas de nuevos espacios pendientes de revisión. */
   public function solicitudes(Request $request)
   {
      $params = [];
      if ($request->filled('estado')) {
         $params['estado'] = $request->get('estado');
      }
      $response = Apiservice::request('sportodos/punto-solicitudes', $params);
      $listado = is_array($response) && isset($response['data']) ? $response['data'] : (is_array($response) ? $response : []);
      $asideactual = 3;
      return view('admin.puntos.solicitudes', compact('listado', 'asideactual'));
   }

   /** Detalle de una propuesta con las acciones de aprobar o rechazar. */
   public function solicitudDetalle($id)
   {
      $data = Apiservice::request('sportodos/punto-solicitudes/' . $id);
      $asideactual = 3;
      return view('admin.puntos.solicitud-detalle', compact('data', 'asideactual'));
   }

   public function aprobarSolicitud(Request $request, $id)
   {
      $response = Apiservice::request('sportodos/punto-solicitudes/' . $id . '/aprobar', [
         'nota_revision' => $request->get('nota_revision', ''),
      ], 1);
      if (isset($response['id_punto'])) {
         return redirect()->route('puntos-solicitudes')->with('mensaje', 'Solicitud aprobada: el espacio ya fue publicado.');
      }
      return redirect()->back()->with('error', $response['message'] ?? $response['error'] ?? 'No fue posible aprobar la solicitud.');
   }

   public function rechazarSolicitud(Request $request, $id)
   {
      $response = Apiservice::request('sportodos/punto-solicitudes/' . $id . '/rechazar', [
         'nota_revision' => $request->get('nota_revision', ''),
      ], 1);
      if (isset($response['mensaje'])) {
         return redirect()->route('puntos-solicitudes')->with('mensaje', 'Solicitud rechazada.');
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
      if ($request->file("imagen")) {
         $post['imagen'] = curl_file_create($_FILES['imagen']['tmp_name'], $_FILES['imagen']['type'], $_FILES['imagen']['name']);
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
      $data = Apiservice::request("sportodos/puntos/".$id."/editar", $post, 3);
      /*echo "<pre>";
      print_r($data);
      echo "</pre>";*/
      return redirect('administrador/puntos/detalle/' . $id)->with("mensaje", "Tu Punto de encuentro ha sido Actualizado con exito.");
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
      $data = Apiservice::request("sportodos/puntos/" . $id . "/detalle", $post);
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
      $data = Apiservice::request("sportodos/puntos/" . $id . "/detalle", $post);
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
      $espacios = Apiservice::request("sportodos/espacios/",$post);
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
}
