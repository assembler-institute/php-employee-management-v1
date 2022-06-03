<?php 
require('./employeeManager.php');

$req = $_SERVER['REQUEST_METHOD'];

// $db = getQueryStringParameters(); 
//    echo json_encode($db);



if($req == 'GET') {
    $inputdata = file_get_contents("php://input");
    echo $inputdata;
    $newDb = deleteEmployee($inputdata);
    echo $newDb;
}



