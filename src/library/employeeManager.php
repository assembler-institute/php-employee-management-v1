<?php
/**
 * EMPLOYEE FUNCTIONS LIBRARY
 *
 * @author: Jose Manuel Orts
 * @date: 11/06/2020
 */
    function addEmployee(array $newEmployee){
        $employees = json_decode(file_get_contents('../../resources/employees.json'), true); 
        $newEmployee["id"] = $employees[count($employees) - 1]['id'] + 1;       
        // $newEmployeeId = array("id" => $newId);
        // $newEmployeeFinal = $newEmployeeId + $newEmployee; // It won't merge both arrays !!
        $newEmployeeFinal = (object) $newEmployee; 
        array_push($employees, $newEmployeeFinal);
        file_put_contents('../../resources/employees.json', json_encode($employees));
        echo json_encode($employees);  
    }

    function deleteEmployee(string $id){
        $employees = json_decode(file_get_contents('../../resources/employees.json'), true);
        for($i = 0; $i < count($employees); $i++){
            if(strval($employees[$i]['id']) === $id) {
                unset($employees[$i]);
            }
        }
        file_put_contents('../../resources/employees.json', json_encode($employees));
        echo json_encode($employees);
    }


    function updateEmployee(array $updateEmployee){
    // TODO implement it
    }


    function getEmployee(string $id){
    // TODO implement it
        $employees = json_decode(file_get_contents('../../resources/employees.json'), true);
        foreach ($employees as $employee){
            if (strval($employee['id']) === $id){
                $id = $employee['id'];
                $form = <<<form
                <form>
                <input value="$id">
                </form>
                form;
                echo $form;
            }
        }
    }

    function removeAvatar($id){
    // TODO implement it
    }

    function getQueryStringParameters():array{
    // TODO implement it
    }

    function getNextIdentifier(array $employeesCollection):int{
    // TODO implement it
    }

    function printEmployees() {
        $employees = json_decode(file_get_contents('../../resources/employees.json'), true);        
        echo json_encode($employees);
    }