<?php include_once '../assets/html/header.html'; ?>
<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../index.php");
}
echo $_SESSION["username"]; ?>

<div class="container-table">
    <div class="table-employees" id="employees"></div>
</div>
<?php include_once '../assets/html/footer.html' ?>