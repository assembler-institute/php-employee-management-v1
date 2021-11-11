<?php

require_once('./loginManager.php');

$_POST = json_decode(file_get_contents('php://input', true), true);

if (isset($_POST['action']) && isset($_POST['item'])) {

  switch ($_POST['action']) {
    case 'delete':
      deleteEntryById($_POST['item']['id']);
    break;

    case 'create':
      # code...
    break;
  }

  //echo json_encode('Data recibida');
}

function deleteEntryById($id) {

  // Verify the file path exist
  $jsonPath = '../../resources/employees.json';
  if (!file_exists($jsonPath)) die('Invalid path');

  // Get JSON and update it
  $jsonArray = getJson($jsonPath);
  $newJson = [];
  foreach($jsonArray as $entry) {
    if ($entry['id'] !== $id) {
      $newJson[] = $entry;
    }
  }

  if (!file_put_contents($jsonPath, json_encode($newJson, JSON_PRETTY_PRINT))) {
    die('Failed to save data into json file.');
  }

  echo json_encode('Updated succesfully!');
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