<?php
    require_once 'vendor/autoload.php';

    $client = new \CdekSDK\CdekClient('', '');
    
    use CdekSDK\Requests;

    $request = new Requests\PvzListRequest();
    $response = $client->sendPvzListRequest($request);

    foreach ($response as $item) {
        $item->Code;
        $item->Name;
        $item->Address;
    
        foreach ($item->OfficeImages as $image) {
            $image->getUrl();
        }
        echo $item->Name;
    }


?>