<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Servicios\Togroow;


class EspacioController extends Controller
{
  
    

   public function nuevo(Request $request)
   {
      $data = $request->all();
      $deportes = $this->getDeportes();
      $post = [];
      $punto =Togroow::request("sportodos/puntos/".$data['punto']."/detalle",$post);
      return view('admin.espacio.crear', compact('deportes','punto'));
   }

   public function crear(Request $request)
   {
      $data = $request->all();
      $post = $data;
      if($request->file("imagen")){
         $post['foto'] = curl_file_create($_FILES['imagen']['tmp_name'], $_FILES['imagen']['type'], $_FILES['imagen']['name']);
      }
      $punto = $data['punto'];
     
      $res = Togroow::request("sportodos/espacios/crear",$post,1);
      //return redirect('/administrador/puntos/detalle/'.$punto)->with("mensaje","Tu espacio ha sido creado con exito.");
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
      //$elemento = $this->getId($id); 
      $data = $request->all();
      $post = $data;
      if($request->file("imagen")){
         $post['foto'] = curl_file_create($_FILES['imagen']['tmp_name'], $_FILES['imagen']['type'], $_FILES['imagen']['name']);
      }
      $punto = $data['punto'];
      $res = Togroow::request("sportodos/espacios/".$id."/editar",$post,3);
      return redirect('/administrador/puntos/detalle/'.$punto)->with("mensaje","Tu espacio ha sido editado con exito.");
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
      $data =  Togroow::request("sportodos/espacios/".$id."/detalle",$post);
      return $data;
   }
   public function getIdamplio($id){
      $post = [];
      $data =  Togroow::request("sportodos/espacios/".$id."/detalle",$post);
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


   


}
