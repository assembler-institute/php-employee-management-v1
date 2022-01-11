<?php

include_once ('./employeeManager.php');

function before ($xid, $inthat){
  return substr($inthat, 0, strpos($inthat, $xid));
};

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'POST'){
  addEmployee($_REQUEST);
};
if($method == 'DELETE'){
  $_delete = file_get_contents('php://input');
  $delete = before("&", $_delete);
  $delete = substr($delete, 3);
  deleteEmployee($delete);
}
