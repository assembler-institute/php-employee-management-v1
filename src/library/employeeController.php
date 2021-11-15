
<?php
include_once "./employeeManager.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo json_encode(getEmployee($id));
} else if (isset($_POST['newEmployee'])) {
    setNewEmployee($_POST['newEmployee']);
} else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {

    $updateEmployee = json_decode($_REQUEST["updateEmployee"]);
    setUpdateEmployee($updateEmployee);
    echo $updateEmployee;
} else if ($_SERVER['REQUEST_METHOD'] === "DELETE") {
    getQueryStringParameters();
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
    $newEmployee = json_decode($updateEmployee);
    $newEmployee = array($newEmployee);
    updateEmployee($newEmployee);
    echo $response = true;
}
