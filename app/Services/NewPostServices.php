<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class NewPostServices
{
    const API_KEY = "ea469f07e764d8f8d35a63fa2e4a70d2";
    const GEO_URL = "http://testapi.novaposhta.ua/v2.0/";

    public static function geoocode($url)
    {

        $client = new Client([
            'base_uri' => self::GEO_URL,
        ]);

        try {

            $response = $client->request('GET', '', [
                'query' => [
                    'geocode' => $url,
                    'apikey' => self::API_KEY,
                    'format' => 'json',
                    'results' => 1
                ]
            ]);

            $content = $response->getBody()->getContents();
            $response_data = json_decode($content, true);
//            $result = $response_data['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['Point']['pos'];


        } catch (RequestException $e) {
            $result = '0 0';
        }

        return $result;
    }
}
