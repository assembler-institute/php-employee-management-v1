<?php


require_once('./employeeManager.php');

$_POST = json_decode(file_get_contents('php://input', true), true);

if (isset($_POST['action']) && isset($_POST['item'])) {

  switch ($_POST['action']) {
    case 'delete':
      $response = deleteEmployee($_POST['item']['id']);

      echo json_encode($response[1]);

      break;

    case 'create':
      $respone = addEmployee($_POST['item']);

      echo json_encode($response[1]);


      break;
  }

  //echo json_encode('Data recibida');
}



/*
$name = $_POST["name"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$age = $_POST["age"];
$phone = $_POST["phoneNumber"];
$city = $_POST["city"];
$street = $_POST["streetAddress"];
$state = $_POST["state"];
$zipCode = $_POST["zipCode"];
*/