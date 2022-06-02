<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php
session_start();
    if(!isset($_SESSION['user'])){
    }
    if(isset($_GET['logout'])){
        unset($_SESSION['user']);
     }
?>
