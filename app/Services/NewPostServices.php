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
    const SENDER_REF = "8cccfed6-0b05-11ec-8513-b88303659df5"; // временнно должно тянуться с базы

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
            ->set(CURLOPT_POSTFIELDS, "{\r\n\"apiKey\": \"".self::API_KEY."\",\r\n \"modelName\": \"Address\",\r\n \"calledMethod\": \"getAreas\",\r\n \"methodProperties\": { }\r\n}");

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
        $arr = (object) [
            "apiKey"=> self::API_KEY,
            "modelName"=> "AddressGeneral",
            "calledMethod"=> "getSettlements",
            "methodProperties"=> (object) [
            ]
        ];

        $counter = 1;
        while (1<2) {
            $c = CurlServices::app(self::REQ_URL)
                ->set(CURLOPT_HEADER, 1)
                ->set(CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1)
                ->set(CURLOPT_HTTPHEADER, ["content-type: application/json"])
                ->set(CURLOPT_CUSTOMREQUEST, "POST")
                ->set(CURLOPT_POSTFIELDS, "{\r\n\"apiKey\": \"".self::API_KEY."\",
                \r\n \"modelName\": \"AddressGeneral\",
                \r\n \"calledMethod\": \"getSettlements\",
                \r\n \"methodProperties\": {
                        \"Page\": \"$counter\"

                     }
                \r\n}");


            $data = $c->request('/');
            dd($data);
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
//TODO: Обдумать метод выкачки полной базы отделений
    public static function wrehouse()
    {
        $settlements = NewPostSettlements::all();
        foreach ($settlements as $settlement){

            $c = CurlServices::app(self::REQ_URL)
                ->set(CURLOPT_HEADER, 1)
                ->set(CURLOPT_HTTP_VERSION,  CURL_HTTP_VERSION_1_1)
                ->set(CURLOPT_HTTPHEADER,  ["content-type: application/json"])
                ->set(CURLOPT_CUSTOMREQUEST, "POST")
                ->set(CURLOPT_POSTFIELDS, "{\r\n\"apiKey\": \"".self::API_KEY."\",
                \r\n \"modelName\": \"AddressGeneral\",
                \r\n \"calledMethod\": \"getWarehouses\",\r\n \"methodProperties\": {\"Language\": \"ru\", \"SettlementRef\": \"$settlement->ref\" }\r\n}");

            $data = $c->request('/');
            if($data['html']->data == null) {
                continue;
            }else{

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
    public static function getSender()
    {
        $c = CurlServices::app(self::REQ_URL)
            ->set(CURLOPT_HEADER, 1)
            ->set(CURLOPT_HTTP_VERSION,  CURL_HTTP_VERSION_1_1)
            ->set(CURLOPT_HTTPHEADER,  ["content-type: application/json"])
            ->set(CURLOPT_CUSTOMREQUEST, "POST")
            ->set(CURLOPT_POSTFIELDS, "{\r\n\"apiKey\": \"".self::API_KEY."\",
                \r\n \"modelName\": \"Counterparty\",
                \r\n \"calledMethod\": \"save\",
                \r\n \"methodProperties\": {
                    \"FirstName\": \"Евгений\",
                     \"MiddleName\": \"Александрович\",
                     \"LastName\": \"Малашенко\",
                     \"Phone\": \"0983486318\",
                     \"Email\": \"\",
                     \"CounterpartyType\": \"PrivatePerson\",
                     \"CounterpartyProperty\": \"Sender\",
                      }\r\n}");

        $data = $c->request('/');
        dd($data);

    }

    public static function internetDocument()
    {
        $c = CurlServices::app(self::REQ_URL)
            ->set(CURLOPT_HEADER, 1)
            ->set(CURLOPT_HTTP_VERSION,  CURL_HTTP_VERSION_1_1)
            ->set(CURLOPT_HTTPHEADER,  ["content-type: application/json"])
            ->set(CURLOPT_CUSTOMREQUEST, "POST")
            ->set(CURLOPT_POSTFIELDS, "{\r\n\"apiKey\": \"".self::API_KEY."\",
            \r\n \"modelName\": \"InternetDocument\",
            \r\n \"calledMethod\": \"save\",
            \r\n \"methodProperties\": {
                    \"NewAddress\": \"1\",
                    \"PayerType\": \"Sender\", // Sender or Recipient
                    \"PaymentMethod\": \"Cash\", // Cash or NonCash
                    \"VolumeGeneral\": \"0.0004\",//Объем общий, м.куб (min - 0.0004), обязательно для заполнения,
                    \"Weight\": \"10\",  //min - 0,1 Вес фактический(кг)
                    \"ServiceType\": \"WarehouseWarehouse\",
                    \"SeatsAmount\": \"1\", //Целое число, количество мест отправления
                    \"Description\": \"Платье\", //Название товара
                    \"Cost\": \"500\", // Целое число, объявленная стоимость (если объявленная стоимость не указана, API автоматически подставит минимальную объявленную цену - 300.00
                    \"CitySender\": \"8d5a980d-391c-11dd-90d9-001a92567626\",// тоже должно подтягиваться с бд
                    \"Sender\": \"".self::SENDER_REF."\",
                    \"CargoType\": \"Parcel\",

                  }
              \r\n}");
        $data = $c->request('/');
        dd($data);
    }

//"modelName":"InternetDocument",
//   "calledMethod":"save",
//   "methodProperties":{
//    "NewAddress":"1",
//      "PayerType":"Sender",
//      "PaymentMethod":"Cash",
//      "CargoType":"Cargo",
//      "VolumeGeneral":"0.1",
//      "Weight":"10",
//      "ServiceType":"WarehouseWarehouse",
//      "SeatsAmount":"1",
//      "Description":"абажур",
//      "Cost":"500",
//      "CitySender":"8d5a980d-391c-11dd-90d9-001a92567626",
//      "Sender":"5ace4a2e-13ee-11e5-add9-005056887b8d",
//      "SenderAddress":"d492290b-55f2-11e5-ad08-005056801333",
//      "ContactSender":"613b77c4-1411-11e5-ad08-005056801333",
//      "SendersPhone":"380991234567",
//      "RecipientCityName":"Киев",
//      "RecipientArea":"",
//      "RecipientAreaRegions":"",
//      "RecipientAddressName":"1",
//      "RecipientHouse":"",
//      "RecipientFlat":"",
//      "RecipientName":"Тест Тест Тест",
//      "RecipientType":"PrivatePerson",
//      "RecipientsPhone":"380991234567",
//      "DateTime":"23.09.2016"
   }
