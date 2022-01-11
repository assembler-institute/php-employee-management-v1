<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

//Get all employeers on file employees.json
function getEmployeers(){
    try {
        $fileName = ".././../resources/employees.json";
        if (!file_exists($fileName)) throw new Exception('File open failed');
        $content = file_get_contents($fileName);
        return json_decode($content, TRUE);
    } catch (Throwable $t) {
        // echo $t->getMessage();
    }
}

//Add a new employeer on file employees.json
function addEmployee(array $newEmployee) {
    $oldEmployee = getEmployeers();
    $arrayKey = count($oldEmployee);
    $newId = $arrayKey+ 1;
    $newEmployee["id"] = $newId;
    array_push($oldEmployee, $newEmployee);

    $fileName = ".././../resources/employees.json";

    if(file_exists($fileName)){
        file_put_contents($fileName, json_encode($oldEmployee, JSON_PRETTY_PRINT));
        header("Location: ../employee.php?newEmployeeAdded");
    }
}

//delete a one employeer on file employees.json
function deleteEmployee(string $id) {
    if(empty($id)) return;
    $oldArray = getEmployeers();
    $key = array_search($id, array_column($oldArray, 'id'));
    unset($oldArray[$key]);
    $newArray = array_merge($oldArray, array());

    $fileName = ".././../resources/employees.json";

    if(file_exists($fileName)){
        file_put_contents($fileName, json_encode($newArray, JSON_PRETTY_PRINT));
        header("Location: ../employee.php?newEmployeeAdded");
    }
}

//update a one employeer on file employees.json
function updateEmployee(array $updateEmployee) {
    $oldArray = getEmployeers();
    $id = $updateEmployee["id"];
    $key = array_search($id, array_column($oldArray, 'id'));
    $oldArray[$key] = $updateEmployee;
    $newArray = array_merge($oldArray, array());

    $fileName = ".././../resources/employees.json";

    if(file_exists($fileName)){
        file_put_contents($fileName, json_encode($newArray, JSON_PRETTY_PRINT));
    }
}

//get a one employeer on file employees.json
function getEmployee(string $id) {
    $content = file_get_contents("../resources/employees.json");
    $employees = json_decode($content);
    $key = array_search($id, array_column($employees, "id"));
    return $employees[$key];
}

function removeAvatar($id) {

}


function getQueryStringParameters(): array {

}

function getNextIdentifier(array $employeesCollection): int {

}