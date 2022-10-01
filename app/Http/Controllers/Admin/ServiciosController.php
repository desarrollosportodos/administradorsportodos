<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servicios\Apiservice;
/**
 * @group Gestion de Servicios
 * clase que permita la gestion de los diferentes servicios lista, crea , edita y elimina
 */
class ServiciosController extends Controller
{
   /**
    * Vista con el listado de servicios disponibles
    *
    * @return void
    */
   public function index(){
        $post = [];
        $post['redsocial'] = '49';
        $listado = Apiservice::request("sportodos/servicios/listado",$post);
        return view('admin.servicios.home',compact('listado'));
   }

   /**
    * Formulario para crear un nuevo servicio
    *
    * @return void
    */
   public function nuevo(){
        return view('admin.servicios.crear');
   }
   /**
    * Funcion que llama el servicio de crear un servicio
    *
    * @param Request $request
    * @return void
    */
   public function crear(Request $request){
      $data = $request->all();
      $data['red'] = 49;
      $post = $data;
      Apiservice::request("sportodos/servicios/crear",$post,1);
      return redirect('administrador/servicios')->with("mensaje","Tu tipo de Recurso ha sido creado con exito.");
   }

   /**
    * Funcion que llama a editar un servicio
    *
    * @param Request $request
    * @param [type] $id identificador del servicio en el sistema
    * @bodyParam  id int required identificador del servicio en el sistema
    * @return void
    */
   public function actualizar(Request $request,$id){
      $data = $request->all();
      $post = $data;
      Apiservice::request("sportodos/servicios/".$id."/editar",$post,3);
      return redirect('administrador/servicios')->with("mensaje","Tu tipo de Recurso ha sido Actualizado con exito.");
   }

   /**
    * Funcion que llama el servicio de eliminar
    *
    * @param Request $request
    * @param [type] $id identificador del servicio en el sistema
    * @bodyParam  id int required identificador del servicio en el sistema
    * @return void
    */
   public function eliminar(Request $request,$id){
      $data = $request->all();
      $post = $data;
      Apiservice::request("sportodos/servicios/".$id."/eliminar",$post,2);
      return redirect('administrador/servicios')->with("mensaje","Tu tipo de Recurso ha sido Actualizado con exito.");
   }

}
