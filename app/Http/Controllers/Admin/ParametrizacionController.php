<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @group Vista parametrizacion
 * esta seccion se utiliza para mostrar la vista con los botones de parametrizacion
 */
class ParametrizacionController extends Controller
{
    /**
     * Vista de parametizacion
     *
     * @return void
     */
    public function index()
    { 
        $asideactual = 4;
        return view('admin.parametrizacion.index',compact('asideactual'));
    }
}
