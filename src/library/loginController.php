<!-- File to handle all HTTP request of login interactions -->

<?php
    //We are checking if the user has clicked the login button
    if (isset($_POST['submit'])) {

        //Getting the data from login form
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Checking if the inputs are empty
        if (empty($email) || empty($password)) {
            header("Location: ../../index.php?login=empty");
            exit();
        }
        else {
            //Checking if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../../index.php?login=invalidemail");
                exit();
            }
            else {
                include_once('loginManager.php');
                verifyUser($email, $password);
                exit();
            }
        }
    }
    else {
        header("Location: ../../index.php");
    }
?>
