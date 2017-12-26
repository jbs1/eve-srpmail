<?php
require_once('../header.php');


header('Content-Type: application/json;charset=utf-8');

$api_corp = new Swagger\Client\Api\CorporationApi(null,$config);
$api_character = new Swagger\Client\Api\CharacterApi(null,$config);

try {
    if(empty($_SESSION['corpmem'])){
        $corpmem = $api_corp->getCorporationsCorporationIdMembers(corpid(charid()),$datasource);
        $split_ids=array_chunk($corpmem,100);
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
