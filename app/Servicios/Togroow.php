<?php
namespace App\Servicios;
use Session;

class Togroow
{

    public static function request($metodo,$data,$tipo = null){
       
        $url = "http://api.togroow.com/api/".$metodo;
        //$url = "http://api.togroow.local/api/".$metodo;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if( Session::get('access_token')){
            $token = Session::get('access_token');
            $header = array(utf8_encode("Authorization: Bearer ".$token.""),"Content-Type: application/x-www-form-urlencoded");
            /*curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BEARER);
            curl_setopt($ch,CURLOPT_XOAUTH2_BEARER,$token);*/
            curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
            curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
        }
        
        if(isset($tipo) && ($tipo == 1 || $tipo == 3)){
            curl_setopt($ch, CURLOPT_URL,$url);
            if($tipo == 1){
                curl_setopt($ch, CURLOPT_POST,1);
            } else {
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            }
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            //echo  http_build_query($data);
        } else if(isset($tipo) && $tipo == 2) {
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        } else {
            if( count($data) > 0 ) {
                $query = http_build_query($data);
                curl_setopt($ch, CURLOPT_URL, "$url?$query");
            } else {
                curl_setopt($ch, CURLOPT_URL, $url);
            }
        }
        
        $result = curl_exec($ch);
        $data = json_decode($result, JSON_UNESCAPED_UNICODE);
        return $data;
    }
    

}

