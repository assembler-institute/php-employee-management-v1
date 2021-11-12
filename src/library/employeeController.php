<?php

require_once('./employeeManager.php');

$_POST = json_decode(file_get_contents('php://input', true), true);

if (isset($_POST['action']) && isset($_POST['item'])) {

  switch ($_POST['action']) {
    case 'delete':
      $response = deleteEmployee($_POST['item']['id']);
      echo json_encode($response);

      break;

    case 'create':
      $response = addEmployee($_POST['item']);
      echo json_encode($response);

      break;

    case 'update':
      $response = updateEmployee($_POST["item"]);
      echo json_encode($response);

      break;
  }

  //echo json_encode('Data recibida');
}
