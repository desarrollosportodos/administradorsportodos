<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeportebarreraController extends Controller
{
   public function index(){
         $login = 'desarrollo01@togroow.com';
        $password = '123456';
        $url = 'http://api.sportodos.com/deportebarrera';
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
        return view('admin.deportebarrera.home',compact('listado','tipos'));
   }

   public function nuevo(){
        return view('admin.deportebarrera.crear');
   }
   public function crear(Request $request){
      $data = $request->all();
      $data['red'] = 49;
      $login = 'desarrollo01@togroow.com';
      $password = '123456';
      $url = 'http://api.sportodos.com/deportebarrera/crear';
      $ch = curl_init();
      $post = $data;
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      $result = curl_exec($ch);
      return redirect('administrador/deportebarrera')->with("mensaje","Tu tipo de Espacio ha sido creado con exito.");
   }

   public function actualizar(Request $request,$id){
      $data = $request->all();
      $login = 'desarrollo01@togroow.com';
      $password = '123456';
      $url = 'http://api.sportodos.com/deportebarrera/editar/'.$id;
      $ch = curl_init();
      $post = $data;
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      $result = curl_exec($ch);
      return redirect('administrador/deportebarrera')->with("mensaje","Tu tipo de Recurso ha sido Actualizado con exito.");
   }

   public function eliminar(Request $request,$id){
      echo $id;
      $data = $request->all();
      $login = 'desarrollo01@togroow.com';
      $password = '123456';
      $url = 'http://api.sportodos.com/deportebarrera/eliminar/'.$id;
      $ch = curl_init();
      $post = $data;
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      $result = curl_exec($ch);
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
