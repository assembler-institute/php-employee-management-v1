<?php

function getAvatarsAPI() {
    // Crea un nuevo recurso cURL
    $request = curl_init( "https://faceapi.herokuapp.com/faces");

    // Captura la URL y la envía al navegador
    curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($request);
    // Cierrar el recurso cURL y libera recursos del sistema
    curl_close($request);

    return json_decode($response, true);
}

function getIndex($start, $end){
    $avatars = getAvatarsAPI();
    $selectedFaces = array_slice($avatars, $start, $end);
    return array_merge($selectedFaces, array());
}