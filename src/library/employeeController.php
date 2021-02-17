
<?php
    require_once('employeeManager.php');

    //We are checking if the user has clicked the submit button
    if (isset($_POST['submit'])) {
        print_r($_POST);

        //We are deleting submit item from $_POST array
        unset($_POST['submit']);

        if (updateEmployee($_POST)){
            setErrorEmployeeMessage("Employee Successfully Saved!", $_POST['id']);
            exit();
        }
        else {
            setErrorEmployeeMessage("Faile To Save!", $_POST['id']);
            exit();
        }

    }

    //We are checking if the user has clicked the return button
    if (isset($_POST['return'])) {
        header("Location: ../dashboard.php$url");
        exit();
    }
?>