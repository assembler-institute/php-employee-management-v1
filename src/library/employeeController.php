<?php
function getData(){
    $json_data = file_get_contents('../../resources/employees.json');
    echo $json_data;
}

