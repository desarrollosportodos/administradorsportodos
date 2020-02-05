<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeporteposicionController extends Controller
{
   public function index(){
         $login = 'desarrollo01@togroow.com';
        $password = '123456';
        $url = 'http://servicios.togroow.local/deporteposicion';
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
        $deportes = $this->getDeportes();
        return view('admin.deporteposicion.home',compact('listado','deportes'));
   }

   public function nuevo(){
        return view('admin.deporteposicion.crear');
   }
   public function crear(Request $request){
      $data = $request->all();
      $data['red'] = 49;
      $login = 'desarrollo01@togroow.com';
      $password = '123456';
      $url = 'http://servicios.togroow.local/deporteposicion/crear';
      $ch = curl_init();
      $post = $data;
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      $result = curl_exec($ch);
      return redirect('administrador/deporteposicion')->with("mensaje","Tu tipo de Espacio ha sido creado con exito.");
   }

   public function actualizar(Request $request,$id){
      $data = $request->all();
      $login = 'desarrollo01@togroow.com';
      $password = '123456';
      $url = 'http://servicios.togroow.local/deporteposicion/editar/'.$id;
      $ch = curl_init();
      $post = $data;
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      $result = curl_exec($ch);
      return redirect('administrador/deporteposicion')->with("mensaje","Tu tipo de Recurso ha sido Actualizado con exito.");
   }

   public function eliminar(Request $request,$id){
      echo $id;
      $data = $request->all();
      $login = 'desarrollo01@togroow.com';
      $password = '123456';
      $url = 'http://servicios.togroow.local/deporteposicion/eliminar/'.$id;
      $ch = curl_init();
      $post = $data;
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      $result = curl_exec($ch);
      return redirect('administrador/deporteposicion')->with("mensaje","Tu tipo de Recurso ha sido Actualizado con exito.");
   }

   public function getDeportes()
   {
      $login = 'desarrollo01@togroow.com';
        $password = '123456';
        $url = 'http://servicios.togroow.local/deportes';
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
        $datos = (object)$data;
        $deportes = [];
        foreach ($datos as  $value) {
            $deportes[$value['id']] = $value['nombre'];
        }
        return $deportes;
   }

}
