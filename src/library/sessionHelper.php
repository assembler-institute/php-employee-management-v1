<!-- CSS -->
<style>
<?php require("../assets/css/main.css"); ?>
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


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