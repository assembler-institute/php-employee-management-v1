
<?php
    require_once('employeeManager.php');
    //We are checking if the user has clicked the login button
    if (isset($_POST['submit'])) {
        unset($_POST['submit']);
        // print_r($_POST);
        // updateEmployee($_POST);
        if (updateEmployee($_POST)){
            echo "true";
        }
        else {
            
        }
    }