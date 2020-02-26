<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servicios\Sportodos;

class DeporteposicionController extends Controller
{
   public function index(){
        $post = [];
        $post['redsocial'] = '49';
        $deportes = $this->getDeportes();
        $listado = Sportodos::request("deporteposicion",$post);
        return view('admin.deporteposicion.home',compact('listado','deportes'));
   }

   public function nuevo(){
        return view('admin.deporteposicion.crear');
   }
   public function crear(Request $request){
      $data = $request->all();
      $data['red'] = 49;
      $post = $data;
      Sportodos::request("deporteposicion/crear",$post);
      return redirect('administrador/deporteposicion')->with("mensaje","Tu tipo de Espacio ha sido creado con exito.");
   }

   public function actualizar(Request $request,$id){
      $data = $request->all();
      $post = $data;
      Sportodos::request("deporteposicion/editar/".$id,$post);
      return redirect('administrador/deporteposicion')->with("mensaje","Tu tipo de Recurso ha sido Actualizado con exito.");
   }

   public function eliminar(Request $request,$id){
      $data = $request->all();
      $post = $data;
      Sportodos::request("deporteposicion/eliminar/".$id,$post);
      return redirect('administrador/deporteposicion')->with("mensaje","Tu tipo de Recurso ha sido Actualizado con exito.");
   }

   public function getDeportes()
   {
        $post = [];
        $post['redsocial'] = '49';
        $datos = Sportodos::request("deportes",$post);;
        $deportes = [];
        foreach ($datos as  $value) {
            $deportes[$value['id']] = $value['nombre'];
        }
        return $deportes;
   }

}
