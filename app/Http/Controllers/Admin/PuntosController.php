<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Servicios\Sportodos;

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
      $listado = Sportodos::request("puntos",$post);
      $deportes = $this->getDeportes();
      $asideactual = 3;
      return view('admin.puntos.listado', compact('listado','deportes','asideactual'));
   }
   public function listadocajas()
   {
      $post = [];
      $post['redsocial'] = '49';
      $listado = Sportodos::request("puntos",$post);
      $deportes = $this->getDeportes();
      $asideactual = 3;
      return view('admin.puntos.cajas', compact('listado','deportes','asideactual'));
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
      $data['redsocial'] = 49;
      if($request->file("imagen")){
         $data['foto'] = "http://".$_SERVER["HTTP_HOST"]."/imagenes/".Storage::disk('public')->put('',$request->file("imagen"));
      }
      if($request->file("portada")){
         $data['portada'] = "http://".$_SERVER["HTTP_HOST"]."/imagenes/".Storage::disk('public')->put('',$request->file("portada"));
      }
      $post = $data;
      $data = Sportodos::request("puntos/crear",$post);
      return redirect('administrador/puntos')->with("mensaje","Tu tipo de Recurso ha sido creado con exito.");
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
      return view('admin.puntos.detalle', compact('deportes','data','paises','servicios','asideactual','espacios'));
   }

   public function actualizar(Request $request,$id)
   {
      $elemento = $this->getId($id);
      $data = $request->all();
      if($request->file("imagen")){
         if(isset($elemento['punto']['foto'])){
            $image = str_replace("http://".$_SERVER["HTTP_HOST"]."/imagenes/","",$elemento['punto']['foto']);
            Storage::disk('public')->delete($image);
         }
         $data['foto'] = "http://".$_SERVER["HTTP_HOST"]."/imagenes/".Storage::disk('public')->put('',$request->file("imagen"));
      }

      if($request->file("portada")){
         if(isset($elemento['punto']['portada'])){
            $image = str_replace("http://".$_SERVER["HTTP_HOST"]."/imagenes/","",$elemento['punto']['portada']);
            Storage::disk('public')->delete($image);
         }
         $data['portada'] = "http://".$_SERVER["HTTP_HOST"]."/imagenes/".Storage::disk('public')->put('',$request->file("portada"));
      }
      $data['fotos'] = [];
      foreach ($request->file("imagenotras") as $imagen) {
         $foto = "http://".$_SERVER["HTTP_HOST"]."/imagenes/".Storage::disk('public')->put('',$imagen);
         array_push($data['fotos'],$foto);
      }
      Sportodos::request("puntos/editar/".$id,$data);
      return redirect('administrador/puntos/detalle/'.$id)->with("mensaje","Tu Recurso ha sido Actualizado con exito.");
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
      $data = Sportodos::request("puntos/detalle/".$id,$post);
      return $data;
   }
   public function getIdamplio($id){
      $post = [];
      $data = Sportodos::request("puntos/detalleamplio/".$id,$post);
      return $data;
   }


   public function getDeportes()
   {
        $post = [];
        $post['redsocial'] = '49';
        $data = Sportodos::request("deportes",$post);
        $deportes = (object)$data;
        return $deportes;
   }

   public function getServicios()
   {

        $post = [];
        $post['redsocial'] = '49';
        $servicios = Sportodos::request("servicios",$post);
        return $servicios;
   }

   public function getEspacios($punto)
   {
        $post = [];
        $post['punto'] = $punto;
        $espacios = Sportodos::request("espacio",$post);
        return $espacios;
   }

   public function getPaises()
   {
        $post = [];
        $post['redsocial'] = '49';
        $data = Sportodos::request("lugares/paises",$post);
        $paises = $data;
        return $paises;
   }

   


}
