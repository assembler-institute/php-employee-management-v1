<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees-->

 <script src="../assets/js/templates/headTemplate.js" ></script>
 <script src="../assets/js/templates/navTemplate.js" ></script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>


 <?php
    session_start();
    require_once ("./library/loginManager.php");
    checkSession();
 ?>

 <div id="jsGrid"></div>

 <script src="../assets/js/templates/gridJS.js"></script>
 <script src="../assets/js/templates/footerTemplate.js"></script>


