<!-- TODO Main view or Employees Grid View here is where you get when logged here there's the grid of employees -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <?php
        include_once("./library/sessionHelper.php");

        session_start();
        $sessionStart = $_SESSION["start"];
        $sessionDuration = $_SESSION["duration"];
        $sessionTime = time() - $sessionStart;

        if(isset($_SESSION["id"])){
            closeUserSession($sessionTime, $sessionDuration);
        }
    ?>
    
<script src="assets/js/createGrid.js"></script>
</body>

</html>
