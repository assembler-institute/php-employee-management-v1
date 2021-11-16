<?php
require_once './library/loginController.php';

session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../index.php");
}

/* echo $_SESSION["username"]; */
include_once '../assets/html/header.html';

if(time() > $_SESSION['timeout'] + 600 ){
    destroySession();
}

?>

<div class="container-table">
    <div class="table-employees" id="employees"></div>
</div>
<?php include_once '../assets/html/footer.html'?>
