<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function getEmployeers(): array {
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
//print_r($newEmployee);
$id = array ("id" => $newId);
array_push($oldEmployee, $newEmployee);
array_push($oldEmployee["$arrayKey"], $id["id"]);

$oldEmployee["$arrayKey"]["id"] = $oldEmployee["$arrayKey"][0];
unset($oldEmployee["$arrayKey"][0]);
echo "<br>";
//print_r($oldEmployee);


$fileName = ".././../resources/employees.json";

if(file_exists($fileName)){
    file_put_contents($fileName, json_encode($oldEmployee));
    header("Location: ../employee.php?newEmployeeAdded");
}
}


function deleteEmployee(string $id)
{
// TODO implement it
}


function updateEmployee(array $updateEmployee)
{
// TODO implement it
}


function getEmployee(string $id)
{
// TODO implement it
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
