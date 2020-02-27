<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $asideactual = 1;
        return view('admin.home.home',compact("asideactual"));
    }
}
