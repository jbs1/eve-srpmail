<?php
require_once('../header.php');

header('Content-Type: application/json;charset=utf-8');
$json=array();

$contracts = new Swagger\Client\Api\ContractsApi(null,$config);

try {
	$result = $contracts->getCharactersCharacterIdContractsWithHttpInfo(charid(), $datasource);
	foreach ($result[0] as $row) {
		if(($row->getDateIssued()->getTimestamp()>strtotime('-6 hour'))&&($row->getStatus()=="outstanding"||$row->getStatus()=="finished")&&$row->getIssuerId()==charid()&&$row->getAvailability()=="personal"&&$row->getType()=="item_exchange"&&getcorpid($row->getAssigneeId())==corpid()){
			array_unshift($json,json_decode(strval($row)));//avoids protected property problems
		}
	}

	print_r(json_encode(array($json,$result[2]['Expires'][0])));

} catch (Exception $e) {
	print_r('Exception when calling ContractsApi->getCharactersCharacterIdContracts: '+$e->getMessage());
}


?>