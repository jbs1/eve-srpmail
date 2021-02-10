<?php
function setup_token()//setup access token in swagger config
{
	global $provider;
	global $config;

	if (!empty($_SESSION['rftoken'])) {
		$accessToken = $provider->getAccessToken('refresh_token', ['refresh_token' => $_SESSION['rftoken']]);
		$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken($accessToken->getToken());
	}
}


function charid(){
	return $_SESSION['charinfo']['CharacterID'];
}

function corpid(){
	return $_SESSION['charinfo']['CorporationID'];
}

function getcorpid($charid){
	global $config;
	$api_instance = new Swagger\Client\Api\CharacterApi(null,$config);
	try {
	    $char = $api_instance->getCharactersCharacterId($charid);
	    return $char['corporation_id'];
	} catch (Exception $e) {
	    echo 'Exception: ', $e->getMessage(), PHP_EOL;
	}
}


?>