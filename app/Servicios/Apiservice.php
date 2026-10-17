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
                $url = "http://localhost:8000/api/".$metodo;
            } else {
                $url = "https://api.sportodos.com/api/".$metodo;
            }
            $token = '';
            if(Session::get('access_token')){
                $token = Session::get('access_token');
            }
            $response = null;
            $hasFile = collect($data)->contains(function ($value) {
                return $value instanceof \CURLFile;
            });
            $http = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ]);
            if ($hasFile) {
                foreach ($data as $key => $value) {
                    if (is_array($value)) {
                        foreach ($value as $index => $item) {
                            $data[$key.'['.$index.']'] = $item;
                        }
                        unset($data[$key]);
                        continue;
                    }
                    if ($value instanceof \CURLFile) {
                        $contents = file_get_contents($value->getFilename());
                        if ($contents === false) {
                            throw new \RuntimeException('No fue posible leer el archivo adjunto.');
                        }
                        $http = $http->attach($key, $contents, $value->getPostFilename());
                        unset($data[$key]);
                    }
                }
            }
            switch ($tipo) {
                case '1':
                    $response = $http->post($url, $data);
                    break;
                case '3':
                    $response = $http->put($url, $data);
                    break;
                case '2':
                    $response = $http->delete($url);
                    break;
                default:
                    $response = $http->get($url."?".http_build_query($data));
                    break;
            }

            // Maneja la respuesta de la URL externa si es necesario
            $statusCode = $response->status();
            $content = $response->body();
            //echo $content;
            return json_decode($content,true);
        } catch (\Exception $e) {
            return ['error' => $e->getMessage(), '_status' => 500];
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

