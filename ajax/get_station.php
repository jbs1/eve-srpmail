<?php
require_once(__DIR__.'/../header.php');

header('Content-Type: application/json;charset=utf-8');

$api_universe = new Swagger\Client\Api\UniverseApi(null,$config);


try {
	$station=$api_universe->getUniverseStationsStationId($_GET["station"], $datasource);
    print_r($station->__toString());
} catch (Exception $e) {
    echo 'Exception when calling UniversieApi->getUniverseStationsStationId: ', $e->getMessage(), PHP_EOL;
}

?>