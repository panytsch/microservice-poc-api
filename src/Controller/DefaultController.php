<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    public function call()
    {

//        $a = new \Redis();
//        $a->connect('redis');
//        $b = $a->ping('asd');
//        echo $b;
//        die();

        $ch = curl_init();

        $postParams = ['name' => "test", "password" => '888', 'network' => '1', 'skin' => '2'];

		curl_setopt($ch, CURLOPT_URL,"http://auth_nginx/auth");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postParams);

        $server_output = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close ($ch);
//      dd($server_output);
        return new Response(
            $server_output
        );
    }
}