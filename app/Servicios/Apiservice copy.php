<?php
namespace App\Servicios;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Session;

class Apiservice
{

    public static function request($metodo,$data = [],$tipo = null,$multipart=null){
        $adminstatus = env("ADMIN_ESTADO");
        if($adminstatus == 0){
            $url = "http://api.sportodos.local/api/".$metodo;
        } else {
            $url = "http://api.sportodos.com/api/".$metodo;
        }

        echo $url;
        $client = new Client();
        $header = [];
        //$header['Accept'] = 'application/json';
        $header['Content-Type'] = 'application/x-www-form-urlencoded';
        if(Session::get('access_token')){
            $header['Authorization'] = "Bearer ".Session::get('access_token')."";
        }
        if(isset($tipo) && $tipo == 1){
            $metodo = "POST";
        } else if(isset($tipo) && $tipo == 3){
            $metodo = "PUT";
        } else if(isset($tipo) && $tipo == 2){
            $metodo = "DELETE";
        } else{
            $metodo = "GET";
        }
        try {
            if($metodo == "GET"){
                $response = $client->request($metodo,$url."?".http_build_query($data),["headers" =>$header]);
            } else{
                if($multipart != null){
                    $header['Content-Type'] = 'multipart/form-data';
                    foreach ($data as $name => $param) {
                       $df = [];
                       $df['name'] = $name;
                       $df['contents'] = $param; 
                        array_push($multipart,$df);
                    }
                    $option = [
                        "headers" =>$header,
                        RequestOptions::MULTIPART => $multipart,
                    ];
                    $response = $client->request($metodo,$url,$option);
                } else {
                    echo "<pre>";
                    print_r($data);
                    $response = $client->request($metodo,$url,["headers" =>$header,'body' => http_build_query($data)]);
                }
                
            }  
            if ($response->getBody()) {
                $res =  $response->getBody();
                var_dump($res);
                $array = json_decode($res);
            }
            return $array; 
        } catch (\Exception $e) { 
            if(method_exists($e, 'getResponse')){
                $response = $e->getResponse();
                if(method_exists($e, 'getBody')){
                    $responseBodyAsString = $response->getBody()->getContents();
                    return json_decode($responseBodyAsString,true);  
                } else {
                    echo "Error: " . $e->getMessage(); 
                }
            }  else {
                echo "Error: " . $e->getMessage(); 
            } 
        }
    }
    
    public static function formatFile($file,$name){
        $imagenBase64 = base64_encode(file_get_contents($file->getRealPath()));
        return [
            'name'     => $name, // Nombre del campo de la imagen en el formulario
            'contents' => base64_decode($imagenBase64), // Contenido de la imagen
            'filename' => $file->getClientOriginalName() // Nombre del archivo
        ];
    }
}

