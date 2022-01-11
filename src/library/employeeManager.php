<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee(array $newEmployee)
{
// TODO implement it
        $employees = getEmployees();
        $newId = 1 + getNextIdentifier($employees);
        $newEmployee["id"] = $newId;
        array_push($employees, $newEmployee);
        print_r($employees);
        file_put_contents("../../resources/employees.json", json_encode($employees, JSON_PRETTY_PRINT));
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