<?php
$method = $_SERVER['REQUEST_METHOD'];
  if($method == "GET" ) {
  $jsonEmployees = file_get_contents("../../resources/employees.json");
  $result = json_decode($jsonEmployees, true);
  echo $jsonEmployees;
  // $employeeName = $result["users"][0]["email"];
  // $employeeLastName = $result["users"][0]["password"];

  }



