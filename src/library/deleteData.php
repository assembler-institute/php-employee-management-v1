<?php
session_start();

$employeesJsonFile = "./../../resources/employees.json";

// read and decode json file
if(file_exists($employeesJsonFile)) {
    $jsonData = file_get_contents($employeesJsonFile);
    $employeesData = json_decode($jsonData, true);
}

// get array index to delete
$array_index = array();
foreach ($employeesData as $key => $value) {
    if ($value["id"] == $_GET["id"]) {
        $array_index[] = $key;
    }
}

// delete data
foreach ($array_index as $i) {
    unset($employeesData[$i]);
}

// rebase array
$employeesData = array_values($employeesData);

// Convert employees data to Json
$jsonData = json_encode($employeesData, JSON_PRETTY_PRINT);

// Save employees data to "resources/employees.json"
file_put_contents($employeesJsonFile, $jsonData);

$_SESSION["message"] = "DeleteEmployee";

header("Location: ./../dashboard.php?delete");
exit();
