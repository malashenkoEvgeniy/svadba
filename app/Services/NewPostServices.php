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
