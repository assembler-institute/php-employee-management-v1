<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees-->

 <script src="../assets/js/templates/headTemplate.js" ></script>
 <script src="../assets/js/templates/navTemplate.js" ></script>

 <?php
    session_start();
    require_once ("./library/loginManager.php");
    checkSession();

    echo "Im the DASHHHBOAAARD";
 ?>

 <script src="../assets/js/templates/footerTemplate.js"></script>


