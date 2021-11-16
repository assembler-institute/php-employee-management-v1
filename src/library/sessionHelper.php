<!-- This file will check that the user session is still active and if not, 
you must call the corresponding function of "loginManager.php" to logout the user. 
In the event that the user remains more than 10 minutes in the session, the user will have to be logged out.

You will have to take into account that in order for the controllers to execute the functions of their respective "managers" files, 
you must include this files into the corresponding controllers.-->

<?php

require_once 'loginManager.php';
session_start();
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 600)) {
    autoLogout();
}
$_SESSION['last_activity'] = time();
