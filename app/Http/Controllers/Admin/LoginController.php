<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Servicios\Togroow;
use Redirect;
use Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme.lte.login');
    }
   
    public function login(Request $request)
    {
        $post = $request->all();
        $data = Togroow::request("usuarios/login",$post,1);
        if(isset($data['access_token'])){
            /*echo "<pre>";
            print_r($data);*/
            Session::put('usuario',(object)$data['usuario']);
            Session::put('access_token',$data['access_token']);
            return  redirect('/administrador');
        } else {
            return redirect('/administrador/login')->with("mensaje",$data['error']);
        }
        
    }

    public function logout(){
        Session::forget('usuario');
        return  redirect('/administrador/login');
    }
}
