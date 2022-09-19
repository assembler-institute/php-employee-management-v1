<?php
    require_once('./employeeManager.php');
     if ((isset($_GET['action'])) && 
    ($_GET['action'] === 'create')){

     } else if ((isset($_GET['action'])) && 
    ($_GET['action'] === 'read')){
        if (isset($_GET['id'])) {
            getEmployee($_GET['id']);
        }
     } else if ((isset($_GET['action'])) && 
    ($_GET['action'] === 'update')){
        
     } else if ((isset($_GET['action'])) && 
    ($_GET['action'] === 'delete')){
        
    } else if ((isset($_GET['action'])) && 
    ($_GET['action'] === 'print')) {
        $employees = json_decode(file_get_contents('../../resources/employees.json'), true);        
        echo json_encode($employees);
    }
