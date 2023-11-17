<?php
declare(strict_types=1);

namespace App;


class Api
{
    private object $response;

    private const URL = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
       public function __construct()
    {
        $url = self::URL;
        $parameters = [
        ];
        $headers = [
            'Accepts: application/json',
            'X-CMC_PRO_API_KEY:'.$_ENV["API"]
        ];
        $qs = http_build_query($parameters);
        $request = "{$url}?{$qs}";
        $curl = curl_init();
           curl_setopt_array($curl, array(
               CURLOPT_URL => $request,
               CURLOPT_HTTPHEADER => $headers,
               CURLOPT_RETURNTRANSFER => 1
           ));
           $response = curl_exec($curl);

           $this->response=(json_decode($response));
           curl_close($curl);
    }

    public function getResponse(): object
    {
        return $this->response;
    }
}



