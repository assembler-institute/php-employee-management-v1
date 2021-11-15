
<?php
include_once "./employeeManager.php";
/**
 **Controller of employee.php view and employeeManager.php.
 *
 ** This file will contain the necessary functions to interact between view and "manager".
 *
 * $_SERVER['REQUEST_METHOD'] info -> https://phppot.com/php/php-request-methods/
 */

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $id = $_GET['id'];
        echo json_encode(getEmployee($id));
        break;

    case 'POST':
        setNewEmployee($_POST['newEmployee']);
        break;

    case 'PUT':
        parse_str(file_get_contents("php://input"), $sent_vars);
        $updateEmployee = ($sent_vars['updateEmployee']);
        setUpdateEmployee($updateEmployee);
        break;

    case 'DELETE':
        $employeeId = $_GET['delete'];
        deleteEmployee($employeeId);
        break;


    default:
        print_r($_REQUEST);
        break;
}


/**
 ** prepare data for the addEmployee function of employeeManager.php
 *
 * @param String JSON  $newEmployee data from employe.php form.
 */
function setNewEmployee($newEmployee)
{
    $newEmployee = json_decode($newEmployee);
    $newEmployee->id = getNextIdentifier();
    $newEmployee = array($newEmployee);
    addEmployee($newEmployee);
    echo $response = true;
}

/**
 ** prepare data for the updateEmployee function of employeeManager.php
 *
 * @param String JSON  $updateEmployee updated data from employe.php form.
 */
function setUpdateEmployee($updateEmployee)
{

    $employee = array($updateEmployee);
    updateEmployee($employee);
    echo $response = true;
}
