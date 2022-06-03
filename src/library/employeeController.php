<?php 
require('./employeeManager.php');

$req = $_SERVER['REQUEST_METHOD'];

$db = getQueryStringParameters(); 
   echo json_encode($db);



if($req == 'DELETE') {
    $inputdata = file_get_contents("php://input");
    $data = json_decode($inputdata);

    deleteEmployee($data);

    
}



