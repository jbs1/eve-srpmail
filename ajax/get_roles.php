<?php
require_once(__DIR__.'/../header.php');

header('Content-Type: application/json;charset=utf-8');
$json=array();

$charapi = new Swagger\Client\Api\CharacterApi(null,$config);


try {
    $result = $charapi->getCharactersCharacterIdRoles(charid(), $datasource);
    print_r(strval($result));
} catch (Exception $e) {
    echo 'Exception when calling CharacterApi->getCharactersCharacterIdRoles: ', $e->getMessage(), PHP_EOL;
}

?>