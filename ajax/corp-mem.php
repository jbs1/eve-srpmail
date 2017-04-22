<?php
session_start();
require_once('../SwaggerClient-php/autoload.php');
require_once('../vendor/autoload.php');
require_once('../provider.php');
require_once('../inc.php');

header('Content-Type: application/json;charset=utf-8');

$api_instance = new Swagger\Client\Api\CorporationApi();
$datasource = "tranquility"; // string | The server name you would like data from


try {
    $corpmem = $api_instance->getCorporationsCorporationIdMembers(corpid(charid()));
    echo json_encode($corpmem);
} catch (Exception $e) {
    echo 'Exception: ', $e->getMessage(), PHP_EOL;
}



?>