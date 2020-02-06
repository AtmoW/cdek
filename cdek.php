<?php
    require_once 'vendor/autoload.php';

    $client = new \CdekSDK\CdekClient('', '');
    
    use CdekSDK\Requests;

    function getPointsByCity($city, $client){
        $request = new Requests\PvzListRequest();
        $response = $client->sendPvzListRequest($request);
        $points = [];
        foreach ($response as $item) {
            if(mb_strtolower($item->City) == trim(mb_strtolower($city)))
            {
                $point = [
                    'code' => $item->Code,
                    'name' => $item->Name,
                    'adress' => $item->Address,
                    'city' =>  $item->City
                ];
                $points[] = $point;
            }
        }
    
        return $points;
    }


?>