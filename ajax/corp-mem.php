<?php
session_start();
require_once('../SwaggerClient-php/autoload.php');
require_once('../vendor/autoload.php');
require_once('../provider.php');
require_once('../inc.php');

token_refresh();

header('Content-Type: application/json;charset=utf-8');

$api_instance = new Swagger\Client\Api\CorporationApi();
$datasource = "tranquility"; // string | The server name you would like data from


try {
    $corpmem = $api_instance->getCorporationsCorporationIdMembers(corpid(charid()),$datasource,token());
    $json = array();
    foreach ($corpmem as $key => $value) {
    	$json[$key]=$value['character_id'];
    }
    echo json_encode($json);
} catch (Exception $e) {
    echo 'Exception: ', $e->getMessage(), PHP_EOL;
}



?>