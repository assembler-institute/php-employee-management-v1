<?php

function addEmployee($newEmployee)
{
    $decode_json = getDecodeJson();

    if(gettype($newEmployee) === "array"){
        array_push($decode_json, transformArray($newEmployee, count($decode_json)+1));
    } else {
        $newEmployee->id = count($decode_json)+1;
        array_push($decode_json, $newEmployee);
    }
    
    overwriteJson($decode_json);

}

//Only from jsGrid
function deleteEmployee($deleteEmployee)
{
    $decode_json = getDecodeJson();
    
    $i = 0;
    foreach($decode_json as $employee){
        if($deleteEmployee == $employee) unset($decode_json[$i]);
        $i++;
    };

    overwriteJson(array_values($decode_json));
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
    file_put_contents("../../resources/employees.json", json_encode($decode_json));
}

function transformArray($array, $id){
    $newJson = [];

    foreach($array as $employee){
        //If arg 'id' is not '', create that 'id'
        if($id !== ""){
            if($employee->name === "id") $newJson[$employee->name] = $id;
            else $newJson[$employee->name] = $employee->value;
        }
        else $newJson[$employee->name] = $employee->value;
    };

    return (object)$newJson;
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