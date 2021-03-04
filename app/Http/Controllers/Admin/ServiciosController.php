<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servicios\Togroow;

class ServiciosController extends Controller
{
   public function index(){
        $post = [];
        $post['redsocial'] = '49';
        $listado = Togroow::request("sportodos/servicios/listado",$post);
        return view('admin.servicios.home',compact('listado'));
   }

   public function nuevo(){
        return view('admin.servicios.crear');
   }
   public function crear(Request $request){
      $data = $request->all();
      $data['red'] = 49;
      $post = $data;
      Togroow::request("sportodos/servicios/crear",$post,1);
      return redirect('administrador/servicios')->with("mensaje","Tu tipo de Recurso ha sido creado con exito.");
   }

   public function actualizar(Request $request,$id){
      $data = $request->all();
      $post = $data;
      Togroow::request("sportodos/servicios/".$id."/editar",$post,3);
      return redirect('administrador/servicios')->with("mensaje","Tu tipo de Recurso ha sido Actualizado con exito.");
   }

   public function eliminar(Request $request,$id){
      $data = $request->all();
      $post = $data;
      Togroow::request("sportodos/servicios/".$id."/eliminar",$post,2);
      return redirect('administrador/servicios')->with("mensaje","Tu tipo de Recurso ha sido Actualizado con exito.");
   }

}
