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
        $datos = [];
        $datos['email'] = $post['email'];
        $datos['password'] = $post['password'];
        //print_r($datos);
        $data = Togroow::request("usuarios/login",$datos,1);
        if(isset($data['access_token'])){
            /*echo "<pre>";
            print_r($data);*/
            Session::put('usuario',(object)$data['usuario']);
            Session::put('access_token',$data['access_token']);
            return  redirect('/administrador');
        } else {
            $error ="ha ocurriod un error intente mas tarde";
            if(isset($data['error'])){
                $error = $data['error'];
            } else if(isset($data['message'])){
                $error = $data['message'];
            }
            return redirect('/administrador/login')->with("mensaje",$error);
        }
        
    }

    public function logout(){
        Session::forget('usuario');
        Session::forget('access_token');
        return  redirect('/administrador/login');
    }
}
