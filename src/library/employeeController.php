<?php
function getData(){
    $json_data = file_get_contents('../../resources/employees.json');
    echo $json_data;
}

// $data = json_decode($json_data, TRUE);
// print_r($data);
