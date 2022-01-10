<!-- CSS -->
<style>
<?php require("../assets/css/main.css"); ?>
</style>

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Header -->
<?php require("../assets/html/header.html");

function checkSession(){  
    session_start();
    if(!isset($_SESSION["login"]) || $_SESSION["login"] === "failed"){
        header("Location: ../index.php");
    }
}

?>