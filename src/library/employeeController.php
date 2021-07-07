<?php
require("./employeeManager.php");
$method = $_SERVER['REQUEST_METHOD'];

header("Content-Type: application/json");

if($method == 'POST') {
  var_dump($_POST);
  $newEmployee = $_POST;
  var_dump(addEmployee($newEmployee));
}

// $query = "INSERT INTO sample_data (first_name, last_name) VALUES (:first_name, :last_name)";
// $statement = $connect->prepare($query);
// $statement->execute($data);
//   // addEmployee(array $newEmployee)
// }

?>