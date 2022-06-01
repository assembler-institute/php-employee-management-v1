<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/css/bootstrap.min.css" integrity="sha512-o/MhoRPVLExxZjCFVBsm17Pkztkzmh7Dp8k7/3JrtNCHh0AQ489kwpfA3dPSHzKDe8YCuEhxXq3Y71eb/o6amg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link type="text/css" rel="stylesheet" href="/node_modules/jsgrid/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="/node_modules/jsgrid/jsgrid-theme.min.css" />
    
    

    <title>Document</title>
</head>
<body>
    <!------------ Header ------------>
    <?php
    include "../assets/html/header.html";
    ?>



     <!------------ Table JsGrid ------------>
    <div id="wrapper">
        <?php echo "Hello World!"?>
    </div>


     <!------------ Footer ------------>
     <?php
    include "../assets/html/footer.html";
    ?>

    
     <!-- <script type="text/javascript" src="/node_modules/jsgrid/jsgrid.min.js"></script> -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" rel="stylesheet" media="all">
     <script src="/assets/js/script.js"></script>
</body>
</html>