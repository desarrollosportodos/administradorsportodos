<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servicios\Apiservice;

class EspaciostipoController extends Controller
{
   public function index(){
        $post = [];
        $post['redsocial'] = '49';
        $listado = Apiservice::request("espaciostipos",$post);
        return view('admin.espaciostipos.home',compact('listado','tipos'));
   }

   public function nuevo(){
        return view('admin.espaciostipos.crear');
   }
   public function crear(Request $request){
      $data = $request->all();
      $data['red'] = 49;
      $post = $data;     
      Apiservice::request("espaciostipos/crear/",$post);
      return redirect('administrador/espaciostipos')->with("mensaje","Tu tipo de Espacio ha sido creado con exito.");
   }

   public function actualizar(Request $request,$id){
      $data = $request->all();
      $post = $data;
      Apiservice::request("espaciostipos/editar/".$id,$post);
      return redirect('administrador/espaciostipos')->with("mensaje","Tu tipo de Recurso ha sido Actualizado con exito.");
   }

   public function eliminar(Request $request,$id){
      $data = $request->all();
      $post = $data;
      Apiservice::request("espaciostipos/eliminar/".$id,$post);
      return redirect('administrador/espaciostipos')->with("mensaje","Tu tipo de Recurso ha sido Actualizado con exito.");
   }

}
