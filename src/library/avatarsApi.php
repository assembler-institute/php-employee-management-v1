<?php

function getAvatarsAPI() {
    // Crea un nuevo recurso cURL
    $request = curl_init( "https://uifaces.co/api");

    // Establece la URL y otras opciones apropiadas
    $apiKey = '475EDD0B-27214903-8DC8146F-729152E7';
    $headers = array(
        'Authorization: '.$apiKey
    );

    curl_setopt($request,CURLOPT_HTTPHEADER, $headers);

    // Captura la URL y la envía al navegador
    $response = curl_exec($request);

    // Cierrar el recurso cURL y libera recursos del sistema
    curl_close($request);

    return json_decode($response);
}