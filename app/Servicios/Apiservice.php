<?php
namespace App\Servicios;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class Apiservice
{

    public static function request($metodo,$data = [],$tipo = null,$multipart=null){
        

        try {
            $adminstatus = env("ADMIN_ESTADO");
            if($adminstatus == 0){
                $url = "http://localhost:8080/api/".$metodo;
            } else {
                $url = "https://api.sportodos.com/api/".$metodo;
            }
            echo $url;
            $token = '';
            if(Session::get('access_token')){
                $token = Session::get('access_token');
            }

            $response = null;

            switch ($tipo) {
                case '1':
                    echo "<pre>";
                    print_r($data);
                    $response = Http::withHeaders([
                        'Authorization' => 'Bearer ' . $token,
                    ])->post($url, $data);
                    break;
                case '3':
                    $response = Http::withHeaders([
                        'Authorization' => 'Bearer ' . $token,
                    ])->put($url, $data);
                    break;
                case '2':
                    $response = Http::withHeaders([
                        'Authorization' => 'Bearer ' . $token,
                    ])->delete($url);
                    break;
                default:
                    $response = Http::withHeaders([
                        'Authorization' => 'Bearer ' . $token,
                    ])->get($url."?".http_build_query($data));
                    break;
            }

            // Maneja la respuesta de la URL externa si es necesario
            $statusCode = $response->status();
            $content = $response->body();
            echo $content;
            //return response()->json($content);
        } catch (\Exception $e) {
            // Maneja cualquier error que pueda ocurrir durante la solicitud
            return response()->json(['error' => $e->getMessage()], 500);
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

