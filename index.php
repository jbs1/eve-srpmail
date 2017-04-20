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

if(empty($_SESSION['accesstoken-obj'])){
	header('Location: oauth.php');
}

if(unserialize($_SESSION['accesstoken-obj'])->hasExpired()){//get new access token if expired
	$newAccessToken=$provider->getAccessToken('refresh_token', [
        'refresh_token' => unserialize($_SESSION['accesstoken-obj'])->getRefreshToken()
    ]);
    $_SESSION['accesstoken-obj']=serialize($newAccessToken);
    echo "access token refreshed";
}

header("refresh: 6");
$expires_in = unserialize($_SESSION['accesstoken-obj'])->getExpires()-time();
echo "expires in: " . $expires_in . "<br>";
echo "access token: " . unserialize($_SESSION['accesstoken-obj'])->getToken() . "<br>";
echo "refresh token: " . unserialize($_SESSION['accesstoken-obj'])->getRefreshToken() . "<br>";
?>
