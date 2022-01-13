<?php

function addEmployee($newEmployee)
{
    $decode_json = getDecodeJson();
    array_push($decode_json, transformArray($newEmployee, count($decode_json)+1));

    overwriteJson($decode_json);
}

//Only from jsGrid
function deleteEmployee()
{
    echo "delete";
}

function updateEmployee($updateEmployee)
{
    $decode_json = getDecodeJson();
    $modifyEmployee = json_decode(json_encode(transformArray($updateEmployee, "")));
    //convert string in number
    $modifyEmployee->id = intval($modifyEmployee->id);

    foreach($decode_json as $employee){
        if($modifyEmployee->id === $employee->id) {
            //update json employee
            $decode_json[($employee->id)-1] = $modifyEmployee;
        }
    };

    overwriteJson($decode_json);
}

function overwriteJson($decode_json){
    $json_data = json_encode($decode_json);
    file_put_contents("../../resources/employees.json", $json_data);
}

function transformArray($array, $id){
    $array = json_decode($array);
    $newJson = [];

    foreach($array as $employee){
        //If arg 'id' is not '', create that 'id'
        if($id !== ""){
            if($employee->name === "id") $newJson[$employee->name] = $id;
            else $newJson[$employee->name] = $employee->value;
        }
        else $newJson[$employee->name] = $employee->value;
    };

    return $newJson;
}

function getEmployees()
{
    $decode_json = getDecodeJson();
    $employees_array = [];
    foreach($decode_json as $employee){
        array_push($employees_array, json_decode(json_encode($employee), true));
    };
    print_r(json_encode($employees_array));
}

function getDecodeJson(){
    return json_decode(file_get_contents("../../resources/employees.json"));
}