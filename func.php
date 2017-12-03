<?php
function token_refresh()//refresh access token if expired
{
	global $provider;
	global $config;
	if(isset($_SESSION['accesstoken-obj'])&&unserialize($_SESSION['accesstoken-obj'])->hasExpired()){//get new access token if expired
		$newAccessToken=$provider->getAccessToken('refresh_token', [
			'refresh_token' => unserialize($_SESSION['accesstoken-obj'])->getRefreshToken()
		]);
		$_SESSION['accesstoken-obj']=serialize($newAccessToken);
	} elseif(isset($_SESSION['accesstoken-obj'])) {
		$config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken(token());
	}
}

function token(){
	return unserialize($_SESSION['accesstoken-obj'])->getToken();
}

function charid(){
	return $_SESSION['charinfo']['CharacterID'];
}

function corpid($charid){
	global $config;
	$api_instance = new Swagger\Client\Api\CharacterApi(null,$config);
	try {
	    $char = $api_instance->getCharactersCharacterId($charid);
	    return $char['corporation_id'];
	} catch (Exception $e) {
	    echo 'Exception: ', $e->getMessage(), PHP_EOL;
	}
}

function getcontract($charid,$token){
	$url="https://api.eveonline.com/char/Contracts.xml.aspx?characterID=".$charid."&accessToken=".$token;
	$ch=curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FAILONERROR,1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	$raw=curl_exec($ch);
	curl_close($ch);
	return simplexml_load_string($raw);
}

?>