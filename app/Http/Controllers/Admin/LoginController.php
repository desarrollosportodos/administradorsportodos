<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Servicios\Togroow;
use Redirect;
use Session;
/**
 * @group Gestion de Login y Logout
 * clase que permita la gestion de los diferentes espacios deportivos lista, crea , edita y elimina
 */
class LoginController extends Controller
{
    /**
     * Vista de ingreso al sistema
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme.lte.login');
    }
   
    /**
     * Funcion para hacer Login
     * envia al servicio el usuario y la contraseña para su validacion y hace el respectivo login en caso de ser correcto
     *
     * @param Request $request
     * @bodyParam email
     * @bodyParam password
     * @return void
     */
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

    /**
     * Funcion pra cerrar la sesion en el sistema
     *
     * @return void
     */
    public function logout(){
        Session::forget('usuario');
        Session::forget('access_token');
        return  redirect('/administrador/login');
    }
}
