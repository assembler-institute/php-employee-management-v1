
<?php
    require_once('employeeManager.php');

    //We are checking if the user has clicked the submit button
    if (isset($_POST['submit'])) {

        //We are deleting submit item from $_POST array
        unset($_POST['submit']);

        if (updateEmployee($_POST)){
            setErrorEmployeeMessage("Employee Successfully Saved!");
            exit();
        }
        else {
            setErrorEmployeeMessage("Faile To Save!");
            exit();
        }

    }

    //We are checking if the user has clicked the return button
    if (isset($_POST['return'])) {
        header("Location: ../dashboard.php$url");
        exit();
    }
?>