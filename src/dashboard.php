<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php
    session_start();
    $userName = $_SESSION["username"];
    echo $userName;
?>