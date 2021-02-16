<?php

if(isset($_POST['counter'])) {
    $id = $_POST['counter'];
    $id -= 1;
    $data = file_get_contents('../../resources/employees.json');
    $dataArray = json_decode($data);
    //print_r($dataArray);
    
    array_splice($dataArray, $id, 1);
    
    
    $json = json_encode($dataArray);
    
    file_put_contents('../../resources/employees.json', $json);
    print_r($json);
  }
  