<?php
session_start();
require_once('SwaggerClient-php/autoload.php');
require_once('vendor/autoload.php');
require_once('provider.php');


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

// print_r(unserialize($_SESSION['accesstoken-obj'])->getToken());
// print_r($_SESSION);

if(empty($_SESSION['accesstoken-obj'])){
	header('Location: oauth.php');
}



function refresh()
{
$existingAccessToken = getAccessTokenFromYourDataStore();

if ($existingAccessToken->hasExpired()) {
    $newAccessToken = $provider->getAccessToken('refresh_token', [
        'refresh_token' => $existingAccessToken->getRefreshToken()
    ]);

    // Purge old access token and store new access token to your data store.
}
}





?>
