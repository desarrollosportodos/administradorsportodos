<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CiudadesController extends Controller
{
   public function index(Request $request){
        $data = $request->all();
        $login = 'desarrollo01@togroow.com';
        $password = '123456';
        $url = 'http://servicios.togroow.local/lugares/ciudades';
        $ch = curl_init();
        $post = [];
        $post['pais'] = '';
        if(isset($data['pais']) ){
            $post['pais'] = $data['pais'];
        }
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
        return response()->json($listado)->header('Access-Control-Allow-Origin', '*');
   }
   public function zonas(Request $request){
    $data = $request->all();
    $login = 'desarrollo01@togroow.com';
    $password = '123456';
    $url = 'http://servicios.togroow.local/lugares/zonas';
    $ch = curl_init();
    $post = [];
    $post['ciudad'] = '';
    if(isset($data['ciudad']) ){
        $post['ciudad'] = $data['ciudad'];
    }
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
    return response()->json($listado)->header('Access-Control-Allow-Origin', '*');
}

   
}
