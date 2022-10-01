<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servicios\Apiservice;

class UsuariosController extends Controller
{
    public function index()
    {
        $post = [];
        $post['redsocial'] = '49'; 
        $listado = Apiservice::request("usuarios/all", $post,4);
        $asideactual = 5; 
        $niveles = $this->niveles();
        return view('admin.usuarios.home', compact('asideactual','listado','niveles'));
    }

    public function eliminar($id)
    {
        $post = [];
        $post['redsocial'] = '49'; 
        $listado = Apiservice::request("usuarios/".$id."/delete", $post,2);
        return redirect('administrador/usuarios')->with("mensaje","Tu usuario a sido eliminado  con exito.");
    }

    /**
    * Formulario para crear un nuevo usuario
    *
    * @return void
    */
    public function nuevo()
    {
        $niveles = $this->niveles();
        $asideactual = 7;
        return view('admin.usuarios.crear', compact('asideactual','niveles'));
    }

    /**
    * metodo crear un nuevo usuario
    *
    * @return void
    */
    public function crear(Request $request){
        $data = $request->all();
        $data['red'] = 49;
        $post = $data;
        Apiservice::request("usuarios/create",$post,1);
        return redirect('administrador/usuarios')->with("mensaje","Tu usuario a sido creado con exito.");
    }

    public function niveles(){
        $array = [];
        $array[1] = "Administrador";
        $array[2] = "Deportista";
        return $array;
    }

   
    /**
    * metodo editar un nuevo usuario
    *
    * @return void
    */
    public function editar($id){
        $niveles = $this->niveles();
        $asideactual = 7;
        $data =  Apiservice::request("usuarios/".$id."/detail",[],4);
        return view('admin.usuarios.editar', compact('data','niveles','asideactual'));
        //return redirect('administrador/usuarios')->with("mensaje","Tu usuario a sido creado con exito.");
     }

     /**
    * metodo editar un nuevo usuario
    *
    * @return void
    */
    public function actualizar($id,Request $request){
        $data = $request->all();
        $data['red'] = 49;
        $post = $data;
        Apiservice::request("usuarios/".$id."/edicionsimple",$post,3);
        return redirect('administrador/usuarios')->with("mensaje","Tu usuario a sido actualizado con exito.");
     }
}
