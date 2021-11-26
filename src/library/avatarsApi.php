<?php

// Create api.php file and declare the AVATARS_API constant
define("AVATARS_API", "api-key");

// require_once("../config/api.php");

// Uncomment the "extension=curl" in php.ini
// This is required to use curl functions.

function getAvatars()
{
	$curlHandler = curl_init('https://uifaces.co/api/');

	curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curlHandler, CURLOPT_HTTPHEADER, array(
		'Header-Key: Header-Value', 'X-API-KEY: ' . AVATARS_API
	));

	$response = curl_exec($curlHandler);
	curl_close($curlHandler);

	if ($response === false) {
		return null;
	}

	return json_decode($response, true);
}
