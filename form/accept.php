<?php
session_start();
require_once('../SwaggerClient-php/autoload.php');
require_once('../vendor/autoload.php');
require_once('../provider.php');
require_once('../inc.php');


token_refresh();


$api_instance = new Swagger\Client\Api\MailApi();
$resp = new \Swagger\Client\Model\PostCharactersCharacterIdMailRecipient();
$resp["recipient_type"] = "character";
$resp["recipient_id"] = $_POST["recv"];
$mail = new \Swagger\Client\Model\PostCharactersCharacterIdMailMail();
$mail["subject"] = $_POST["subj"];
$mail["body"] = str_replace(array("\r\n","\r","\n"), "<br>", $_POST["body"]);
$mail["recipients"] = array($resp);
$datasource = "tranquility";


//save in session or just mark via js
if(!isset($_SESSION['finished_contracts'])){
	$_SESSION['finished_contracts']=array();
	array_push($_SESSION['finished_contracts'], $_POST["cntr"]);
}elseif (!in_array($_POST["cntr"], $_SESSION['finished_contracts'])){
	array_push($_SESSION['finished_contracts'], $_POST["cntr"]);
}


try {
    $result = $api_instance->postCharactersCharacterIdMail(charid(), $mail, $datasource, token());
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MailApi->postCharactersCharacterIdMail: ', $e->getMessage(), PHP_EOL;
}




?>