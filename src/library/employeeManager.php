<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */

    //Read json data
    $storedEmployes = "../../resources/employees.json";
    //Decode Json data
    $stored_employees = json_decode(file_get_contents($storedEmployes), true);
    $employeesId= array();
    $i=1;
    foreach ($stored_employees as $key => $value) {
       array_push($employeesId,$value['id']);
    }
   


function addEmployee($employeeData)
{
//Read json data
$storedEmployes = "../../resources/employees.json";
//Decode Json data
$stored_employees = json_decode(file_get_contents($storedEmployes), true);
$id=addId();
$newEmployee= array(
    'id'=> $id,
    "name"=>$employeeData['name'],
    "lastName"=>$employeeData['lastName'],
    "email"=>$employeeData['email'],
    "gender"=>$employeeData['gender'],
    "age"=>$employeeData['age'],
    "streetAddress"=>$employeeData['streetAddress'],
    "city"=>$employeeData['city'],
    "state"=>$employeeData['state'],
    "postalCode"=>$employeeData['postalCode'],
    "phoneNumber"=>$employeeData['phoneNumber'],
);

$stored_employees[]=$newEmployee;
$new_employees_list = json_encode($stored_employees);
file_put_contents($storedEmployes, $new_employees_list);


// TODO implement it


header("Location: ../dashboard.php");
}
    function addId(){
        if (in_array($GLOBALS['i'], $GLOBALS['employeesId'])) {
            $GLOBALS['i']++;
            addId();
        }
      return $GLOBALS['i'];       
    }




function deleteEmployee(string $id)
{
    //Read json data
    $storedEmployes = "../../resources/employees.json";
    //Decode Json data
    $stored_employees = json_decode(file_get_contents($storedEmployes), true);
// TODO implement it
$i=0;
foreach($stored_employees as $element) {
   //check the property of every element
   if(){
      unset($stored_employees[$i]);
   }
   $i++;
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
}
function getEmployeesData(){
    //Read json data
    $storedEmployes = "../../resources/employees.json";
    //Decode Json data
    $stored_employees = json_decode(file_get_contents($storedEmployes), true);
    return $stored_employees;
}
