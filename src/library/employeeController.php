<?php

require_once("./employeeManager.php");


if(isset($_GET["display"])){
    displayEmployee();
}

if(isset($_GET['userId']))
{
    getEmployee($_GET['userId']);

}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    deleteEmployee($_GET["delete"]);
}