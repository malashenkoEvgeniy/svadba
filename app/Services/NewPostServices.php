<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class NewPostServices
{
    const API_KEY = "ea469f07e764d8f8d35a63fa2e4a70d2";
    const REQ_URL = "https://api.novaposhta.ua/v2.0/";

    public static function areas()
    {

        $client = new Client([
            'base_uri' => self::REQ_URL,
        ]);

        try {

            $response = $client->request('POST', '', [
                'query' => [
                    'apikey' => self::API_KEY,
                    'modelName'=> "Address",
                    "calledMethod"=> "getAreas",
                    "methodProperties"=> []
                ]
            ]);

            $content = $response->getBody()->getContents();
            $response_data = json_decode($content, true);
            dd($content);
//            $result = $response_data['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['Point']['pos'];


        } catch (RequestException $e) {
//            $result = '0 0';
        }

        return $result;
    }
}
