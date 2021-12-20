<?php
namespace App\Servicios;

class Sportodos 
{

    public static function request($metodo,$data){
        $url = "https://api.sportodos.com";
       // $url = "http://servicios.sportodos.local";
        $user ="desarrollo01@togroow.com";
        $password = "123456";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url."/".$metodo);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "$user:$password");
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $result = curl_exec($ch);
        //echo "resultados curl ".$metodo."<br><br><br>";
        //var_dump($result);
        curl_close($ch);
        $data = json_decode($result, JSON_UNESCAPED_UNICODE);
        return $data;

    }
}