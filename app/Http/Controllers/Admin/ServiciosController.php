<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servicios\Sportodos;

class ServiciosController extends Controller
{
   public function index(){
        $post = [];
        $post['redsocial'] = '49';
        $listado = Sportodos::request("servicios",$post);
        return view('admin.servicios.home',compact('listado','tipos'));
   }

   public function nuevo(){
        return view('admin.servicios.crear');
   }
   public function crear(Request $request){
      $data = $request->all();
      $data['red'] = 49;
      $post = $data;
      Sportodos::request("servicios/crear",$post);
      return redirect('administrador/servicios')->with("mensaje","Tu tipo de Recurso ha sido creado con exito.");
   }

   public function actualizar(Request $request,$id){
      $data = $request->all();
      $post = $data;
      Sportodos::request("servicios/editar/".$id,$post);
      return redirect('administrador/servicios')->with("mensaje","Tu tipo de Recurso ha sido Actualizado con exito.");
   }

   public function eliminar(Request $request,$id){
      $data = $request->all();
      $post = $data;
      Sportodos::request("servicios/eliminar/".$id,$post);
      return redirect('administrador/servicios')->with("mensaje","Tu tipo de Recurso ha sido Actualizado con exito.");
   }

}
