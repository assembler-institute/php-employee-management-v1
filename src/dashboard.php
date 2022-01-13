<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php
// session_start();

require '../assets/html/header.html';
require "././library/loginManager.php";

// if (isset($_POST)) {

//     // sessionlogout("Location:../index.php");
// }

// if (isset($_SESSION['email'])) {
//     //echo $_SESSION['email'];
//     //echo "<script> loadxml(); </script>";
// }

?>
<link rel="stylesheet" href="./../node_modules/bootstrap/dist/css/bootstrap.min.css">
<script src="./../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


<body onload=" callGrid(); ">
<?php
    include '../assets/html/navbar.html';
?>
    <section>
        <div id="jsGrid"> </div>
    </section>

    <?php
    include '../assets/html/footer.html';
?>
</body>
<!-- <form action="../assets/html/header" method="post"></form> -->

</html>