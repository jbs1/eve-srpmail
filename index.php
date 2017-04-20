<?php
session_start();
require_once('SwaggerClient-php/autoload.php');
require_once('vendor/autoload.php');
require_once('provider.php');
require_once('inc.php');

if(empty($_SESSION['accesstoken-obj'])){//if not logged in redirect to
	header('Location: oauth.php');
}

token_refresh();



$api_instance = new Swagger\Client\Api\MailApi();
$datasource = "tranquility"; // string | The server name you would like data from


try {
    $result = $api_instance->getCharactersCharacterIdMailLabels($character_id=charid(), $token=token());
    print_r($result);
} catch (Exception $e) {
    echo 'Exception: ', $e->getMessage(), PHP_EOL;
}



?>
