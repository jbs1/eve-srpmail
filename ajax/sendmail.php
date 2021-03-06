<?php
require_once(__DIR__.'/../header.php');

header('Content-Type: application/json;charset=utf-8');


$api_instance = new Swagger\Client\Api\MailApi(null,$config);
$resp = new \Swagger\Client\Model\PostCharactersCharacterIdMailRecipient();
$resp["recipient_type"] = "character";
$resp["recipient_id"] = $_POST["recv"];
$mail = new \Swagger\Client\Model\PostCharactersCharacterIdMailMail();
$mail["subject"] = $_POST["subj"];
$mail["body"] = str_replace(array("\r\n","\r","\n"), "<br>", $_POST["body"]);
$mail["recipients"] = array($resp);

try {
    $result = $api_instance->postCharactersCharacterIdMail(charid(), $mail, $datasource);
	print_r(json_encode(array("success"=>true,"return"=>$result)));
} catch (Exception $e) {
	print_r(json_encode(array("success"=>false,"return"=>'Exception when calling MailApi->postCharactersCharacterIdMail: '.$e->getMessage())));
}




?>