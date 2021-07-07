<?php
require("./employeeManager.php");
$method = $_SERVER['REQUEST_METHOD'];

header("Content-Type: application/json");

// switch ($method) {
//   case "GET":
//     getAllEmployees();
// }

if($method == 'POST') {
  // var_dump($_POST);
  $newEmployee = $_POST;
  echo addEmployee($newEmployee);
}

// $query = "INSERT INTO sample_data (first_name, last_name) VALUES (:first_name, :last_name)";
// $statement = $connect->prepare($query);
// $statement->execute($data);
//   // addEmployee(array $newEmployee)
// }

?>