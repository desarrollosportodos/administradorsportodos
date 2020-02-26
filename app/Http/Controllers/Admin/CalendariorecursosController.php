<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CalendariorecursosController extends Controller
{
   public function index(Request $request)
   {

      $data = $request->all();
      $fecha = date("Y-m-d");
      if(isset($data['fecha'])){
         $fecha = $data['fecha'];
      }
      $login = 'desarrollo01@togroow.com';
      $password = '123456';
      $url = 'http://api.sportodos.com/elementos/disponibilidad';
      $ch = curl_init();
      $post = [];
      $post['redsocial'] = '49';
      $post['tipo'] = '2';
      $post['fecha'] = $fecha;
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
      $usuarios = $this->getUsers();
      return view('admin.recursos.calendario', compact('listado','fecha','usuarios'));
   }

   public function getUsers(){
      $array = [];
      $login = 'desarrollo01@togroow.com';
      $password = '123456';
      $url = 'http://api.sportodos.com/usuarios/listado';
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
      foreach ($data as $key => $value) {
         $nombre = $value['user_names']." ".$value['user_lastnames']." - ".$value['registro_nombre'];
         $array[$value['user_id']] = html_entity_decode($nombre);
      }
      return $array;
   }

   public function reservar($id,Request $request){
      $data = $request->all();
     $array = [];
     foreach ($data['horas'] as $key => $hora) {
      $y = $hora." +30 minute";
      $horafin = date('H:i:s', strtotime( $y) );
         $array[$key] = [];
         $array[$key]['elemento'] = $id;
         $array[$key]['usuario'] = $data['usuario'];
         $array[$key]['fecha'] = $data['fecha'];
         $array[$key]['horainicio'] = $hora;
         $array[$key]['horafin'] = $horafin;
      }
      $login = 'desarrollo01@togroow.com';
      $password = '123456';
      $url = 'http://api.sportodos.com/elementos/reservar';
      $ch = curl_init();
      $post = http_build_query($array);
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
      curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
      curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      $result = curl_exec($ch);
      curl_close($ch);  
      echo $result;
   }


}
