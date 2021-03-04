<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servicios\Togroow;

class DeportesController extends Controller
{
   public function index(){
        $post = [];
        $listado = Togroow::request("sportodos/deportes",[],0);
        //echo "<pre>";
        //print_r($listado);
        return view('admin.deportes.home',compact('listado'));
   }

   public function nuevo(){
        return view('admin.deportes.crear');
   }
   public function crear(Request $request){
      $data = $request->all();
      $data['red'] = 49;
      $post = $data;
      Togroow::request("sportodos/deportes/crear",$post,1);
      return redirect('administrador/deportes')->with("mensaje","Tu deporte ha sido creado con exito.");
   }

   public function actualizar(Request $request,$id){
      $data = $request->all();
      $post = $data;
      Togroow::request("sportodos/deportes/".$id."/editar",$post,3);
      return redirect('administrador/deportes')->with("mensaje","Tu deporte ha sido Actualizado con exito.");
   }

   public function eliminar(Request $request,$id){
      $data = $request->all();
      $post = [];
      Togroow::request("sportodos/deportes/".$id."/eliminar",$post,2);
      return redirect('administrador/deportes')->with("mensaje","Tu deporte ha sido Eliminado con exito.");
   }

}
