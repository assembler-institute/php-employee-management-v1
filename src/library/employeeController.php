
<?php
include_once "./employeeManager.php";
echo "emplyeeController";
if (!empty($_POST)) {
    $newEmployye = $_POST['newEmployee'];
    addEmployee($newEmployee);
    echo $response = true;
} else {
    echo $response = false;
}
