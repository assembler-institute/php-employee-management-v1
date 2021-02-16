<?php

    function closeUserSession($sessionTime, $sessionDuration){
        echo $sessionTime;
        if($sessionTime >= $sessionDuration){
            // echo "duration";
            session_start();
            session_destroy();
            header("Location: ../index.php");
            exit();
        }
    }
?>
