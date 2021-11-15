<?php

require_once("../config/api.php");

function getAvatars()
{
	$curlHandler = curl_init('https://uifaces.co/api/');

	curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curlHandler, CURLOPT_HTTPHEADER, array(
		'Header-Key: Header-Value', 'X-API-KEY: ' . AVATARS_API
	));

	$response = curl_exec($curlHandler);
	curl_close($curlHandler);

	if ($response === false && session_status() === PHP_SESSION_ACTIVE) {
		setSessionValue("danger", 'Curl error: ' . curl_error($curlHandler));
		exit();
	}

	return json_decode($response, true);
}
