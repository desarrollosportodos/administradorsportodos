<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servicios\Sportodos;

class CiudadesController extends Controller
{
   public function index(Request $request){
        $data = $request->all();
        $post = [];
        $post['pais'] = '';
        if(isset($data['pais']) ){
            $post['pais'] = $data['pais'];
        }
        $data = Sportodos::request("/lugares/ciudades",$post);
        $listado = (object)$data;
        return response()->json($listado)->header('Access-Control-Allow-Origin', '*');
   }
   public function zonas(Request $request){
    $data = $request->all();
    $post = [];
    $post['ciudad'] = '';
    if(isset($data['ciudad']) ){
        $post['ciudad'] = $data['ciudad'];
    }
    $data = Sportodos::request("/lugares/zonas",$post);
    $listado = (object)$data;
    return response()->json($listado)->header('Access-Control-Allow-Origin', '*');
}

   
}
