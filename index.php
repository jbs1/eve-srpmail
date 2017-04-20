<?php
session_start();
require_once('SwaggerClient-php/autoload.php');
require_once('vendor/autoload.php');
require_once('provider.php');
require_once('inc.php');

if(empty($_SESSION['accesstoken-obj'])){//if not logged in redirect to
	header('Location: oauth.php');
}

token_refresh();


echo "bla";




$api_instance = new Swagger\Client\Api\AllianceApi();
$datasource = "tranquility"; // string | The server name you would like data from
$user_agent = "user_agent_example"; // string | Client identifier, takes precedence over headers
$x_user_agent = "x_user_agent_example"; // string | Client identifier, takes precedence over User-Agent

// try {
//     $result = $api_instance->getAlliances($datasource, $user_agent, $x_user_agent);
//     print_r($result);
// } catch (Exception $e) {
//     echo 'Exception when calling AllianceApi->getAlliances: ', $e->getMessage(), PHP_EOL;
// }



?>
