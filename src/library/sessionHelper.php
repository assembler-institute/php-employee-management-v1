<?php
    function closeUserSession($sessionTime, $sessionDuration){
        if($sessionTime >= $sessionDuration){
            session_start();
            session_destroy();
            header("Location: ../index.php");
            exit();
        }
    }
?>
