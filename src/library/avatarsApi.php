<?php

// UI Faces KEY: A5CD0639-1EA74339-838676BE-5B902E21

function curlQuery($request, $headers)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $request);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);

    if ($e = curl_error($curl)) {
        curl_close($curl);
        return $e;
    } else {
        curl_close($curl);
        return json_decode($response, true);
    }
}

function getEmployeePhotos(int $number)
{
    $request = 'https://uifaces.co/api?limit=' . "$number";
    $key = 'A5CD0639-1EA74339-838676BE-5B902E21';
    $headers = array(
        "Cache-Control:no-cache",
        "Accept:application/json",
        "X-API-KEY:" . $key,
    );

    $response = curlQuery($request, $headers);
    $images = [];
    foreach ($response  as $value) {
        if (isset($value['photo'])) $images[] = $value['photo'];
    }
    return $images;
}
