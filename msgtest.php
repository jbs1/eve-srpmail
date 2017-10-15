<?php
session_start();
require_once('inc.php');


token_refresh();
header('Content-Type: application/json;charset=utf-8');

Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken(token());


$api_instance = new Swagger\Client\Api\MailApi();
$resp = new \Swagger\Client\Model\PostCharactersCharacterIdMailRecipient();
$resp["recipient_type"] = "character";
$resp["recipient_id"] = 92016026;//test char Arthie Dallocart
$mail = new \Swagger\Client\Model\PostCharactersCharacterIdMailMail();
$mail["subject"] = "test mail";
$mail["body"] = "test body";
$mail["recipients"] = array($resp);


try {
    $result = $api_instance->postCharactersCharacterIdMail(charid(), $mail, $datasource);
    print_r(json_encode(array("success"=>true,"return"=>$result)));
} catch (Exception $e) {
	echo 'Exception: ', $e->getMessage(), PHP_EOL;
	print_r(json_encode(array("success"=>false,"return"=>'Exception when calling MailApi->postCharactersCharacterIdMail: '+$e->getMessage())));
}

?>