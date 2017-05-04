<?php
session_start();
require_once('../SwaggerClient-php/autoload.php');
require_once('../vendor/autoload.php');
require_once('../provider.php');
require_once('../inc.php');


token_refresh();
header('Content-Type: application/json;charset=utf-8');


$api_instance = new Swagger\Client\Api\MailApi();
$resp = new \Swagger\Client\Model\PostCharactersCharacterIdMailRecipient();
$resp["recipient_type"] = "character";
$resp["recipient_id"] = $_POST["recv"];
$mail = new \Swagger\Client\Model\PostCharactersCharacterIdMailMail();
$mail["subject"] = $_POST["subj"];
$mail["body"] = str_replace(array("\r\n","\r","\n"), "<br>", $_POST["body"]);
$mail["recipients"] = array($resp);
$datasource = "tranquility";


try {
    $result = $api_instance->postCharactersCharacterIdMail(charid(), $mail, $datasource, token());
    print_r(json_encode(array("success"=>true,"return"=>$result)));
} catch (Exception $e) {
	print_r(json_encode(array("success"=>false,"return"=>'Exception when calling MailApi->postCharactersCharacterIdMail: '+$e->getMessage())));
}




?>