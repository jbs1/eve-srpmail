<?php
session_start();
require_once('../SwaggerClient-php/vendor/autoload.php');
require_once('../vendor/autoload.php');
require_once('../provider.php');
require_once('../inc.php');

token_refresh();

header('Content-Type: application/json;charset=utf-8');

$api_corp = new Swagger\Client\Api\CorporationApi();
$api_character = new Swagger\Client\Api\CharacterApi();
$datasource = "tranquility"; // string | The server name you would like data from
try {
    if(empty($_SESSION['corpmem'])){
        $corpmem = $api_corp->getCorporationsCorporationIdMembers(corpid(charid()),$datasource,token());
        $ids = array();
        foreach ($corpmem as $key => $value) {
        	$ids[$key]=$value['character_id'];
        }
        $split_ids=array_chunk($ids,100);
        $chars=array();

        foreach ($split_ids as $value){
            $chars=array_merge($chars,$api_character->getCharactersNames(implode(",", array_values($value)), $datasource));
        }
        $json=array();
        foreach ($chars as $value){
            $json[$value['character_id']] = $value['character_name'];
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
