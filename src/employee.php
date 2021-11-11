<?php
include_once '../assets/html/header.html';
?>
<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../index.php");
}
echo $_SESSION["username"]; ?>

<?php include_once '../assets/html/footer.html' ?>