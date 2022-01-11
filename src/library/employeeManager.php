<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

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

function addEmployee(array $newEmployee)
{

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


function deleteEmployee(string $id)
{
$oldArray = getEmployeers();
$key = array_search($id, array_column($oldArray, 'id'));
print_r($key);
unset($oldArray[$key]);
$newArray = array();
$newArray = array_merge($oldArray, $newArray);



$fileName = ".././../resources/employees.json";
file_put_contents($fileName, json_encode($newArray));
}


function updateEmployee(array $updateEmployee)
{
    $oldArray = getEmployeers();
    $id = $updateEmployee["id"];
    $key = array_search($id, array_column($oldArray, 'id'));
    $oldArray[$key] = $updateEmployee;

    $newArray = array();
$newArray = array_merge($oldArray, $newArray);



$fileName = ".././../resources/employees.json";
file_put_contents($fileName, json_encode($newArray));

}


function getEmployee(string $id)
{
// TODO implement it
    $oldArray = getEmployeers();
    return $oldArray;
    // $key = array_search((int)$id, array_column($oldArray, 'id'));
}


function removeAvatar($id)
{
// TODO implement it
}


function getQueryStringParameters(): array
{
// TODO implement it
}

function getNextIdentifier(array $employeesCollection): int
{
// TODO implement it
}
