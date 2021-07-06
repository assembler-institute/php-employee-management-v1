<?php
session_start();
$data = file_get_contents("resources/employees.json");
$employees = json_decode($data, true);
$_SESSION["listEmployees"] = $employees;