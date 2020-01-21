<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Concat;

class ClientesController extends Controller
{
    public function index()
    {
        $login = 'desarrollo01@togroow.com';
        $password = '123456';
        $url = 'http://servicios.togroow.local/clientes';
        $ch = curl_init();
        $post = [];
        $post['redsocial'] = '49';
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $result = curl_exec($ch);
        curl_close($ch);  
        $data = json_decode($result,JSON_UNESCAPED_UNICODE);
        $clientes = (object)$data;
        return view('admin.clientes.home',compact("clientes"));
    }

    public function nuevo()
    {
        $categorias = $this->getCategorias();
        return view('admin.clientes.nuevo',compact('categorias'));
    }

    public function nuevocliente(Request $request)
    {

        $login = 'desarrollo01@togroow.com';
        $password = '123456';
        $url = 'http://servicios.togroow.local/clientes/nuevo';
        $ch = curl_init();
        $post = $request->all();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $result = curl_exec($ch);
        return redirect('administrador/clientes')->with("mensaje","Tu cliente ha sido creado con exito.");
        //$data = json_decode($result,JSON_UNESCAPED_UNICODE);
    }

    public function getCategorias($tipo = NULL){
        $login = 'desarrollo01@togroow.com';
        $password = '123456';
        $url = 'http://servicios.togroow.local/categoriasnegocio';
        $ch = curl_init();
        $post = [];
        //$post['redsocial'] = '49';
        $post['tipo'] = $tipo;
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $result = curl_exec($ch);
        curl_close($ch);  
        $data = json_decode($result,JSON_UNESCAPED_UNICODE);
        return $data;
    }

    public function detalle($id){
        $login = 'desarrollo01@togroow.com';
        $password = '123456';
        $url = 'http://servicios.togroow.local/clientes/detalle/'.$id;
        $ch = curl_init();
        $post = [];
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $result = curl_exec($ch);
        $data = json_decode($result, JSON_UNESCAPED_UNICODE);
        $cliente = $data['negocio'];
        $usuario =  $data['usuario'];
        return view('admin.clientes.detalle',compact("cliente","usuario"));
    }
}
