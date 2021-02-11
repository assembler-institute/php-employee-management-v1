<?php
        session_start();
        if(!isset($_SESSION["username"])){

            $userName = $_SESSION["username"];
            $sessionStartTime = $_SESSION["date"];
            $sessionTime = getdate()["0"] - $sessionStartTime["0"];
            if($sessionTime == 60000){
                echo $sessionTime;
                session_destroy();
                header("Location: index.php");
                exit();
            }
        }
?>