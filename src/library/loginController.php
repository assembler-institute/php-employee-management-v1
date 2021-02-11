<!-- File to handle all HTTP request of login interactions -->

<?php
    require_once('loginManager.php');
    //We are checking if the user has clicked the login button
    if (isset($_POST['submit'])) {

        //Getting the data from login form
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Checking if the inputs are empty
        if (empty($email) || empty($password)) {
            setErrorMessage("empty");
            // header("Location: ../../index.php?login=empty");
            exit();
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //Checking if email is valid
            setErrorMessage("invalidemail");
            // header("Location: ../../index.php?login=invalidemail");
            exit();
        }
        elseif (verifyUser($email, $password)) {
            //Checking if this user is valid
            header("Location: ../dashboard.php");
            exit();
        }
        else {
            setErrorMessage("invaliduser");
            // header("Location: ../../index.php?login=invaliduser");
            exit();
        }
    }
    else {
        header("Location: ../../index.php");
    }
?>
