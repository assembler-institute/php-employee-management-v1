<?php

require_once("./library/sessionHelper.php");
checkSession();

?>

<!-- CSS -->
<style>
<?php require("../assets/css/main.css"); ?>
</style>

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- jsGrid -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>

<!-- JS -->
<script src="../assets/js/index.js" defer></script>

<!-- Header -->
<?php require("../assets/html/header.html"); ?>

<!-- Grid -->
<div class="grid"></div>

<!-- Footer -->
<?php include("../assets/html/footer.html"); ?>