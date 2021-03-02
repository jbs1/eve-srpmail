<?php
require_once(__DIR__.'/../header.php');


header('Content-Type: application/json;charset=utf-8');

$api_universe = new Swagger\Client\Api\UniverseApi(null,$config);

try {

    $charname = $api_universe->postUniverseNames(json_encode($_POST["charid"]), $datasource);

    $mem_arr = array();

    foreach ($charname as $value) {
        if ($value["category"]=="character") {
            $mem_arr[$value["id"]]=$value["name"];
        }
    }

    echo json_encode($mem_arr);

} catch (Exception $e) {
    echo 'Exception: ', $e->getMessage(), PHP_EOL;
}



?>