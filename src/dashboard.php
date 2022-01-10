
<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php
    require_once '../assets/html/header.html';
?>
<body>
    <div class="row">
        <h5 id="loggedUser">
        </h5>
        <form action="./library/loginController.php" method="post">
            <button type="submit" name="logout">Log out </button>
        </form>
    </div>
    <div id="jsGrid">        </div>
    </body>

</html>

