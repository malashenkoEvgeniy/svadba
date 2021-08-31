<?php

namespace App\Services;

use App\Models\NewPostArea;
use App\Models\NewPostSettlements;
use App\Models\NewPostWarehouse;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class NewPostServices
{
    const API_KEY = "3e5a3193490f568873e83ee9c823f5e9";
    const REQ_URL = "https://api.novaposhta.ua/v2.0/json/";

    public static function areas1()
    {
        $client = new Client([
            'base_uri' => self::REQ_URL,
        ]);

        try {

            $response = $client->request('POST', '', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                    ],
                'query' => [
                    'apikey' => self::API_KEY,



                ],
                'form_params' => [
                    'modelName'=> 'Address',
                    'calledMethod'=> 'getAreas',
                ]
            ]);

            $content = $response->getBody()->getContents();
            dd($content);
            $response_data = json_decode($content, true);
            $result = $response_data['response']['GeoObjectCollection']['featureMember'][0]['GeoObject']['Point']['pos'];


        } catch (RequestException $e) {
            $result = '0 0';
        }

        return $result;
        $c = CurlServices::app(self::REQ_URL)
            ->set(CURLOPT_HEADER, 1)
            ->set(CURLOPT_HTTP_VERSION,  CURL_HTTP_VERSION_1_1)
            ->set(CURLOPT_HTTPHEADER,  ["content-type: application/json"])
//            ->add_headers("content-type: application/json")
            ->set(CURLOPT_CUSTOMREQUEST, "POST")
            ->set(CURLOPT_POSTFIELDS, "{\r\n\"apiKey\": \"3e5a3193490f568873e83ee9c823f5e9\",\r\n \"modelName\": \"Address\",\r\n \"calledMethod\": \"getAreas\",\r\n \"methodProperties\": { }\r\n}");

        $data = $c->request('/');

//        $curl = curl_init();
//        curl_setopt_array($curl, array(
//            CURLOPT_URL => self::REQ_URL,
//            CURLOPT_RETURNTRANSFER => True,
//            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//            CURLOPT_CUSTOMREQUEST => "POST",
//            CURLOPT_POSTFIELDS => "{\r\n\"apiKey\": \"{{ \App\Services\NewPostServices::API_KEY}}\",\r\n \"modelName\": \"Address\",\r\n \"calledMethod\": \"getAreas\",\r\n \"methodProperties\": { }\r\n}",
//            CURLOPT_HTTPHEADER => array("content-type: application/json",),
//        ));
//        $response = curl_exec($curl);
//        $err = curl_error($curl);
//        curl_close($curl);
//        if ($err) {
//            echo "cURL Error #:" . $err;
//        } else {
//            echo $response;
//        }

        dd($data);
    }

    public static function areas()
    {
        $c = CurlServices::app(self::REQ_URL)
            ->set(CURLOPT_HEADER, 1)
            ->set(CURLOPT_HTTP_VERSION,  CURL_HTTP_VERSION_1_1)
            ->set(CURLOPT_HTTPHEADER,  ["content-type: application/json"])
            ->set(CURLOPT_CUSTOMREQUEST, "POST")
            ->set(CURLOPT_POSTFIELDS, "{\r\n\"apiKey\": \"3e5a3193490f568873e83ee9c823f5e9\",\r\n \"modelName\": \"Address\",\r\n \"calledMethod\": \"getAreas\",\r\n \"methodProperties\": { }\r\n}");

        $data = $c->request('/');

        foreach($data['html']->data as $area){

            NewPostArea::create([
                'ref'=>$area->Ref,
                'areas_center'=>$area->AreasCenter,
                'description_ru'=>$area->DescriptionRu,
                'description'=>$area->Description,
            ]);
        }
        return true;
    }

    public static function settlements()
    {
        $counter = 1;
        while (1<2) {
            $c = CurlServices::app(self::REQ_URL)
                ->set(CURLOPT_HEADER, 1)
                ->set(CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1)
                ->set(CURLOPT_HTTPHEADER, ["content-type: application/json"])
                ->set(CURLOPT_CUSTOMREQUEST, "POST")
                ->set(CURLOPT_POSTFIELDS, "{\r\n\"apiKey\": \"3e5a3193490f568873e83ee9c823f5e9\",\r\n \"modelName\": \"AddressGeneral\",\r\n \"calledMethod\": \"getSettlements\",\r\n \"methodProperties\": { \"Page\": \"$counter\" }\r\n}");

            $data = $c->request('/');
            if (count($data['html']->data) < 1) {
                return true;
            } else {
                $counter++;
            }

            foreach ($data['html']->data as $item) {
                NewPostSettlements::create([
                    'ref' => $item->Ref,
                    'description_ru' => $item->DescriptionRu,
                    'description' => $item->Description,
                    'area' => $item->Area,
                    'area_description' => $item->AreaDescription,
                    'area_description_ru' => $item->AreaDescriptionRu,
                    'regions_description' => $item->RegionsDescription,
                    'regions_description_ru' => $item->RegionsDescriptionRu
                ]);
            }
        }
    }

    public static function wrehouse()
    {
        $settlements = NewPostSettlements::all();
        foreach ($settlements as $settlement){

            $c = CurlServices::app(self::REQ_URL)
                ->set(CURLOPT_HEADER, 1)
                ->set(CURLOPT_HTTP_VERSION,  CURL_HTTP_VERSION_1_1)
                ->set(CURLOPT_HTTPHEADER,  ["content-type: application/json"])
                ->set(CURLOPT_CUSTOMREQUEST, "POST")
                ->set(CURLOPT_POSTFIELDS, "{\r\n\"apiKey\": \"3e5a3193490f568873e83ee9c823f5e9\",\r\n \"modelName\": \"AddressGeneral\",\r\n \"calledMethod\": \"getWarehouses\",\r\n \"methodProperties\": {\"Language\": \"ru\", \"SettlementRef\": \"$settlement->ref\" }\r\n}");

            $data = $c->request('/');

            foreach($data['html']->data as $item){

                NewPostWarehouse::create([
                    'ref'=>$item->Ref,
                    'settlement_ref'=>$item->SettlementRef,
                    'description_ru'=>$item->DescriptionRu,
                    'description'=>$item->Description,
                ]);
            }
        }

    }
}
