<?php
require_once(__DIR__.'/../header.php');

header('Content-Type: application/json;charset=utf-8');

$api_universe = new Swagger\Client\Api\UniverseApi(null,$config);

try {
	if ($_GET["station"]<=64000000){
		$station = $api_universe->getUniverseStationsStationId($_GET["station"], $datasource);
		echo $station;
	} else {
		$station = $api_universe->getUniverseStructuresStructureId($_GET["station"], $datasource);
		echo json_encode(array("system_id"=>$station->getSolarSystemId(),"type_id"=>$station->getTypeId(),"station_id"=>$_GET["station"],"name"=>$station->getName()));
	}

} catch (Exception $e) {
	echo 'Exception when calling UniversieApi for stations or structures: ', $e->getMessage(), PHP_EOL;
}

?>