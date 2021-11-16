 <!DOCTYPE html>
   <html lang="en">
      <head>
         <meta charset="UTF-8" />
         <meta http-equiv="X-UA-Compatible" content="IE=edge" />
         <meta name="viewport" content="width=device-width, initial-scale=1.0" />
         <title>Employee Management</title>
         <link rel="stylesheet" href="../assets/css/main.css" />
         <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
         <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
         <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
         <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
            crossorigin="anonymous"
         />
         <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
      </head>


      <body>
         <main id="mainContainer">
            <div id="jsGrid"></div>
         </main>
      </body>

 <?php
    session_start();
    require_once ("./library/loginManager.php");
    checkSession();

    ?>


   <script src="../assets/js/templates/navTemplate.js"></script>
   <script src="../assets/js/ajax/sessionTimeout.js" ></script>
   <script src="../assets/js/templates/gridJS.js"></script>
   <script src="../assets/js/templates/footerTemplate.js"></script>

