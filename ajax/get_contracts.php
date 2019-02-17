<?php
require_once(__DIR__.'/../header.php');

header('Content-Type: application/json;charset=utf-8');
$json=array();

$contracts = new Swagger\Client\Api\ContractsApi(null,$config);

try {
	$result = $contracts->getCharactersCharacterIdContractsWithHttpInfo(charid(), $datasource);
	foreach ($result[0] as $row) {
		if((strtotime($row['date_issued'])>strtotime('-6 hour'))&&($row['status']=="outstanding"||$row['status']=="finished")&&$row['issuer_id']==charid()&&$row['availability']=="personal"&&$row['type']=="item_exchange"&&getcorpid($row['assignee_id'])==corpid()){
			array_unshift($json,$row);
		}
	}
	print_r(json_encode(array($json,$result[2]['Expires'])));
} catch (Exception $e) {
	print_r('Exception when calling ContractsApi->getCharactersCharacterIdContracts: '+$e->getMessage());
}
?>