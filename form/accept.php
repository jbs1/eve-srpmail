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
$mail["body"] = $_POST["body"];
$mail["recipients"] = $resp;
$datasource = "tranquility";
echo charid();
echo $mail;
echo  $datasource;
echo  token();


// try {
//     $result = $api_instance->postCharactersCharacterIdMail(charid(), $mail, $datasource, token());
//     print_r($result);
// } catch (Exception $e) {
//     echo 'Exception when calling MailApi->postCharactersCharacterIdMail: ', $e->getMessage(), PHP_EOL;
// }




?>