<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */



function addEmployee($employeeData)
{
//Get all employees from Json file    
$stored_employees = getEmployeesData();
//Structure new employee with recived data
$newEmployee =createNewEmployeeArray($employeeData);
//Add new emplye to the Json array
$stored_employees[]=$newEmployee;
//Encode the new employees data 
$new_employees_list = json_encode($stored_employees);
//Update json file
updateEmployee($new_employees_list);
//redirect to dashboard
header("Location: ../dashboard.php");
}

function createNewEmployeeArray($employeeData){
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
return $newEmployee;
}


function getAllId(){
    $stored_employees = getEmployeesData();
    $employeesId= array();
    foreach ($stored_employees as $key => $value) {
       array_push($employeesId,$value['id']);
    }
    return $employeesId;
}
//Global variables
$i=1;
$employeesId= getAllId();
function addId(){
    if (in_array($GLOBALS['i'], $GLOBALS['employeesId'])) {
        $GLOBALS['i']++;
        addId();
    }
    return $GLOBALS['i'];       
}



function deleteEmployee($id)
{
    
//Read json data
 $storedEmployes = "../../resources/employees.json";
 //Decode Json data
$stored_employees = json_decode(file_get_contents($storedEmployes));
foreach($stored_employees as $key => $value) {
if($value->id==$id){
  unset($stored_employees[$key]);
  updateEmployee(json_encode($stored_employees));
 }
 }
$data=getEmployeesData();
return $data;
}



function updateEmployee($updateEmployee)
{
//Read json data
$storedEmployes = "../../resources/employees.json";
//Send json data
file_put_contents($storedEmployes, $updateEmployee);
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


