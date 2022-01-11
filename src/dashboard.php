<?php
session_start();
if($_SESSION["email"]){
    $userName=$_SESSION["email"];
}
else header("Location: ../index.php") ;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer> </script>
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />

    
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js" defer></script>



    <script src="../assets/js/index.js" defer></script>
    <title>Document</title>
</head>
<body>
    <?php require("../assets/html/header.php")
    ?>
    <div id="Grid"></div>
</body>
</html>