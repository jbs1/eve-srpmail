<?php
session_start();
require_once('../SwaggerClient-php/autoload.php');
require_once('../vendor/autoload.php');
require_once('../provider.php');
require_once('../inc.php');

header('Content-Type: application/json;charset=utf-8');

$api_instance_char = new Swagger\Client\Api\CharacterApi();

try {
    $char = $api_instance_char->getCharactersCharacterId(charid());
    print_r($char);
} catch (Exception $e) {
    echo 'Exception: ', $e->getMessage(), PHP_EOL;
}



?>