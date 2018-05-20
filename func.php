<?php
function token_refresh()//refresh access token if expired
{
	global $provider;
	global $config;
	if(isset($_SESSION['token'])&&unserialize($_SESSION['token'])->hasExpired()){//get new access token if expired
		$newAccessToken=$provider->getAccessToken('refresh_token', [
			'refresh_token' => unserialize($_SESSION['token'])->getRefreshToken()
		]);
		$_SESSION['token']=serialize($newAccessToken);
	} elseif(isset($_SESSION['token'])) {
		$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken(token());
	}
}

function token(){
	return unserialize($_SESSION['token'])->getToken();
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