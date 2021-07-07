<?php

require_once __DIR__ . "/employeeManager.php";

switch ($_SERVER["REQUEST_METHOD"]) {
  case "GET":
    if (isset($_GET["getAllEmployees"])) {
      header("Content-Type: application/json");
      echo json_encode(getEmployees());
    }
}

if (isset($_POST["submitEmployee"])) {
  if (isset($_GET["id"])) {
    updateEmployee_on_data_base($_GET["id"]);
  } else {
    createNewEmployee_on_data_base();
  }
}

function findUserToUpdate_on_data_base($id)
{
  $foundEmployee = getEmployee($id);
  return $foundEmployee;
}

function updateEmployee_on_data_base($id)
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

  echo $name;
  // $data = getDataFromForm();
  // echo $data;
}

function createNewEmployee_on_data_base()
{
  // $data = getDataFromForm();
  echo "hola";
}

function getDataFromForm()
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

  // $newId = getLastIdFromEmployees();

  // return $newId;

  $newArray_from_user = [
    "id" => "",
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

  // return $newArray_from_user;
}
