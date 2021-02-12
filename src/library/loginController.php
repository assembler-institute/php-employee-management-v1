<!-- Recibe la petición y llamará a la función necesaria de loginManager.php para comprobar la información.
Entonces loginController.php deberá decidir qué hacer, si el usuario ha introducido el email y password correctas deberá redirigir a dashboard.php, sino a index.php de nuevo.  -->
<!-- This file will handle the user's HTTP requests when they want to log in or log out , therefore, it must call the functions of the " loginManager.php " once the request has been received to carry out the action . -->

<?php

include "./loginManager.php";

if(isset($_POST["email"]) && isset($_POST["password"])) {
    //Get email user inserted
    $userEmail = $_POST["email"];
    //Get password user inserted
    $userPassword = $_POST["password"];

    //Validation email and password true or false?
    $returnValidate = validateUser($userEmail, $userPassword);
    //Redirect if true or false
    if($returnValidate === true) {
        $url = "../dashboard.php";
        header('Location: ' . $url);
        exit();
    } else {
        $url = "../../index.php";
        header("Refresh: 0; URL=$url?error=LoginIncorrect");
        exit();
    }
}