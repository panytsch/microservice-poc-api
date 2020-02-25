<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    public function call()
    {
       	$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,"http://auth_nginx/test");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$server_output = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close ($ch);
		return new Response(
            $server_output
        );
    }
}