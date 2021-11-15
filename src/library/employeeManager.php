<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

function addEmployee(array $newEmployee)
{
    $employeesCollection = json_decode(file_get_contents('../../resources/employees.json'), true); //convierte a varible de php (array)
    $newEmployee['id'] = intval($newEmployee['id']);
    $newEmployee['age'] = intval($newEmployee['age']);

    if (!isset($newEmployee['gender'])) {
        $newEmployee['gender'] = "";
    }
    if (!isset($newEmployee['lastName'])) {
        $newEmployee['lastName'] = "";
    }

    array_push($employeesCollection, $newEmployee);

    file_put_contents('../../resources/employees.json', json_encode($employeesCollection, JSON_PRETTY_PRINT));

    if (isset($_POST['lastname'])) {
        header('Location: ../dashboard.php');
    } else {
        return true;
    }

}

function deleteEmployee(string $id)
{
    $ids = 1;
    $employeesCollection = json_decode(file_get_contents('../../resources/employees.json'), true); //convierte a varible de php (array)

    foreach ($employeesCollection as $index => $employee) {
        
        if ($employee['id'] == $id) {
            array_splice($employeesCollection,$index,1);
            //var_dump($employee['id'],$id);
         }  else {
            $employee['id'] = $ids;
            $backup = $employee;
            array_splice($employeesCollection,$index,1);
            $employeesCollection[$index] = $backup;
            $ids++;
        } 
        
    }
    $array = array_values($employeesCollection);
     
    file_put_contents('../../resources/employees.json', json_encode($array, JSON_PRETTY_PRINT));
    return true;
}

function updateEmployee(array $updateEmployee)
{
    $employeesCollection = json_decode(file_get_contents('../../resources/employees.json'), true); //convierte a varible de php (array)

    foreach ($employeesCollection as $index => $employee) {

        if ($employee['id'] == $updateEmployee['id']) {
            $employeesCollection[$index] = $updateEmployee;

        }
    }
    //die();

    file_put_contents('../../resources/employees.json', json_encode($employeesCollection, JSON_PRETTY_PRINT));
    return true;
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

    return [];
}

function getNextIdentifier(array $employeesCollection): int
{
    return count($employeesCollection) + 1;
}
