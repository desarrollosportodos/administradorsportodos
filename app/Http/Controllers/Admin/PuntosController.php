<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Servicios\Togroow;

class PuntosController extends Controller
{
   public function index()
   {
      $post = [];
      $post['redsocial'] = '49';
      $asideactual = 3;
      return view('admin.puntos.home',compact('asideactual'));
   }

   public function listado()
   {
      $post = [];
      $post['redsocial'] = '49';
      $listado = Togroow::request("sportodos/puntos/all",$post);
      $asideactual = 3;
      //return view('admin.puntos.listado', compact('listado','asideactual'));
   }
   public function listadocajas()
   {
      $post = [];
      $post['redsocial'] = '49';
      $listado = Togroow::request("sportodos/puntos/all",$post);
      //$deportes = $this->getDeportes();
      $asideactual = 3;
      return view('admin.puntos.cajas', compact('listado','asideactual'));
   }

   public function nuevo()
   {
      $deportes = $this->getDeportes();
      $paises = $this->getPaises();
      $servicios = $this->getServicios();
      $asideactual = 3;
      return view('admin.puntos.crear', compact('deportes','paises','servicios','asideactual'));
   }

   public function crear(Request $request)
   {
      $data = $request->all();
      $post = $data;
      if($request->file("imagen")){
         $post['imagen'] = curl_file_create($_FILES['imagen']['tmp_name'], $_FILES['imagen']['type'], $_FILES['imagen']['name']);
      }
      if($request->file("portada")){
         $post['portada'] = curl_file_create($_FILES['portada']['tmp_name'], $_FILES['portada']['type'], $_FILES['portada']['name']);
      }
      if(isset($data['imagenotras']) && count($data['imagenotras']) > 0 ){
         $post['imagenotras'] = [];
         foreach ($data['imagenotras'] as $key => $imagen) {
            $post['imagenotras'][$key] = curl_file_create($_FILES['imagenotras']['tmp_name'][$key], $_FILES['imagenotras']['type'][$key], $_FILES['imagenotras']['name'][$key]);
         }
      }
      $res = Togroow::request("sportodos/puntos/crear",$post,1);
      if(isset($res['id_punto'])){
         return redirect('administrador/puntos/detalle/'.$res['id_punto'])->with("mensaje","Tu tipo de Recurso ha sido creado con exito.");
      } else {
         return redirect('administrador/puntos/')->with("mensaje","Tu punto no pudo ser creado");
      }
      
   }

   public function editar($id)
   {
      $data = $this->getId($id); 
      $deportes = $this->getDeportes();
      $paises = $this->getPaises();
      $servicios = $this->getServicios();
      $asideactual = 3;
      return view('admin.puntos.editar', compact('deportes','data','paises','servicios','asideactual'));
   }

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
      return view('admin.puntos.detalle', compact('deportes','data','paises','servicios','asideactual','espacios'));
   }

   public function actualizar(Request $request,$id)
   {
      //$elemento = $this->getId($id);
      $data = $request->all();
      $post = $data;
      if($request->file("imagen")){
         $post['imagen'] = curl_file_create($_FILES['imagen']['tmp_name'], $_FILES['imagen']['type'], $_FILES['imagen']['name']);
      }
      if($request->file("portada")){
         $post['portada'] = curl_file_create($_FILES['portada']['tmp_name'], $_FILES['portada']['type'], $_FILES['portada']['name']);
      }
      if(isset($data['imagenotras']) && count($data['imagenotras']) > 0 ){
         $post['imagenotras'] = [];
         foreach ($data['imagenotras'] as $key => $imagen) {
            $post['imagenotras'][$key] = curl_file_create($_FILES['imagenotras']['tmp_name'][$key], $_FILES['imagenotras']['type'][$key], $_FILES['imagenotras']['name'][$key]);
         }
      }
      Togroow::request("sportodos/puntos/".$id."/editar/",$post,3);
      return redirect('administrador/puntos/detalle/'.$id)->with("mensaje","Tu Punto de encuentro ha sido Actualizado con exito.");
   }

   public function eliminar(Request $request,$id){
      $elemento = $this->getId($id); 
      if(isset($elemento['imagen']) ){
         $image = str_replace("http://".$_SERVER["HTTP_HOST"]."/imagenes/","",$elemento['imagen']);
         Storage::disk('public')->delete($image);
      }
      $data = $request->all();

      Sportodos::request("puntos/eliminar",$data);
      return redirect('administrador/puntos')->with("mensaje","Tu Recurso ha sido Eliminado con exito.");
   }
   public function eliminarimagen(Request $reques){
      $data = $reques->all();
      if(isset($data['imagen']) ){
         $image = str_replace("http://".$_SERVER["HTTP_HOST"]."/imagenes/","",$data['imagen']);
         Storage::disk('public')->delete($image);
      }
      return response()->json([])->header('Access-Control-Allow-Origin', '*');
   }

   public function getId($id){
      $post = [];
      $data = Togroow::request("sportodos/puntos/".$id."/detalle",$post);
      return $data;
   }
   public function getIdamplio($id){

      $post = [];
      $data = Togroow::request("sportodos/puntos/".$id."/detalle",$post);
      return $data;

   }


   public function getDeportes()
   {
        $post = [];
        $post['redsocial'] = '49';
        $data = Togroow::request("sportodos/deportes",$post);
        $deportes = (object)$data;
        return $deportes;
   }

   public function getServicios()
   {
        $post = [];
        $post['redsocial'] = '49';
        $servicios = Togroow::request("sportodos/servicios",$post);
        return $servicios;
   }

   public function getEspacios($punto)
   {
        $post = [];
        $post['punto_id'] = $punto;
        $espacios = Togroow::request("sportodos/espacios/",$post);
        return $espacios;
   }

   public function getPaises()
   {
        $post = [];
        $post['redsocial'] = '49';
        $data = Togroow::request("lugares/paises",$post);
        $paises = $data;
        return $paises;
   }

   


}
