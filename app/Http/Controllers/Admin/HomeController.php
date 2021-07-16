<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/**
 * @group Home sistema
 * clase que muestra el home del sistema
 */
class HomeController extends Controller
{
    /**
     * Vista de las opciones de home en el sistema
     *
     * @return void
     */
    public function index()
    {
        $asideactual = 1;
        return view('admin.home.home',compact("asideactual"));
    }
}
