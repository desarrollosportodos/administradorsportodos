<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servicios\Sportodos;

class DeportebarreraController extends Controller
{
   public function index(){
        $post = [];
        $post['redsocial'] = '49';
        $listado =  Sportodos::request("deportebarrera",$post);
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
      Sportodos::request("deportebarrera/crear",$post);
      return redirect('administrador/deportebarrera')->with("mensaje","Tu tipo de Espacio ha sido creado con exito.");
   }

   public function actualizar(Request $request,$id){
      $data = $request->all();
      $post = $data;
      Sportodos::request("deportebarrera/editar/".$id,$post);
      return redirect('administrador/deportebarrera')->with("mensaje","Tu tipo de Recurso ha sido Actualizado con exito.");
   }

   public function eliminar(Request $request,$id){
      $data = $request->all();
      $post = $data;
      Sportodos::request("deportebarrera/eliminar/".$id,$post);
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
