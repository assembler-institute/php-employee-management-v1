<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php
require '../assets/html/header.html';

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

    <div id="jsGrid">
        <!-- <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name </th>
                    <th scope="col">Email</th>
                    <th scope="col">City</th>
                    <th scope="col">Street Address</th>
                    <th scope="col">State </th>
                    <th scope="col">Age</th>
                    <th scope="col">Postal Code </th>
                    <th scope="col">Phone Number</th>
                    <th scope="col"><a href="employee.php"><i class="fas fa-plus-square"></i> </a> </th>
                </tr>
            </thead>
            <!-- <button onclick=" calltable()"> BUTTON </button> -->
            <tbody id="jsGridBody">

            </tbody>
        </table> -->
    </div>
</body>

</html>