<?php
require_once(__DIR__.'/../header.php');


header('Content-Type: application/json;charset=utf-8');

$api_corp = new Swagger\Client\Api\CorporationApi(null,$config);
$api_universe = new Swagger\Client\Api\UniverseApi(null,$config);

try {
    if(empty($_SESSION['corpmem'])){
        $corpmem = $api_corp->getCorporationsCorporationIdMembers(corpid(),$datasource);
        $split_ids=array_chunk($corpmem,1000);
        $chars=array();
        
        foreach ($split_ids as $value){
            $chars=array_merge($chars,$api_universe->postUniverseNames(json_encode($value), $datasource));
        }

        $json=array();
        foreach ($chars as $value){
            $json[$value['id']] = $value['name'];
        }

        $_SESSION['corpmem']=$json;//save in ses for caching
        echo json_encode($_SESSION['corpmem']);
    } else {
        echo json_encode($_SESSION['corpmem']);
    }
} catch (Exception $e) {
    echo 'Exception: ', $e->getMessage(), PHP_EOL;
}



?>
