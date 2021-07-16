<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servicios\Togroow;

/**
 *  @group Listado de Ciudades y Zonas
 *  clase para traer el listado de ciudades y de zonas dentro de sportodos
 */
class CiudadesController extends Controller
{
    /**
     * Funcion que trae el listado de ciudades consumiendo los servicios
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $post = [];
        $post['pais'] = '';
        if (isset($data['pais'])) {
            $pais = $data['pais'];
        }
        $data = Togroow::request("sportodos/lugares/paises/" . $pais . "/ciudades", $post);
        $listado = $data;
        return response()->json($listado)->header('Access-Control-Allow-Origin', '*');
    }
    /**
     * Funcion que trae el listado de zonas consumiendo los servicios
     *
     * @param Request $request
     * @return void
     */
    public function zonas(Request $request)
    {
        $data = $request->all();
        $post = [];
        $post['ciudad'] = '';
        if (isset($data['ciudad'])) {
            $post['ciudad'] = $data['ciudad'];
        }
        $data = Togroow::request("sportodos/lugares/ciudades/" . $data['ciudad'] . "/zonas", $post);
        $listado = $data;
        return response()->json($listado)->header('Access-Control-Allow-Origin', '*');
    }
}
