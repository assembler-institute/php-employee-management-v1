<?php
require_once __DIR__ . "/employeeManager.php";
if (!isset($_SESSION)) {
  session_start();
}

switch ($_SERVER["REQUEST_METHOD"]) {
  case "GET":
    if (isset($_GET["getAllEmployees"])) {
      header("Content-Type: application/json");
      echo json_encode(getEmployees());
    }
    break;
  case "DELETE":
    parse_str(file_get_contents("php://input"), $_DELETE);
    deleteEmployee($_DELETE["id"]);
    break;
}

if (isset($_POST["submitEmployee"])) {
  if (isset($_GET["id"])) {
    updateEmployee_on_data_base($_GET["id"]);
  } else {
    createNewEmployee_on_data_base($id = "");
  }
}

function findUserToUpdate_on_data_base($id)
{
  $foundEmployee = getEmployee($id);
  return $foundEmployee;
}

function updateEmployee_on_data_base($id)
{
  $updatedEmployee = getDataFromForm($id);
	if(updateEmployee($updatedEmployee) == true){
		header("Location: ../dashboard.php");
	} else {
		echo "salió mal";
	};
}

function createNewEmployee_on_data_base($id)
{
  $newEmployeeData = getDataFromForm($id);
	if(addEmployee($newEmployeeData) == true){
		header("Location: ../dashboard.php");
	} else {
		echo "salió mal";
	};
}

function getDataFromForm($id)
{
  $name = $_POST["name"];
  $email = $_POST["email"];
  $city = $_POST["city"];
  $state = $_POST["state"];
  $postalCode = $_POST["postalCode"];
  $LastName = $_POST["LastName"];
  $gender = $_POST["gender"];
  $streetAddress = $_POST["streetAddress"];
  $age = $_POST["age"];
  $phoneNumber = $_POST["phoneNumber"];

	if ($id == "") {
		$id = getLastIdFromEmployees();
	}

  $newArray_from_user = [
    "id" => $id,
    "name" => $name,
    "lastName" => $LastName,
    "email" => $email,
    "gender" => $gender,
    "city" => $city,
    "streetAddress" => $streetAddress,
    "state" => $state,
    "age" => $age,
    "postalCode" => $postalCode,
    "phoneNumber" => $phoneNumber,
  ];

  return $newArray_from_user;
}
