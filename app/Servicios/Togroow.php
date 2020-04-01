<?php
namespace App\Servicios;

class Togroow
{

    public static function request($metodo,$data){
        $url = "http://api.togroow.com/";
        $url = "http://servicios.togroow.local/";
        $user ="desarrollo01@togroow.com";
        $password = "123456";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url."/".$metodo);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "$user:$password");
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $result = curl_exec($ch);
        $data = json_decode($result, JSON_UNESCAPED_UNICODE);
        return $data;
    }
    

}