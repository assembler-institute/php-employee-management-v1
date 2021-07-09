<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */
session_start();

function getAllEmployees($path) {
  $data = file_get_contents($path);
  $data = json_decode($data, true);
  return $data;
}

function addEmployee(array $newEmployee)
{
  $path = "../../resources/employees.json";
  $allEmployees = getAllEmployees($path);
  $lastId = getNextIdentifier($allEmployees);
  $newEmployee["id"] = $lastId + 1;
  if (isset($newEmployee["gender"])) {
    $gender = $newEmployee["gender"];
    for ($i=0;$i<count($gender);$i++){ 
      $genderPost = $gender[$i]; 
    }
    $newEmployee["gender"] = $genderPost;
  }
  $allEmployees[] = $newEmployee; 
  file_put_contents("../../resources/employees.json", json_encode($allEmployees));
  return $newEmployee;
}

function deleteEmployee($id)
{
  $path = "../../resources/employees.json";
  $allEmployees = getAllEmployees($path);
  foreach($allEmployees as $key => $value) {
    if ($value['id'] == $id) {
      $employeeToDelete = $key;
    }
  }
  unset($allEmployees[$employeeToDelete]);
  $allEmployees = array_values($allEmployees);
  file_put_contents("../../resources/employees.json", json_encode($allEmployees));
  return $employeeToDelete;
}


function updateEmployee(array $updateEmployee)
{
  $json = file_get_contents("../../resources/employees.json"); 
  $json = json_decode($json, true);
  $gender=$_POST["gender"];
  for ($i=0;$i<count($gender);$i++){ 
    $genderPost = $gender[$i]; 
  } 
  // print_r($genderPost);
  $employeeUpdate = array(
    'name' => $_POST['name'],
    'lastName' => $_POST['lastName'],
    'email' => $_POST['email'],
    'gender' => $genderPost,
    'city' => $_POST['city'],
    'streetAddress' =>  $_POST['streetAddress'],
    'state' => $_POST['state'],
    'age' => $_POST['age'],
    'postalCode' => $_POST['postalCode'],
    'phoneNumber' => $_POST['phoneNumber']
  );
  print_r($employeeUpdate);
  $result = array();

  foreach($json as $key) {
    if ($key['id'] === $_SESSION['employeeUpdate']['id']) {
       $employeeUpdate['id'] = $_SESSION['employeeUpdate']['id'];
       $key = $employeeUpdate;
       $_SESSION['employeeUpdate'] = $key;
    }
    array_push($result, $key);
  }
  $fileOpen = fopen("../../resources/employees.json", "w");
  fwrite($fileOpen, json_encode($result));
  fclose($fileOpen);
  //unset($_SESSION['employeeUpdate']);
  
  //print_r($_SESSION['employeeUpdate']);
  header("Location: ../employee.php?okUpdate=true");
}


function getEmployee(string $id)
{

  $json = file_get_contents("../../resources/employees.json"); 
  $json = json_decode($json, true);
  foreach($json as $key => $value) {
    if ($value['id'] == $id) {
      if(!isset($value['lastName'])){
        $value['lastName']="";
      }
      if(!isset($value['gender'])){
        $value['gender']="";
      }
      var_dump($value);
      $_SESSION['employeeUpdate'] = $value;
      header("Location: ../employee.php");
    }
  }
}


function removeAvatar($id)
{
// TODO implement it
}


// function getQueryStringParameters(): array
// {
// // TODO implement it
// }

function getNextIdentifier(array $employeesCollection) 
{   
  $object = array_reduce($employeesCollection, function ($a, $b) {
    return $a ? ($a["id"] > $b["id"] ? $a : $b) : $b;
  });
  return $object["id"];
}
