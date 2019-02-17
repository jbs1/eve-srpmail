<?php
require_once(__DIR__.'/../header.php');

header('Content-Type: application/json;charset=utf-8');
$json=array();

$wallet = new Swagger\Client\Api\WalletApi(null,$config);

try {
	$result = $wallet->getCorporationsCorporationIdWalletsDivisionJournalWithHttpInfo(corpid(), $corpwallet_id, $datasource);
	foreach ($result[0] as $row) {
		if ((strtotime($row['date'])>strtotime('-6 hour'))&&$row['ref_type']=="corporation_account_withdrawal"&&$row['context_id_type']=="character_id"&&$row['context_id']==charid()&&$row['first_party_id']!=$row['second_party_id']&&$row['amount']<=0) {
			array_unshift($json,$row);//avoids protected property problems
		}
	}
	print_r(json_encode(array($json,$result[2]['Expires'])));	
} catch (Exception $e) {
	echo 'Exception when calling WalletApi->getCorporationsCorporationIdWalletsDivisionJournal: ', $e->getMessage(), PHP_EOL;
}
?>