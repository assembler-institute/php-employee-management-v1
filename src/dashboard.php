<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->

<?php
    include_once("./library/sessionHelper.php");

    session_start();
    $sessionStart = $_SESSION["start"];
    $sessionDuration = $_SESSION["duration"];
    $sessionTime = time() - $sessionStart;

    if(isset($_SESSION["id"])){
        closeUserSession($sessionTime, $sessionDuration);
    }

?>
