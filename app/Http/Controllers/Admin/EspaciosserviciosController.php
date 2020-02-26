<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servicios\Sportodos;

class EspaciosserviciosController extends Controller
{
   public function index(){
        $post = [];
        $post['redsocial'] = '49';
        $listado = Sportodos::request("espaciosservicios",$post);
        return view('admin.espaciosservicios.home',compact('listado','tipos'));
   }

   public function nuevo(){
        return view('admin.espaciosservicios.crear');
   }
   public function crear(Request $request){
      $data = $request->all();
      $data['red'] = 49;
      $post = $data;
      Sportodos::request("espaciosservicios/crear",$post);
      return redirect('administrador/espaciosservicios')->with("mensaje","Tu tipo de Recurso ha sido creado con exito.");
   }

   public function actualizar(Request $request,$id){
      $data = $request->all();
      $post = $data;
      Sportodos::request("espaciosservicios/editar/".$id,$post);
      return redirect('administrador/espaciosservicios')->with("mensaje","Tu tipo de Recurso ha sido Actualizado con exito.");
   }

   public function eliminar(Request $request,$id){
      $data = $request->all();
      $post = $data;
      Sportodos::request("espaciosservicios/eliminar/".$id,$post);
      return redirect('administrador/espaciosservicios')->with("mensaje","Tu tipo de Recurso ha sido Actualizado con exito.");
   }

}
