<?php
namespace App\Servicios;
use GuzzleHttp\Client;
use Session;

class Apiservice
{

    public static function request($metodo,$data = [],$tipo = null){
        $adminstatus = env("ADMIN_ESTADO");
        if($adminstatus == 0){
            $url = "http://api.sportodos.local/api/".$metodo;
        } else {
            $url = "http://api.sportodos.com/api/".$metodo;
        }
        //echo $url;
        /*echo "<pre>";
        print_r($archivos);
        echo "</pre>";*/
        //$data = json_encode($data);
        $client = new Client();
        $header = [];
        $header['Accept'] = 'application/json';
        $header['Content-Type'] = 'application/x-www-form-urlencoded';
        if(Session::get('access_token')){
            $header['Authorization'] = "Bearer ".Session::get('access_token')."";
        }
        if(isset($tipo) && $tipo == 1){
            $metodo = "POST";
            ///$res=  $form->post($url)->json();
        } else if(isset($tipo) && $tipo == 3){
            $metodo = "PUT";
            ///$res=  $form->put($url)->json();
        } else if(isset($tipo) && $tipo == 2){
            $metodo = "DELETE";
            ///$res = $form->delete($url)->json();
        } else{
            $metodo = "GET";
            //$res=  $form->get($url)->json();
        }
        
        try {
            $response = $client->request($metodo,$url,["headers" =>$header,'form_params' => $data]);
            if ($response->getBody()) {
                $res =  $response->getBody();
                //echo $res;
                $array = json_decode($res,TRUE);
            }
            
            /*echo "<pre>";
            print_r($array);
            echo "</pre>";*/

            return $array; 
        } catch (\Exception $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            echo "<pre>";
            print_r($responseBodyAsString);
            return [];
        }
       
    }
    

}

