<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

 
function addEmployee(array $newEmployee)
{
    $empleados=leerempleados();
    $lastEmployee = end($empleados);
    $newEmployee['id']=$lastEmployee->id + 1;
    array_push($empleados,  $newEmployee);
    enviarempleados($empleados);
    echo "true";
}


function deleteEmployee($id)
{
    $newEmployee=[];
    $empleados=leerempleados();
    foreach($empleados as $empleado){
        if(!($empleado->id == $id)){
            array_push($newEmployee,$empleado);
        }
    }
    enviarempleados($newEmployee);
    echo "true";
}


function updateEmployee($updateEmployee)
{
    $empleados=leerempleados();
    foreach($empleados as $empleado){
        if($empleado->id == $updateEmployee){
            foreach($empleados as $empleado2){
            $empleado->email = $_POST['email'];
            $empleado->name = $_POST["name"];
            $empleado->gender = $_POST["gender"];
            $empleado->lastName = $_POST['lastName'];
            $empleado->age = $_POST['age'];
            $empleado->city = $_POST['city'];
            $empleado->state = $_POST['state'];
            $empleado->streetAddress = $_POST['streetAddress'];
            $empleado->phoneNumber = $_POST['phoneNumber'];
            $empleado->postalCode = $_POST['postalCode'];
        }
        }
    }
    enviarempleados($empleados);
    return true;
}


function getEmployee(string $id)
{
    $file=".././../resources/employees.json";
    $Allusers= file_get_contents($file);
    $usersAll=json_decode($Allusers);
    return $usersAll;
// TODO implement it
}


function removeAvatar($id)
{
// TODO implement it
}


function getQueryStringParameters()
{
// TODO implement it array
}

function getNextIdentifier(array $employeesCollection)
{
// TODO implement it int
}

function leerempleados(){
    $file=".././../resources/employees.json";
    $Allusers= file_get_contents($file);
    $usersAll=json_decode($Allusers);
    return $usersAll;
}

function enviarempleados($content){
    $file=".././../resources/employees.json";
    $usersAll=json_encode($content);
    $Allusers= file_put_contents($file,$usersAll);
}

?>
