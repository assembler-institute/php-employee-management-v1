<!-- This file will check that the user session is still active and if not , you must call the corresponding function of " loginManager.php " to logout the user . In the event that the user remains more than 10 minutes in the session , the user will have to be logged out . -->

<?php

if(time() - $_SESSION["time"] > $_SESSION["lifeTime"]) {
    require("loginManager.php");
    logout("Session expired!");
}
