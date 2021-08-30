<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class NewPostServices
{
    const API_KEY = "3e5a3193490f568873e83ee9c823f5e9";
    const REQ_URL = "https://api.novaposhta.ua/v2.0/json/";

    public static function areas()
    {

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => self::REQ_URL,
            CURLOPT_RETURNTRANSFER => True,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\r\n\"apiKey\": \"{{ \App\Services\NewPostServices::API_KEY}}\",\r\n \"modelName\": \"Address\",\r\n \"calledMethod\": \"getAreas\",\r\n \"methodProperties\": { }\r\n}",
            CURLOPT_HTTPHEADER => array("content-type: application/json",),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }

        dd(response());
    }
}
