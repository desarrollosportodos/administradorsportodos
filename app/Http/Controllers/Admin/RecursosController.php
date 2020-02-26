<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecursosController extends Controller
{
   public function index()
   {
      $login = 'desarrollo01@togroow.com';
      $password = '123456';
      $url = 'http://api.sportodos.com/elementos';
      $ch = curl_init();
      $post = [];
      $post['redsocial'] = '49';
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      $result = curl_exec($ch);
      curl_close($ch);  
      $data = json_decode($result,JSON_UNESCAPED_UNICODE);
      $listado = (object)$data;
      $tipos = $this->getTipos();
      return view('admin.recursos.home', compact('listado','tipos'));
   }

   public function nuevo()
   {
      $tipos = $this->getTipos();
      return view('admin.recursos.crear', compact('tipos'));
   }

   public function crear(Request $request)
   {
      $data = $request->all();
      $data['red'] = 49;
      if($request->file("imagen")){
         $data['imagen'] = "http://".$_SERVER["HTTP_HOST"]."/imagenes/".Storage::disk('public')->put('',$request->file("imagen"));
      }
      $login = 'desarrollo01@togroow.com';
      $password = '123456';
      $url = 'http://api.sportodos.com/elementos/crear';
      $ch = curl_init();
      $post = $data;
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      $result = curl_exec($ch);
      
      return redirect('administrador/recursos/gestion')->with("mensaje","Tu tipo de Recurso ha sido creado con exito.");
   }

   public function editar($id)
   {
      $data = $this->getId($id); 
      $tipos = $this->getTipos();
      return view('admin.recursos.editar', compact('tipos','data'));
   }

   public function actualizar(Request $request,$id)
   {
      $elemento = $this->getId($id); 
      $data = $request->all();
      if($request->file("imagen")){
         if($elemento['imagen']){
            $image = str_replace("http://".$_SERVER["HTTP_HOST"]."/imagenes/","",$elemento['imagen']);
            Storage::disk('public')->delete($image);
         }
         $data['imagen'] = "http://".$_SERVER["HTTP_HOST"]."/imagenes/".Storage::disk('public')->put('',$request->file("imagen"));
      }
      $login = 'desarrollo01@togroow.com';
      $password = '123456';
      $url = 'http://api.sportodos.com/elementos/editar/'.$id;
      $ch = curl_init();
      $post = $data;
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      $result = curl_exec($ch);
      return redirect('administrador/recursos/gestion')->with("mensaje","Tu Recurso ha sido Actualizado con exito.");
   }

   public function eliminar(Request $request,$id){
      $elemento = $this->getId($id); 
      if($elemento['imagen']){
         $image = str_replace("http://".$_SERVER["HTTP_HOST"]."/imagenes/","",$elemento['imagen']);
         Storage::disk('public')->delete($image);
      }
      $data = $request->all();
      $login = 'desarrollo01@togroow.com';
      $password = '123456';
      $url = 'http://api.sportodos.com/elementos/eliminar/'.$id;
      $ch = curl_init();
      $post = $data;
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      $result = curl_exec($ch);
      return redirect('administrador/recursos/gestion')->with("mensaje","Tu Recurso ha sido Eliminado con exito.");
   }

   public function getId($id){
      $login = 'desarrollo01@togroow.com';
      $password = '123456';
      $url = 'http://api.sportodos.com/elementos/detalle/'.$id;
      $ch = curl_init();
      $post = [];
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      $result = curl_exec($ch);
      $data = json_decode($result, JSON_UNESCAPED_UNICODE);
      return $data;
   }


   public function getTipos()
   {
      $login = 'desarrollo01@togroow.com';
      $password = '123456';
      $url = 'http://api.sportodos.com/tipoelementos';
      $ch = curl_init();
      $post = [];
      $post['redsocial'] = '49';
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      $result = curl_exec($ch);
      curl_close($ch);
      $data = json_decode($result, JSON_UNESCAPED_UNICODE);
      $listado = (object) $data;
      return $listado;
   }

   public function calendario(){
      $fecha = date("Y-m-d");
      return view('admin.recursos.calendario',compact('fecha'));
   }
}
