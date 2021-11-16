<?php  
    function checkSession(){
        
    session_start();
        
    if(isset($_SESSION["email"])){
        header("Location:./src/dashboard.php");
    }
    else if(isset($_GET["logout"])){
        header("refresh:5, index.php");
    }
    else if (isset($_SESSION["wrongLogin"])){
        $errorMsg =  $_SESSION["wrongLogin"];
        unset($_SESSION);
        session_destroy();
        return ["type" => "danger", "text" => $errorMsg] ;
        }
        
    }

    function timeExpires(){
        if(time() > $_SESSION["expTime"]+$_SESSION["time"]){
		
            header("Location: ./library/loginController.php?logout");
            die();
        }
    }