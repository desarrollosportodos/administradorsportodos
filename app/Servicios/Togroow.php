<?php
namespace App\Servicios;
use Session;

class Togroow
{

    public static function request($metodo,$data,$tipo = null){
       
        // $url = "http://servicios.testing.togroow.com/api/".$metodo;
        echo $url = "http://api.togroow.local/api/".$metodo;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if( Session::get('access_token')){
            $token = Session::get('access_token');
            curl_setopt($ch, CURLOPT_XOAUTH2_BEARER,$token);
        }
        if(isset($tipo) && $tipo == 1){
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            print_r( http_build_query($data) );
        } else if(isset($tipo) && $tipo == 2) {
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        } else {
            if( count($params) > 0 ) {
                $query = http_build_query($params);
                curl_setopt($ch, CURLOPT_URL, "$url?$query");
            } else {
                curl_setopt($ch, CURLOPT_URL, $url);
            }
        }
        echo $result = curl_exec($ch);
        $data = json_decode($result, JSON_UNESCAPED_UNICODE);
        return $data;
    }
    

}