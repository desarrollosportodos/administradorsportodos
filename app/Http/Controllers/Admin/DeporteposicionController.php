<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servicios\Togroow;

class DeporteposicionController extends Controller
{
   public function index(){
        $post = [];
        $post['redsocial'] = '49';
        $deportes = $this->getDeportes();
        $listado = Togroow::request("sportodos/deporteposicion",$post);
        /*echo "<pre>";
        print_r($listado);*/
        return view('admin.deporteposicion.home',compact('listado','deportes'));
   }

   public function nuevo(){
        return view('admin.deporteposicion.crear');
   }
   public function crear(Request $request){
      $data = $request->all();
      $data['red'] = 49;
      $post = $data;
      Togroow::request("sportodos/deporteposicion/crear",$post,1);
      return redirect('administrador/deporteposicion')->with("mensaje","Tu tipo de Espacio ha sido creado con exito.");
   }

   public function actualizar(Request $request,$id){
      $data = $request->all();
      $post = $data;
      Togroow::request("sportodos/deporteposicion/".$id."/editar",$post,3);
      return redirect('administrador/deporteposicion')->with("mensaje","Tu tipo de Recurso ha sido Actualizado con exito.");
   }

   public function eliminar(Request $request,$id){
      $data = $request->all();
      $post = $data;
      Togroow::request("sportodos/deporteposicion/".$id."/eliminar",$post,2);
      return redirect('administrador/deporteposicion')->with("mensaje","Tu tipo de Recurso ha sido Actualizado con exito.");
   }

   public function getDeportes()
   {
        $post = [];
        $post['redsocial'] = '49';
        $datos = Togroow::request("sportodos/deportes",$post);;
        $deportes = [];
        foreach ($datos as  $value) {
            $deportes[$value['id']] = $value['nombre'];
        }
        return $deportes;
   }

}
