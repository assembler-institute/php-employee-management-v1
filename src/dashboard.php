<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php
session_start();

require '../assets/html/header.html';
require "././library/loginManager.php";

if(isset($_POST)){
    
    // sessionlogout("Location:../index.php");
}

 if(isset($_SESSION['email'])){
    echo $_SESSION['email'];
    echo "<script> loadxml(); </script>";
}

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="./../node_modules/bootstrap/dist/css/bootstrap.min.css">
<script src="./../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<body onload=" callGrid(); ">
    <div class="row">
        <h5 id="loggedUser">
        </h5>
        <form action="./library/loginController.php" method="post">
            <button type="submit" name="logout">Log out </button>
        </form>
    </div>

    <div id="jsGrid"> </div>
</body>
<!-- <form action="../index.php" method="post"></form> -->
</html>