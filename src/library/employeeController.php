<?php


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     echo $_POST['name'];

//     print_r($_GET);
//     //addEmployee($_GET);
//     //header("Location: ./dashboard.php");
// }


//require_once("./employeeManager.php");
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

if ($contentType === "application/json") {
  //Receive the RAW post data.
  $content = trim(file_get_contents("php://input"));

  $decoded = json_decode($content, true);

  
  
  //print_r($decoded);
  //return addEmployee($decoded);
  //If json_decode failed, the JSON is invalid.
  if(! is_array($decoded)) {
    echo "error 2";
  } else {
    print_r($decoded);
    echo "error";// Send error back to user.
  }
}
