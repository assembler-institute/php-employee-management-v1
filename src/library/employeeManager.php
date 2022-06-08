<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */


function addEmployee(array $newEmployee){

    $_SESSION["userAdded"] = "Employee successfully saved";

    //Decoding the json file
    $data = json_decode(file_get_contents('../../resources/employees.json'), true);

    foreach($data as $element => $el){
        if(in_array($newEmployee["email"], $data[$element])){
            $_SESSION["userAdded"] = "Employee already exists";
            break;
        }
    }

    if($_SESSION["userAdded"] == "Employee successfully saved"){
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
        
    }
    //Returning the info
    echo json_encode($data) ;

    //Redirect to dashboard
    header("Location: ../dashboard.php");
    

}

function deleteEmployee(string $id)
{

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

    //create a message in a $_SESSION variable to show it in the dashboard
    $_SESSION["message"] = "Employee deleted";

    //Redirect to dashboard
    header("Location: ../dashboard.php");

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
//Decoding the json file
$data = json_decode(file_get_contents('../../resources/employees.json'), true);

//updating the data employeer
$data[$updateEmployee["id"]-1] = (object)$updateEmployee;
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


function getEmployee(string $id){

    $data = json_decode(file_get_contents('../../resources/employees.json'), true);
    $data = $data[$id-1];

    return $data;
    
}


function removeAvatar($id)
{
// TODO implement it
}


function getQueryStringParameters($NextEmployee)
{
    $data = json_decode(file_get_contents('../../resources/employees.json'), true);
    $limit = 25;

    if(intval($NextEmployee) >= 0){
        if(count($data)-intval($NextEmployee)<$limit){
            $limit = count($data)-intval($NextEmployee);
        }

        $dataNew = array();
        for($i = intval($NextEmployee); $i < $limit+intval($NextEmployee); $i++){
            array_push($dataNew, (object)$data[$i]);
        }
    }
    if(intval($NextEmployee) < 0){
        $dataNew = array();
        for($i = (intval($NextEmployee)*-1)-$limit-1; $i < (intval($NextEmployee)*-1)-1; $i++){
            array_push($dataNew, (object)$data[$i]);
        }
    }

    echo json_encode($dataNew);

}

function getLengthDataBs(){
    $data = json_decode(file_get_contents('../../resources/employees.json'), true);
    echo json_encode($data);
}



function getNextIdentifier(array $employeesCollection): int
{
// TODO implement it
}

?>