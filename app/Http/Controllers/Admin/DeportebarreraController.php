<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servicios\Togroow;

class DeportebarreraController extends Controller
{
   public function index(){
        $post = [];
        $post['redsocial'] = '49';
        $listado =  Togroow::request("sportodos/deportebarrera",$post);
        $tipos = $this->getTipos();
        return view('admin.deportebarrera.home',compact('listado','tipos'));
   }

   public function nuevo(){
        return view('admin.deportebarrera.crear');
   }
   public function crear(Request $request){
      $data = $request->all();
      $data['red'] = 49;
      $post = $data;
      Togroow::request("sportodos/deportebarrera/crear",$post,1);
      return redirect('administrador/deportebarrera')->with("mensaje","Tu tipo de Espacio ha sido creado con exito.");
   }

   public function actualizar(Request $request,$id){
      $data = $request->all();
      $post = $data;
      Togroow::request("sportodos/deportebarrera/".$id."/editar",$post,3);
      return redirect('administrador/deportebarrera')->with("mensaje","Tu tipo de Recurso ha sido Actualizado con exito.");
   }

   public function eliminar(Request $request,$id){
      $data = $request->all();
      $post = $data;
      Togroow::request("sportodos/deportebarrera/".$id."/eliminar",$post,2);
      return redirect('administrador/deportebarrera')->with("mensaje","Tu tipo de Recurso ha sido Actualizado con exito.");
   }

   public function getTipos()
   {
        $tipos = [];
        $tipos[1] = "Fisico";
        $tipos[2] = "Ambiental";
        return $tipos;
   }

}
