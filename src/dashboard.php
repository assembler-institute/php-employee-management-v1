<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<?php
// session_start();

require '../assets/html/header.html';
require "././library/loginManager.php";

?>

<!-- todo Import here because if we import in header.html it doesn't work-->
<!-- todo import from CDN and Others -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Luxurious+Roman&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="./../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- todo when the page load call function to fill the table -->
<body onload=" callGrid(); ">
    <?php
        //todo add the nav bar by require
        require '../assets/html/navbar.html';
    ?>

    <section>
        <!-- todo main section  -->
        <div id="jsGrid"> </div>
    </section>

    <?php
        //todo add the Footer by require
        require '../assets/html/footer.html';
    ?>

</body>

</html>