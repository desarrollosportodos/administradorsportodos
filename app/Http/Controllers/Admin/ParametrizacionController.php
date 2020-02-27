<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParametrizacionController extends Controller
{
    public function index()
    { 
        $asideactual = 4;
        return view('admin.parametrizacion.index',compact('asideactual'));
    }
}
