<?php

include_once ('./employeeManager.php');

function before ($xid, $inthat){
  return substr($inthat, 0, strpos($inthat, $xid));
};

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET'){
  echo file_get_contents('../../resources/employees.json');
}

if(isset($_GET["form"]) && $method == 'POST'){
  $idvalue = $_GET["form"];
  $array = $_REQUEST;
  //unset($array["form"]);
  if (!isset($array['gender'])) {
    $array['gender'] = "";
  }
  if (!isset($array['lastName'])) {
    $array['lastName'] = "";
  }
  $array["id"] = $idvalue;
  updateEmployee($array);
};

if($method == 'POST' && !isset($_GET["form"])){
  addEmployee($_REQUEST);
};
if($method == 'DELETE'){
  $_delete = file_get_contents('php://input');
  parse_str($_delete, $arrayVar);
  $idToDelete = $arrayVar["id"];
  strval($idToDelete);
  deleteEmployee($idToDelete);
}
if($method == 'PUT'){
  parse_str(file_get_contents("php://input"), $put_vars);
  updateEmployee($put_vars);
}
