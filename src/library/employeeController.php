<?php
if ($_SERVER['REQUEST_METHOD']==='GET') {
if (isset($_REQUEST["edit"])) {
   $url=$uri = $_SERVER['REQUEST_URI'];
   $url_components = parse_url($url);
   parse_str($url_components['query'], $params);
   require_once("./employeeManager.php");
   getEmployee($params['edit']);
   
}
else {
    require_once("./employeeManager.php");
    $storedEmployes= getEmployeesData();
    echo json_encode($storedEmployes);
}
      
}


if ($_SERVER['REQUEST_METHOD']==='POST'){
    
$_post = json_decode(file_get_contents('php://input'),true);
if(isset($_POST['newEmployee'])){
require_once("./employeeManager.php");
addEmployee($_POST);
}

if(isset($_post['userId'])){
    
    require_once("./employeeManager.php");
    $newList=deleteEmployee($_post['userId']);
    echo json_encode($newList);
}


}
