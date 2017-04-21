<?php
session_start();
require_once('SwaggerClient-php/autoload.php');
require_once('vendor/autoload.php');
require_once('provider.php');
require_once('inc.php');

if(empty($_SESSION['accesstoken-obj'])){//if not logged in redirect to
	header('Location: oauth.php');
} else {
	token_refresh();
	Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken(token());
}


echo "<!DOCTYPE html>\n<html>\n<head>\n";

echo'
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
';

echo "<title>srp mail</title>\n</head>\n<body>\n";


echo "</body>\n</html>\n";



// $api_instance = new Swagger\Client\Api\MailApi();
// $datasource = "tranquility"; // string | The server name you would like data from


// try {
//     $result = $api_instance->getCharactersCharacterIdMail(charid());
//     print_r($result);
// } catch (Exception $e) {
//     echo 'Exception: ', $e->getMessage(), PHP_EOL;
// }



?>
