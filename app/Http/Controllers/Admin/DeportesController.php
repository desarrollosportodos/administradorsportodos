<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servicios\Sportodos;

class DeportesController extends Controller
{
   public function index(){
        $post = [];
        $post['redsocial'] = '49';
        $listado = Sportodos::request("deportes",$post);
        return view('admin.deportes.home',compact('listado','tipos'));
   }

   public function nuevo(){
        return view('admin.deportes.crear');
   }
   public function crear(Request $request){
      $data = $request->all();
      $data['red'] = 49;
      $post = $data;
      Sportodos::request("deportes/crear",$post);
      return redirect('administrador/deportes')->with("mensaje","Tu tipo de Recurso ha sido creado con exito.");
   }

   public function actualizar(Request $request,$id){
      $data = $request->all();
      $post = $data;
      Sportodos::request("deportes/editar/".$id,$post);
      return redirect('administrador/deportes')->with("mensaje","Tu tipo de Recurso ha sido Actualizado con exito.");
   }

   public function eliminar(Request $request,$id){
      $data = $request->all();
      $post = $data;
      Sportodos::request("deportes/eliminar/".$id,$post);
      return redirect('administrador/deportes')->with("mensaje","Tu tipo de Recurso ha sido Actualizado con exito.");
   }

}
