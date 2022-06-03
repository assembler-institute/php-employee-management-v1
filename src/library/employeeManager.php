<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */


function addEmployee(array $newEmployee){

    //Decoding the json file
    $data = json_decode(file_get_contents('../../resources/employees.json'), true);

    //Setting the id of the new employeer
    $newEmployee["id"] = count($data)+1;

    //Adding the new empployeer to $data array(POST)
    array_push($data, (object)$newEmployee);

    //Open the json
    $the_file = fopen("../../resources/employees.json","wb");

    //Writting the json file with the new employeer
    fwrite($the_file, json_encode($data, JSON_THROW_ON_ERROR));

    //Close the json file
    fclose($the_file);

    //Returning the info
    echo json_encode($data) ;

    //Redirect to dashboard
    header("Location: ../dashboard.php");
}


function deleteEmployee(string $id)
{
// TODO implement it

    $data = json_decode(file_get_contents('../../resources/employees.json'), true);
    array_splice($data, $id-1, 1);
    $data = updateIdentifiers($data);

    //Open the json
    $the_file = fopen("../../resources/employees.json","wb");

    //Writting the json file with the new employeer
    fwrite($the_file, json_encode($data, JSON_THROW_ON_ERROR));

    //Close the json file
    fclose($the_file);

    //Returning the info
    echo json_encode($data) ;

    //Redirect to dashboard
    header("Location: ../dashboard.php");

    echo json_encode($data);
}

function updateIdentifiers(array $employees):array
{
    $i = 1;
    foreach($employees as $employee){
        $employee["id"] = $i;
        $employees[$i-1] = $employee;
        $i++;
    }
    return $employees;
}


function updateEmployee(array $updateEmployee)
{
// TODO implement it
}


function getEmployee(string $id){

    $data = json_decode(file_get_contents('../../resources/employees.json'), true);
    $data = $data[$id-1];

    echo $data;
    header ("Location: ../employee.php");
}


function removeAvatar($id)
{
// TODO implement it
}


function getQueryStringParameters()
{
    $data = json_decode(file_get_contents('../../resources/employees.json'), true);
    echo json_encode($data);

}



function getNextIdentifier(array $employeesCollection): int
{
// TODO implement it
}
