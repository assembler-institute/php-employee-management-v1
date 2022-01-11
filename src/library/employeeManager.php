<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */
// zz
function addEmployee()
{

// TODO implement it (array $newEmployee)
    $file = "C:/xampp/htdocs/PHP/php-employee-management-v1/resources/employees.json";
    $Allusers = file_get_contents($file);
    $usersAll = json_decode($Allusers);
    foreach ($usersAll as $user ) {
        $arraya[] =$user -> id;
    }
    $newid= max($arraya) + 1;
    if($_POST['radio'] ==  null){
        $radiocheck = ' ';
    }else{
        $radiocheck = $_POST['radio'];
    }

    if($_POST['lastName'] == null){
        $lastName = ' ';
    }else{
        $lastName = $_POST['lastName'];
    };


    $myJson = array(
        'id'   =>   $newid,
        'name'   =>   $_POST['name'],
        'lastName'   =>  $lastName,
        'email'   =>  $_POST['email'],
        'gender'   =>   $radiocheck,
        'age'   =>  intval ($_POST['age']),
        'streetAddress'   =>   $_POST['streetAddress'],
        'city'   =>  $_POST['city'],
        'state'   =>  $_POST['state'],
        'postalCode'   =>   $_POST['postalCode'],
        'phoneNumber'   =>  $_POST['phoneNumber']
    );


    array_push($usersAll, $myJson);
    $otra = json_encode($usersAll);
    file_put_contents($file, $otra);

};


function deleteEmployee(string $id)
{
// TODO implement it
}


function updateEmployee(array $updateEmployee)
{
// TODO implement it
// echo "pepe";
// print_r($updateEmployee);
// if()
// echo($updateEmployee["id"]);
$file="../../resources/employees.json";

$Allusers= file_get_contents($file);
$usersAll1= json_decode($Allusers);
// print_r($usersAll1[0]);
// print_r(array("1",$usersAll1));

foreach ($usersAll1 as $user ) {
    if($user -> id == $updateEmployee["id"]){
        $user= $updateEmployee;
        // $user -> name = $updateEmployee["name"];
        // print_r($updateEmployee["name"]);
        // echo $updateEmployee["name"];
        // echo $user -> name ;
        // print_r($user);
        // print_r($updateEmployee);
        // $user = $updateEmployee;
        // print_r($user);
    }
    $customers[] = $user;
    // print_r($user);
}
$newinfo= json_encode($customers);
file_put_contents($file, $newinfo);
// print_r($customers);
// print_r($usersAll1);
}


function getEmployee(string $id)
{
// TODO implement it
// echo $id;
$file="./../resources/employees.json";
$Allusers= file_get_contents($file);
$usersAll1= json_decode($Allusers);
// print_r($usersAll1[0]);
// print_r(max(array($usersAll1)));
foreach ($usersAll1 as $user ) {
    // echo $user -> id;
    // $arraya[] =$user -> id;
    // print_r($array);
    if( $id == $user -> id){
        // echo $user -> id;
        define("name",$user -> name );
        define("nmeLast",$user -> lastName);
        define("email",$user -> email);
        define("gender",$user -> gender);
        define("streetAdress",$user -> streetAddress);
        define("city",$user -> city);
        define("postalCode",$user -> postalCode);
        define("phoneNumber",$user -> phoneNumber);
        define("age",$user -> age);
        define("state",$user -> state);
    }
}
// $newid= max($arraya) + 1;

}


function removeAvatar($id)
{
// TODO implement it
}

function jsonEncode(){
    $file = "C:/xampp/htdocs/PHP/php-employee-management-v1/resources/employees.json";
    $Allusers = file_get_contents($file);
    $usersAll = json_decode($Allusers);
    return $usersAll;
}
// function getQueryStringParameters(): array
// {
// // TODO implement it
// }

// function getNextIdentifier(array $employeesCollection): int
// {
// // TODO implement it
// }

