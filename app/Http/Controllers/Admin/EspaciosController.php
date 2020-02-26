<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Servicios\Sportodos;

class EspaciosController extends Controller
{
   public function index()
   {
      $post = [];
      $post['redsocial'] = '49';
      $listado = Sportodos::request("espacios",$post);
      $deportes = $this->getDeportes();
      return view('admin.espacios.home', compact('listado','deporte'));
   }

   public function nuevo()
   {
      $deportes = $this->getDeportes();
      $paises = $this->getPaises();
      $servicios = $this->getServicios();
      return view('admin.espacios.crear', compact('deportes','paises','servicios'));
   }

   public function crear(Request $request)
   {
      $data = $request->all();
      $data['redsocial'] = 49;
      if($request->file("imagen")){
         $data['foto'] = "http://".$_SERVER["HTTP_HOST"]."/imagenes/".Storage::disk('public')->put('',$request->file("imagen"));
      }
      $post = $data;
      $data = Sportodos::request("espacios/crear",$post);
      return redirect('administrador/espacios')->with("mensaje","Tu tipo de Recurso ha sido creado con exito.");
   }

   public function editar($id)
   {
      $data = $this->getId($id); 
      $deportes = $this->getDeportes();
      $paises = $this->getPaises();
      $servicios = $this->getServicios();
      return view('admin.espacios.editar', compact('deportes','data','paises','servicios'));
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
      Sportodos::request("espacios/editar/".$id,$data);
      return redirect('administrador/espacios')->with("mensaje","Tu Recurso ha sido Actualizado con exito.");
   }

   public function eliminar(Request $request,$id){
      $elemento = $this->getId($id); 
      if(isset($elemento['imagen']) ){
         $image = str_replace("http://".$_SERVER["HTTP_HOST"]."/imagenes/","",$elemento['imagen']);
         Storage::disk('public')->delete($image);
      }
      $data = $request->all();

      Sportodos::request("espacios/eliminar",$data);
      return redirect('administrador/espacios')->with("mensaje","Tu Recurso ha sido Eliminado con exito.");
   }

   public function getId($id){
      $post = [];
      $data = Sportodos::request("espacios/detalle/".$id,$post);
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
        $data = Sportodos::request("espaciosservicios",$post);
        $servicios = (object)$data;
        return $servicios;
   }

   public function getPaises()
   {
        $post = [];
        $post['redsocial'] = '49';
        $data = Sportodos::request("espacios/lugares/paises",$post);
        $paises = (object)$data;
        return $paises;
   }

   


}
