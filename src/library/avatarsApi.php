 <!-- api Request for images -->
 <!-- This file will contain the necessary functions to make the request to the faces API. -->
 <?php

    function APIcall()
    {
        // Crear un nuevo recurso cURL
        $curl = curl_init();

        // Configurar URL y otras opciones apropiadas
        curl_setopt($curl, CURLOPT_URL, "https://uifaces.co/api");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Cache-Control: no-cache',
            'Accept: application/json',
            'X-API-KEY: 16A26AFD-D72345D7-989DDC5D-981A9E3A',
        ));

        // Capturar la URL y pasarla al navegador
        $result = curl_exec($curl);
        if (!$result) {
            die("Connection Failure");
        }
        // Cerrar el recurso cURL y liberar recursos del sistema
        curl_close($curl);
        return $result;
    }
    ?>