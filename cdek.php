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
                    'adress' => $item->Address
                ];
                $points[] = $point;
            }
        }
    
        return $points;
    }

    function getCities(){
        include 'db.php';

        $cities = [];
        $res = mysqli_query($connection, 'SELECT City FROM cities');
        $result = array();
        while ($row = $res->fetch_array())
            $result[] = $row[0];
        return $result;
    }
        


    function getCityCoords($city){
        $request = new Requests\CitiesRequest();
        $response = $client->sendCitiesRequest($request);
        $city_coords;
        foreach ($response as $location) {
            /** @var \CdekSDK\Common\Location $location */
            if($location->getCountry() == "Россия" && mb_strtolower($location->getCityName()) == mb_strtolower(trim($city))){
                $city_coords = [
                    'getLatitude' => $location->getLatitude(),
                    'getLongitude' => $location->getLongitude()
                ];
            }
        }

        return $city_coords;
    }

?>