<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Servicios\Sportodos;

class EspacioController extends Controller
{
  
    

   public function nuevo(Request $request)
   {
    $data = $request->all();
      $deportes = $this->getDeportes();
      $post = [];
      $punto = Sportodos::request("puntos/detalle/".$data['punto'],$post);
      return view('admin.espacio.crear', compact('deportes','punto'));
   }

   public function crear(Request $request)
   {
      $data = $request->all();
      if($request->file("imagen")){
         $data['foto'] = "http://".$_SERVER["HTTP_HOST"]."/imagenes/".Storage::disk('public')->put('',$request->file("imagen"));
      }
      $punto = $data['punto'];
      $post = $data;
      $data = Sportodos::request("espacio/crear",$post);
      return redirect('/administrador/puntos/detalle/'.$punto)->with("mensaje","Tu espacio ha sido creado con exito.");
   }

   public function editar($id)
   {
      $data = $this->getId($id); 
      $deportes = $this->getDeportes();
      return view('admin.espacio.editar', compact('deportes','data'));
   }

   public function detalle($id)
   {
      $data = $this->getIdamplio($id); 
      return view('admin.espacio.detalle', compact('data'));
   }

   public function actualizar(Request $request,$id)
   {
      $elemento = $this->getId($id); 
      $data = $request->all();
      if($request->file("imagen")){
         if(isset($elemento['foto'])){
            $image = str_replace("http://".$_SERVER["HTTP_HOST"]."/imagenes/","",$elemento['foto']);
            Storage::disk('public')->delete($image);
         }
         $data['foto'] = "http://".$_SERVER["HTTP_HOST"]."/imagenes/".Storage::disk('public')->put('',$request->file("imagen"));
      }
      $punto = $data['punto'];
      Sportodos::request("espacio/editar/".$id,$data);
      return redirect('/administrador/puntos/detalle/'.$punto)->with("mensaje","Tu espacio ha sido creado con exito.");
   }

   public function eliminar(Request $request,$id){
      $elemento = $this->getId($id); 
      if(isset($elemento['imagen']) ){
         $image = str_replace("http://".$_SERVER["HTTP_HOST"]."/imagenes/","",$elemento['imagen']);
         Storage::disk('public')->delete($image);
      }
      $data = $request->all();

      Sportodos::request("espacio/eliminar",$data);
      return redirect('administrador/espacio')->with("mensaje","Tu Recurso ha sido Eliminado con exito.");
   }

   public function getId($id){
      $post = [];
      $data = Sportodos::request("espacio/detalle/".$id,$post);
      return $data;
   }
   public function getIdamplio($id){
      $post = [];
      $data = Sportodos::request("espacio/detalleamplio/".$id,$post);
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

   public function getPaises()
   {
        $post = [];
        $post['redsocial'] = '49';
        $data = Sportodos::request("lugares/paises",$post);
        $paises = $data;
        return $paises;
   }

   


}
