<?php

require_once("./employeeManager.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    addEmployee($_POST);
};
