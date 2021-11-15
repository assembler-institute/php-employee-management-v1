<?php

/**
 **Employe Manager Library.
 *
 ** This file will perform the necessary operations (create, read, update and delete)
 ** which will be called later by the "employeeController.php" file.
 *
 */


/**
 * * Create employe on employees.json
 *
 * @param Array   $newEmployee  new employee data from setNewEmployee function of employeeController.php.
 */
function addEmployee(array $newEmployee)
{
    //? Take all employees (decoded) from employees.json
    $jsonEmployees = getQueryStringParameters();

    //? insert new employee in employees.json
    array_push($jsonEmployees, $newEmployee[0]);

    //? encode all employees from employees.json
    $jsonData = json_encode($jsonEmployees);

    //? replace employees.json content
    file_put_contents('../../resources/employees.json', $jsonData);
}

/**
 * * Delete employe on employees.json
 *
 * @param Int   $id selected employee Id from DELETE case statement of employeeController.php.
 */
function deleteEmployee($id)
{
    //? Take all employees (decoded) from employees.json
    $jsonEmployees = getQueryStringParameters();

    //? compare incoming id with all employees
    for ($i = 0; $i < count($jsonEmployees); $i++) {
        if ($jsonEmployees[$i]['id'] === $id || $jsonEmployees[$i]['id'] === intval($id)) {
            //? delete employe from employees
            array_splice($jsonEmployees, $i, 1);
        }
    }

    //? encode all employees from employees.json
    $jsonData = json_encode($jsonEmployees);

    //? replace employees.json content
    file_put_contents('../../resources/employees.json', $jsonData);
}

/**
 * * Update employe on employees.json
 *
 * @param Array   $updateEmployee updated employee data from PUT case statement of employeeController.php.
 */
function updateEmployee(array $updateEmployee)
{
    //? Take all employees (decoded) from employees.json
    $jsonEmployees  = getQueryStringParameters();

    //? decode jason data
    $updateEmployee = json_decode($updateEmployee[0], true);

    $id =  $updateEmployee['id']; //? id to compare

    //? compare incoming id with all employees
    for ($i = 0; $i < count($jsonEmployees); $i++) {
        if ($jsonEmployees[$i]['id'] === $id || $jsonEmployees[$i]['id'] === intval($id)) {
            //? replace data
            $jsonEmployees[$i] = $updateEmployee;
        }
    }
    //? encode data to JSON
    $jsonData = json_encode($jsonEmployees);

    //? replace employees.json content
    file_put_contents('../../resources/employees.json', $jsonData);
}

/**
 * * Get one employe from employees.json
 *
 * @param String  $id updated employee data from GET case statement of employeeController.php.
 * 
 * @return String   $employee employe data 
 * 
 */
function getEmployee(string $id)
{
    //? Take all employees (decoded) from employees.json
    $jsonEmployees  = getQueryStringParameters();

    //? compare incoming id with all employees
    foreach ($jsonEmployees as $employee) {
        if ($employee['id'] === $id || $employee['id'] === intval($id)) {
            //? return match
            return  $employee;
        }
    }
}

/**
 * * Get all employes from employees.json
 * 
 * @return Array  $jsonEmployees contains all employes from employees.json.
 */
function getQueryStringParameters()
{
    //?get JSON content
    $jsonEmployees = file_get_contents('../../resources/employees.json');

    //? decode the JSON into an associative array
    $jsonEmployees  = json_decode(($jsonEmployees), true);

    //? return all employes from employees.json
    return $jsonEmployees;
}

/**
 * * Get next Id from employees.json
 * 
 * @return Int  $nextId return last id from employees.json plus one.
 */
function getNextIdentifier($employeesCollection = "")
{
    $jsonEmployees  = getQueryStringParameters();
    $nextId = intval($jsonEmployees[count($jsonEmployees) - 1]['id'] + 1);
    return $nextId;
}
