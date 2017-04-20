<?php
session_start();
require_once('SwaggerClient-php/autoload.php');
require_once('vendor/autoload.php');
require_once('provider.php');



function token_refresh()//refresh access token if expired
{

	if(unserialize($_SESSION['accesstoken-obj'])->hasExpired()){//get new access token if expired
		$newAccessToken=$provider->getAccessToken('refresh_token', [
			'refresh_token' => unserialize($_SESSION['accesstoken-obj'])->getRefreshToken()
		]);
		$_SESSION['accesstoken-obj']=serialize($newAccessToken);
		echo "access token refreshed";
	}

	//DEBUG
/*	$expires_in = unserialize($_SESSION['accesstoken-obj'])->getExpires()-time();
	echo "expires in: " . $expires_in . "<br>";
	echo "access token: " . unserialize($_SESSION['accesstoken-obj'])->getToken() . "<br>";
	echo "refresh token: " . unserialize($_SESSION['accesstoken-obj'])->getRefreshToken() . "<br>";*/
}






?>