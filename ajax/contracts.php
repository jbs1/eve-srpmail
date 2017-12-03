<?php
require_once('../header.php');

header('Content-Type: application/json;charset=utf-8');
$json=array();
$cid=corpid(charid());

$contracts = new Swagger\Client\Api\ContractsApi(null,$config);

try {
	$result = $contracts->getCharactersCharacterIdContracts(charid(), $datasource);
	foreach ($result as $row) {
		// if(($row->getStatus()=="outstanding"||$row->getStatus()=="finished")&&$row->getIssuerId()==charid()&&$row->getAvailability()=="personal"&&$row->getType()=="item_exchange"&&corpid($row->getAssigneeId())==$cid){
		if(($row->getDateIssued()->getTimestamp()>strtotime('-6 hour'))&&($row->getStatus()=="outstanding"||$row->getStatus()=="finished")&&$row->getIssuerId()==charid()&&$row->getAvailability()=="personal"&&$row->getType()=="item_exchange"&&corpid($row->getAssigneeId())==$cid){
			array_unshift($json,json_decode(strval($row)));//avoids protected property problems
		}
	}
} catch (Exception $e) {
	print_r('Exception when calling ContractsApi->getCharactersCharacterIdContracts: '+$e->getMessage());
}

print_r(json_encode($json));

?>