
 <?php
    /**
     * *api Request for images
     *
     * *This file will contain the necessary functions to make the request to the faces API.
     * 
     * @return String  JSON  $result  Contains the result for the API request.
     * The number of objects in the array is 10 (default value setted by API)
     * 
     * cURL request info-> https://weichie.com/blog/curl-api-calls-with-php/
     */

    function APIcall()
    {
        //? initialize new curl request
        $curl = curl_init();

        //? config curl options
        curl_setopt($curl, CURLOPT_URL, "https://uifaces.co/api");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //? true => returns type array object
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Cache-Control: no-cache',
            'Accept: application/json',
            'X-API-KEY: 16A26AFD-D72345D7-989DDC5D-981A9E3A',
        ));

        //? execute curl request and save results
        $result = curl_exec($curl);
        if (!$result) {
            die("Connection Failure");
        }

        //? close curl request
        curl_close($curl);

        //? return curl request results
        return $result;
    }


    ?>