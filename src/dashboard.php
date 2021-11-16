
 <?php
    session_start();
    include_once "../assets/html/head.html";
    require_once ("./library/loginManager.php");
    checkSession();

    ?>
         <main id="mainContainer">
            <div id="jsGrid"></div>
         </main>
      </body>


   <script src="../assets/js/templates/navTemplate.js"></script>
   <script src="../assets/js/ajax/sessionTimeout.js" ></script>
   <script src="../assets/js/templates/gridJS.js"></script>
   <script src="../assets/js/templates/footerTemplate.js"></script>

