<?php

include "./employeeManager.php";

switch ($_SERVER["REQUEST_METHOD"]) {
  case "GET":
    $result = getEmployees();
    break;
}


header("Content-Type: application/json");
echo json_encode($result);
