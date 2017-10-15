<?php
session_start();
require_once('../inc.php');

token_refresh();

header('Content-Type: application/json;charset=utf-8');
$xml=getcontract(charid(),token());
$raw=$xml->result->rowset;
$json=array();
$cid=corpid(charid());

$_SESSION["contracts_cached"]=strtotime($xml->cachedUntil)-strtotime($xml->currentTime);

//shows only the most recent privat item exchanges issued by the logged in user
foreach ($raw->row as $value) {
	//600 ms without corpid check vs 2.5 sec with corpid check on 13 out of max 50 contracs
	//(strtotime($value["dateIssued"])>strtotime('-6 hour'))&&
	if((strtotime($value["dateIssued"])>strtotime('-6 hour'))&&($value["status"]=="Outstanding"||$value["status"]=="Completed")&&$value["issuerID"]==charid()&&$value["availability"]=="Private"&&$value["type"]=="ItemExchange"&&corpid($value["assigneeID"])==$cid){
		array_unshift($json,$value);
	}
}

echo json_encode($json);

?>