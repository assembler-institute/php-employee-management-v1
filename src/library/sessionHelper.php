<?php

    function closeUserSession($sessionTime, $sessionDuration){
        echo $sessionTime;
        if($sessionTime >= $sessionDuration){
            // echo "duration";
            header("Location: ../index.php");
            exit();
        }
    }
?>
