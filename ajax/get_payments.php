<?php
require_once(__DIR__.'/../header.php');

header('Content-Type: application/json;charset=utf-8');
$json=array();

$wallet = new Swagger\Client\Api\WalletApi(null,$config);

try {
	$result = $wallet->getCorporationsCorporationIdWalletsDivisionJournalWithHttpInfo(corpid(), $corpwallet_id, $datasource);
	foreach ($result[0] as $row) {
		if (($row->getDate()->getTimestamp()>strtotime('-6 hour'))&&$row->getRefType()=="corporation_account_withdrawal"&&$row->getContextIdType()=="character_id"&&$row->getContextId()==charid()&&$row->getFirstPartyId()!=$row->getSecondPartyId()&&$row->getAmount()<=0) {
			array_unshift($json,json_decode(strval($row)));//avoids protected property problems

		}
	}
	print_r(json_encode(array($json,$result[2]['Expires'])));
	
} catch (Exception $e) {
	echo 'Exception when calling WalletApi->getCorporationsCorporationIdWalletsDivisionJournal: ', $e->getMessage(), PHP_EOL;
}

?>