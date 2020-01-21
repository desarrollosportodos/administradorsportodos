<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        $login = 'desarrollo01@togroow.com';
        $password = '123456';
        $url = 'http://servicios.togroow.local/usuarios/autenticar';
        $ch = curl_init();
        $post = $request->all();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $result = curl_exec($ch);
        echo $result;
        curl_close($ch);  
        $data = json_decode($result, true);
        if($data['estado'] == 1){
            Session::put('usuario',(object)$data['usuario']);
            return Redirect::intended('/administrador');
        }
        
    }

    public function logout(){
        Session::forget('usuario');
        return Redirect::route('login');
    }
}
