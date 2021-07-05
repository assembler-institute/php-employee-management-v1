<?php

require './employeeManager.php';

$employees = getEmployees();

echo json_encode($employees);
// echo 'Hola desde controller';
