<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TiposrecursosController extends Controller
{
   public function index(){
         $login = 'desarrollo01@togroow.com';
        $password = '123456';
        $url = 'http://api.sportodos.com/tipoelementos';
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
        return view('admin.tipoelementos.home',compact('listado','tipos'));
   }

   public function nuevo(){
        return view('admin.tipoelementos.crear');
   }
   public function crear(Request $request){
      $data = $request->all();
      $data['red'] = 49;
      $login = 'desarrollo01@togroow.com';
      $password = '123456';
      $url = 'http://api.sportodos.com/tipoelementos/crear';
      $ch = curl_init();
      $post = $data;
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      $result = curl_exec($ch);
      return redirect('administrador/recursos/tipos')->with("mensaje","Tu tipo de Recurso ha sido creado con exito.");
   }

   public function actualizar(Request $request,$id){
      $data = $request->all();
      $login = 'desarrollo01@togroow.com';
      $password = '123456';
      $url = 'http://api.sportodos.com/tipoelementos/editar/'.$id;
      $ch = curl_init();
      $post = $data;
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      $result = curl_exec($ch);
      return redirect('administrador/recursos/tipos')->with("mensaje","Tu tipo de Recurso ha sido Actualizado con exito.");
   }

   public function eliminar(Request $request,$id){
      echo $id;
      $data = $request->all();
      $login = 'desarrollo01@togroow.com';
      $password = '123456';
      $url = 'http://api.sportodos.com/tipoelementos/eliminar/'.$id;
      $ch = curl_init();
      $post = $data;
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      $result = curl_exec($ch);
      return redirect('administrador/recursos/tipos')->with("mensaje","Tu tipo de Recurso ha sido Actualizado con exito.");
   }



   public function getTipos(){
      $data = [];
      $data[1] = "Espacio";
      $data[2] = "Recurso Agendable";
      $data[3] = "Recurso Fisico";
      return $data;
   }
}
