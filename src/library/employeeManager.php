<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee(array $newEmployee)
{
        $employees = getEmployees();
        $newId = 1 + getNextIdentifier($employees);
        $newEmployee["id"] = $newId;
        array_push($employees, $newEmployee);
        file_put_contents("../../resources/employees.json", json_encode($employees, JSON_PRETTY_PRINT));
        return $newEmployee;
}

function deleteEmployee(string $id)
{
    $json = file_get_contents('../../resources/employees.json');
    $data = json_decode($json, true);
    unset($json); //prevent memory leaks for large json

    $deleted = false;
        for ($i=0; $i < count($data); $i++) { 
            if(intval($id) == $data[$i]["id"] ){
                unset($data[$i]);
                $deleted = true;
                break;
            }
        }

    if($deleted){
        //This avoids a weird bug when deleting something from the middle of the array.
        $newArray =array();
        $newArray = array_merge($data,$newArray);
        //save the file
        file_put_contents('../../resources/employees.json',json_encode($newArray, JSON_PRETTY_PRINT));
        unset($data);//release memory
    }
    else{
        unset($data);//release memory
        throw new Exception("Not found");
    }
}

function updateEmployee(array $updateEmployee)
{
    $employees = getEmployees();
    $employeeKey = array_search($updateEmployee["id"], array_column($employees, "id"));
    $employees[$employeeKey] = $updateEmployee;
    $employees = array_merge($employees, array());
    file_put_contents("../../resources/employees.json", json_encode($employees, JSON_PRETTY_PRINT));
    return $updateEmployee;
}


function getEmployee(string $id)
{
    $json = file_get_contents('../resources/employees.json');
    $employees = json_decode($json,true);
    $employee = $employees[array_search($id, array_column($employees, "id"))];
    return $employee;
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
$object = array_reduce($employeesCollection, function ($x, $y) {
    return $x ? ($x["id"] > $y["id"] ? $x : $y) : $y;
  });
  return $object["id"];
}

function getEmployees()
 {
    $json = file_get_contents('../../resources/employees.json');
    $data = json_decode($json,true);
    return $data;
 }