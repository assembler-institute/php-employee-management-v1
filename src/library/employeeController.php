
<?php
include_once "./employeeManager.php";

//!switch case
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo json_encode(getEmployee($id));
} else if (isset($_POST['newEmployee'])) {
    setNewEmployee($_POST['newEmployee']);
} else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $sent_vars);
    $updateEmployee = ($sent_vars['updateEmployee']);
    // $updateEmployee = json_decode($_REQUEST["updateEmployee"]);
    setUpdateEmployee($updateEmployee);
} else if ($_SERVER['REQUEST_METHOD'] === "DELETE") {
    $employeeId = $_GET['delete'];
    deleteEmployee($employeeId);
} else {
    print_r($_REQUEST);
}

function setNewEmployee($newEmployee)
{
    $newEmployee = json_decode($newEmployee);
    $newEmployee->id = getNextIdentifier();
    $newEmployee = array($newEmployee);
    addEmployee($newEmployee);
    echo $response = true;
}

function setUpdateEmployee($updateEmployee)
{
    $employee = json_decode($updateEmployee);
    $employee = array($employee);
    updateEmployee($employee);
    echo $response = true;
}
