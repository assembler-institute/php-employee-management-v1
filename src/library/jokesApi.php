
<?php

    function getProgrammingJoke() {
        $curl = curl_init("https://official-joke-api.appspot.com/jokes/programming/random");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        $data = curl_exec($curl);
        curl_close($curl);
        return json_decode($data,true)[0];
    }
?>